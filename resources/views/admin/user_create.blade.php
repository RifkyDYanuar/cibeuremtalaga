@extends('layouts.admin')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-user-plus text-white"></i>
                    </div>
                    Tambah User Baru
                </h1>
                <nav class="flex items-center space-x-2 text-sm text-gray-600 mt-2">
                    <a href="{{ route('admin.dashboard') }}" class="hover:text-emerald-600 transition-colors duration-200">
                        <i class="fas fa-home"></i>
                        Dashboard
                    </a>
                    <i class="fas fa-chevron-right text-gray-400"></i>
                    <a href="{{ route('admin.users.index') }}" class="hover:text-emerald-600 transition-colors duration-200">Manajemen User</a>
                    <i class="fas fa-chevron-right text-gray-400"></i>
                    <span class="text-gray-800 font-medium">Tambah User</span>
                </nav>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.users.index') }}" 
                   class="inline-flex items-center px-4 py-2 bg-gray-500 text-white font-medium rounded-lg hover:bg-gray-600 transition-all duration-200">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>
            </div>
        </div>
    </div>

    <!-- Form Section -->
    <div class="max-w-2xl mx-auto">
        <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-emerald-600 to-teal-600">
                <h3 class="text-lg font-semibold text-white flex items-center gap-2">
                    <i class="fas fa-user-plus"></i>
                    Formulir Tambah User
                </h3>
            </div>
            
            <div class="p-8">
                <form action="{{ route('admin.users.store') }}" method="POST" id="createUserForm" class="space-y-6">
                    @csrf
                    
                    <!-- Name Field -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                            <i class="fas fa-user text-emerald-500"></i>
                            Nama Lengkap
                        </label>
                        <input type="text" 
                               name="name" 
                               id="name" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200 @error('name') border-red-500 @enderror" 
                               value="{{ old('name') }}" 
                               placeholder="Masukkan nama lengkap"
                               required>
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                            <i class="fas fa-envelope text-emerald-500"></i>
                            Email
                        </label>
                        <input type="email" 
                               name="email" 
                               id="email" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200 @error('email') border-red-500 @enderror" 
                               value="{{ old('email') }}" 
                               placeholder="Masukkan alamat email"
                               required>
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Role Field -->
                    <div>
                        <label for="role" class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                            <i class="fas fa-user-shield text-emerald-500"></i>
                            Role
                        </label>
                        <select name="role" 
                                id="role" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200 @error('role') border-red-500 @enderror" 
                                required>
                            <option value="">Pilih Role</option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                        </select>
                        @error('role')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                            <i class="fas fa-lock text-emerald-500"></i>
                            Password
                        </label>
                        <div class="relative">
                            <input type="password" 
                                   name="password" 
                                   id="password" 
                                   class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200 @error('password') border-red-500 @enderror" 
                                   placeholder="Masukkan password"
                                   required>
                            <button type="button" 
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center"
                                    onclick="togglePassword('password')">
                                <i class="fas fa-eye text-gray-400 hover:text-emerald-500 transition-colors duration-200" id="password-icon"></i>
                            </button>
                        </div>
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Confirmation Field -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                            <i class="fas fa-lock text-emerald-500"></i>
                            Konfirmasi Password
                        </label>
                        <div class="relative">
                            <input type="password" 
                                   name="password_confirmation" 
                                   id="password_confirmation" 
                                   class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200" 
                                   placeholder="Konfirmasi password"
                                   required>
                            <button type="button" 
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center"
                                    onclick="togglePassword('password_confirmation')">
                                <i class="fas fa-eye text-gray-400 hover:text-emerald-500 transition-colors duration-200" id="password_confirmation-icon"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200">
                        <button type="button" 
                                onclick="resetForm()" 
                                class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-200 flex items-center gap-2">
                            <i class="fas fa-undo"></i>
                            Reset
                        </button>
                        <button type="submit" 
                                class="px-6 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-medium rounded-lg hover:from-emerald-700 hover:to-teal-700 transition-all duration-200 flex items-center gap-2">
                            <i class="fas fa-save"></i>
                            Simpan User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function togglePassword(fieldId) {
    const field = document.getElementById(fieldId);
    const icon = document.getElementById(fieldId + '-icon');
    
    if (field.type === 'password') {
        field.type = 'text';
        icon.className = 'fas fa-eye-slash text-gray-400 hover:text-emerald-500 transition-colors duration-200';
    } else {
        field.type = 'password';
        icon.className = 'fas fa-eye text-gray-400 hover:text-emerald-500 transition-colors duration-200';
    }
}

function resetForm() {
    document.getElementById('createUserForm').reset();
}

// Form validation
document.getElementById('createUserForm').addEventListener('submit', function(e) {
    const password = document.getElementById('password').value;
    const passwordConfirmation = document.getElementById('password_confirmation').value;
    
    if (password !== passwordConfirmation) {
        e.preventDefault();
        alert('Password dan konfirmasi password tidak cocok!');
        return false;
    }
    
    if (password.length < 8) {
        e.preventDefault();
        alert('Password minimal 8 karakter!');
        return false;
    }
    
    return true;
});
</script>
@endsection
