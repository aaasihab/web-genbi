@extends('admin.layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <!-- Form Edit Genbi Point -->
    <section id="edit-genbi-point" class="bg-gray-50 py-12 mt-14">
        <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Form Edit Genbi Point</h2>

            <form action="{{ route('admin.genbi_point.update', $genbiPoint->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <!-- Bulan -->
                <div>
                    <label for="bulan" class="block font-medium text-gray-700">Bulan</label>
                    <select name="bulan" id="bulan" @error('link_drive') is-invalid @enderror required
                        class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                        <option value="" disabled>Pilih Bulan</option>
                        @foreach ($availableMonths as $month)
                            <option value="{{ $month }}"
                                {{ old('bulan', $genbiPoint->bulan) == $month ? 'selected' : '' }}>
                                {{ $month }}
                            </option>
                        @endforeach
                    </select>
                    @error('bulan')
                        <div class="invalid-feedback text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror

                </div>

                <!-- Link Drive -->
                <div>
                    <label for="link_drive" class="block font-medium text-gray-700">Link Drive</label>
                    <input type="url" name="link_drive" id="link_drive" @error('link_drive') is-invalid @enderror
                        required
                        class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        value="{{ old('link_drive', $genbiPoint->link_drive) }}" required>
                    @error('link_drive')
                        <div class="invalid-feedback text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Pilihan Status -->
                <div>
                    <label for="status" class="block text-gray-700 font-semibold">Status</label>
                    <select name="status" id="status" @error('status') is-invalid @enderror required
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="" disabled>Pilih Status...</option>
                        <option value="published"
                            {{ old('status', $genbiPoint->status) == 'published' ? 'selected' : '' }}>
                            Published</option>
                        <option value="nonaktif"
                            {{ old('status', $genbiPoint->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback text-red-500 text-sm mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="flex justify-between mt-6">
                    <a href="{{ route('admin.genbi_point.index') }}"
                        class="px-6 py-3 bg-gray-500 hover:bg-gray-600 text-white font-semibold rounded-lg shadow-md transition">
                        Kembali
                    </a>
                    <button type="submit"
                        class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
