<!DOCTYPE html>
<html lang="en">

<head>
    <title>Glassmorphism Login Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #d1d8e0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        .background {
            width: 400px;
            height: 500px;
            position: absolute;
            transform: translate(-50%, -50%);
            left: 50%;
            top: 50%;
        }

        .background .shape {
            height: 150px;
            width: 150px;
            position: absolute;
            border-radius: 50%;
        }

        .shape:first-child {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            left: -70px;
            top: -70px;
        }

        .shape:last-child {
            background: linear-gradient(135deg, #ff9a9e, #fad0c4);
            right: -40px;
            bottom: -70px;
        }

        form {
            height: 400px;
            width: 350px;
            background: rgba(255, 255, 255, 0.2);
            position: absolute;
            transform: translate(-50%, -50%);
            top: 50%;
            left: 50%;
            border-radius: 15px;
            backdrop-filter: blur(15px);
            border: 2px solid rgba(255, 255, 255, 0.15);
            box-shadow: 0 0 30px rgba(8, 7, 16, 0.3);
            padding: 40px 30px;
            text-align: center;
        }

        form h3 {
            font-size: 26px;
            margin-bottom: 30px;
            font-weight: 600;
            color: #2c3e50;
        }

        label {
            display: block;
            text-align: left;
            font-size: 14px;
            font-weight: 500;
            color: #34495e;
            margin-top: 15px;
        }

        input {
            width: 100%;
            height: 40px;
            background: rgba(255, 255, 255, 0.215);
            border-radius: 6px;
            padding: 10px;
            font-size: 14px;
            color: #2c3e50;
            border: 1px solid rgba(255, 255, 255, 0.3);
            margin-top: 5px;
        }

        ::placeholder {
            color: #7f8c8d;
        }

        button {
            margin-top: 30px;
            width: 100%;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: white;
            padding: 10px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
            border: none;
            transition: 0.3s;
        }

        button:hover {
            background: linear-gradient(135deg, #2575fc, #6a11cb);
        }

        /* Responsive untuk mobile */
        @media screen and (max-width: 768px) {
            .background {
                width: 300px;
                height: 400px;
            }

            .background .shape {
                height: 120px;
                width: 120px;
            }

            .shape:first-child {
                left: -50px;
                top: -50px;
            }

            .shape:last-child {
                right: -20px;
                bottom: -50px;
            }

            form {
                width: 300px;
                height: 350px;
                padding: 30px 25px;
            }

            form h3 {
                font-size: 22px;
            }

            label {
                font-size: 12px;
            }

            input {
                height: 35px;
                font-size: 12px;
            }

            button {
                font-size: 14px;
                padding: 8px;
            }
        }
    </style>
</head>

<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="{{ route('auth.login') }}" method="POST">
        @csrf
        <h3>GenBI Unuja Official</h3>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="@error('email') is-invalid @enderror"
            placeholder="Masukkan Email" value="{{ old('email') }}" required>
        <div class="invalid-feedback">
            @error('email')
                {{ $message }}
            @enderror
        </div>

        <!-- Input Password -->
        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="@error('password') is-invalid @enderror"
            placeholder="Masukkan Password" required>
        <div class="invalid-feedback">
            @error('password')
                {{ $message }}
            @enderror
        </div>

        <button type="submit">Log In</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if (session('success'))
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
            });
            Toast.fire({
                icon: "success",
                title: "{{ session('success') }}"
            });
        @endif

        @if (session('login-error'))
            Swal.fire({
                title: "Login Gagal!",
                text: "{{ session('error') }}",
                icon: "error",
                confirmButtonText: "OK",
            });
        @endif

        @if (session('error'))
            Swal.fire({
                title: "Login Gagal!",
                text: "{{ session('error') }}",
                icon: "error",
                confirmButtonText: "OK",
            });
        @endif
    </script>
</body>

</html>
