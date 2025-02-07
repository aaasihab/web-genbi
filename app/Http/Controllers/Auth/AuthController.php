<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Cache;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class AuthController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data input dengan pesan khusus
        $validated = $request->validate(
            [
                'name' => 'required|string|max:50',
                'email' => 'required|string|email|max:255|unique:users,email',
                'password' => 'required|string|min:6',
                'role' => 'required|string|pelanggan',
            ],
            [
                // Pesan kustom untuk validasi
                'name.required' => 'Nama wajib diisi.',
                'name.string' => 'Nama harus berupa teks.',
                'name.max' => 'Nama tidak boleh lebih dari 50 karakter.',

                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Format email tidak valid.',
                'email.max' => 'Email tidak boleh lebih dari 50 karakter.',
                'email.unique' => 'Email sudah terdaftar.',

                'password.required' => 'Password wajib diisi.',
                'password.min' => 'Password harus terdiri dari minimal 6 karakter.',

                'role.required' => 'Role wajib dipilih.',
                'role.in' => 'Role yang dipilih tidak valid.',
            ]
        );

        // Enkripsi password
        $validated['password'] = Hash::make($validated['password']);

        // Menambahkan user baru ke database
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'role' => $validated['role'],
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()
            ->route('master.data.user.index')
            ->with('success', 'User berhasil ditambahkan.');
    }

    //  Menampilkan halaman register
    public function registerForm()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard')->with('message', 'Anda sudah login!');
        }

        return view('auth.registerForm');
    }

    public function register(Request $request)
    {
        // Validasi input dengan pesan khusus
        $validated = $request->validate(
            [
                'name' => 'required|string|max:50',
                'email' => 'required|string|email|max:255|unique:users,email',
                'password' => 'required|string|min:8|confirmed',
            ],
            [
                'name.required' => 'Nama wajib diisi.',
                'name.string' => 'Nama harus berupa teks.',
                'name.max' => 'Nama tidak boleh lebih dari 50 karakter.',

                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Format email tidak valid.',
                'email.max' => 'Email tidak boleh lebih dari 50 karakter.',
                'email.unique' => 'Email sudah terdaftar.',

                'password.required' => 'Password wajib diisi.',
                'password.min' => 'Password harus terdiri dari minimal 8 karakter.',
                'password.confirmed' => 'Konfirmasi password tidak cocok.',
            ]
        );

        // Enkripsi password
        $validated['password'] = Hash::make($validated['password']);

        // Tambahkan pengguna baru ke database dengan role otomatis 'pengguna'
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'role' => 'admin', // Role diatur otomatis di backend
        ]);

        // Redirect ke halaman login dengan pesan sukses
        return redirect()
            ->route('login')
            ->with('success', 'Registrasi berhasil');
    }


    public function loginForm()
    {
        return view('auth.loginForm');
    }


    public function blocked()
    {
        $key = 'login-attempts:' . request()->ip() . ':' . request()->header('User-Agent');
        $blockedUntil = Cache::get("blocked:$key");

        if (!$blockedUntil || now()->greaterThan($blockedUntil)) {
            return redirect()->route('login'); // Jika blokir habis, kembali ke login
        }

        $remainingTime = now()->diffInSeconds($blockedUntil);

        return view('auth.blocked', compact('remainingTime'));
    }

    // Menangani proses login.
    public function login(Request $request)
    {
        // Buat unique key berdasarkan IP + User-Agent (tanpa session)
        $key = 'login-attempts:' . $request->ip() . ':' . $request->header('User-Agent');

        // Cek apakah pengguna sudah diblokir
        $blockedUntil = Cache::get("blocked:$key");

        if ($blockedUntil && now()->lessThan($blockedUntil)) {
            $remainingTime = now()->diffInSeconds($blockedUntil);
            return redirect()->route('blocked')->with('remainingTime', $remainingTime);
        }

        // Validasi input
        $validated = $request->validate([
            'email' => 'required|email|max:50',
            'password' => 'required|min:8|max:50',
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Email tidak boleh lebih dari 50 karakter.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal harus 8 karakter.',
            'password.max' => 'Password tidak boleh lebih dari 50 karakter.',
        ]);


        // Cek apakah email ada di database
        $user = User::where('email', $validated['email'])->first();

        if (!$user || !Auth::attempt($request->only('email', 'password'))) {
            // Tambah hitungan percobaan login
            RateLimiter::hit($key, 120); // Reset dalam 120 detik

            // Jika sudah lebih dari 3 kali gagal, blokir selama 5 menit
            if (RateLimiter::tooManyAttempts($key, 5)) {
                $blockedUntil = now()->addMinutes(60);
                Cache::put("blocked:$key", $blockedUntil, 60); // Simpan blokir selama 5 menit

                return redirect()->route('blocked')->with('remainingTime', 300);
            }

            // Hitung percobaan tersisa
            $attemptsLeft = RateLimiter::remaining($key, 5);
            return redirect()->back()->with('error', "Email atau password salah. Percobaan tersisa: $attemptsLeft.");
        }

        // Jika login berhasil, reset rate limiter dan hapus blokir dari cache
        RateLimiter::clear($key);
        Cache::forget("blocked:$key");

        // Regenerasi session setelah login sukses
        $request->session()->regenerate();

        return redirect()->route('admin.kegiatan.index')->with('success', 'Berhasil Login');
    }

    public function logout(Request $request)
    {
        // Logout, invalidasi session, dan regenerasi token
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke halaman login
        return redirect()->route('beranda');
    }

    // Menampilkan halaman unauthorized
    public function unauthorized()
    {
        return view('auth.403');
    }
}