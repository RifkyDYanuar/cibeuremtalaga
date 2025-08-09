@extends('layouts.admin')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-user text-white"></i>
                    </div>
                    Detail User
                </h1>
                <nav class="flex items-center space-x-2 text-sm text-gray-600 mt-2">
                    <a href="{{ route('admin.dashboard') }}" class="hover:text-emerald-600 transition-colors duration-200">
                        <i class="fas fa-home"></i>
                        Dashboard
                    </a>
                    <i class="fas fa-chevron-right text-gray-400"></i>
                    <a href="{{ route('admin.users.index') }}" class="hover:text-emerald-600 transition-colors duration-200">Manajemen User</a>
                    <i class="fas fa-chevron-right text-gray-400"></i>
                    <span class="text-gray-800 font-medium">Detail User</span>
                </nav>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.users.index') }}" 
                   class="inline-flex items-center px-4 py-2 bg-gray-500 text-white font-medium rounded-lg hover:bg-gray-600 transition-all duration-200">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>
                <a href="{{ route('admin.users.edit', $user->id) }}" 
                   class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-medium rounded-lg hover:from-emerald-700 hover:to-teal-700 transition-all duration-200">
                    <i class="fas fa-edit mr-2"></i>
                    Edit User
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-7xl mx-auto mb-8">
        <!-- Profile Card -->
        <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-emerald-600 to-teal-600">
                <h3 class="text-lg font-semibold text-white flex items-center gap-2">
                    <i class="fas fa-user-circle"></i>
                    Profil User
                </h3>
            </div>
            
            <div class="p-8">
                <!-- Profile Header -->
                <div class="flex flex-col sm:flex-row items-center gap-6 mb-8">
                    <div class="w-20 h-20 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-full flex items-center justify-center text-white text-2xl font-bold">
                        {{ strtoupper(substr($user->name, 0, 2)) }}
                    </div>
                    <div class="text-center sm:text-left">
                        <h4 class="text-2xl font-bold text-gray-900 mb-1">{{ $user->name }}</h4>
                        <p class="text-gray-600 mb-3">{{ $user->email }}</p>
                        <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-sm font-medium
                            @if($user->role == 'admin') bg-purple-100 text-purple-800 @else bg-blue-100 text-blue-800 @endif">
                            @if($user->role == 'admin')
                                <i class="fas fa-user-shield"></i> Admin
                            @else
                                <i class="fas fa-user"></i> User
                            @endif
                        </span>
                    </div>
                </div>
                
                <!-- Profile Stats -->
                <div class="grid grid-cols-3 gap-4">
                    <div class="text-center p-4 bg-gray-50 rounded-lg border border-gray-200">
                        <div class="text-sm font-medium text-gray-600 mb-1">User ID</div>
                        <div class="text-lg font-bold text-gray-900">{{ $user->id }}</div>
                    </div>
                    <div class="text-center p-4 bg-gray-50 rounded-lg border border-gray-200">
                        <div class="text-sm font-medium text-gray-600 mb-1">Terdaftar</div>
                        <div class="text-lg font-bold text-gray-900">{{ $user->created_at ? $user->created_at->format('d M Y') : '-' }}</div>
                    </div>
                    <div class="text-center p-4 bg-gray-50 rounded-lg border border-gray-200">
                        <div class="text-sm font-medium text-gray-600 mb-1">Update</div>
                        <div class="text-lg font-bold text-gray-900">{{ $user->updated_at ? $user->updated_at->format('d M Y') : '-' }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Activity Stats Card -->
        <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-blue-600 to-purple-600">
                <h3 class="text-lg font-semibold text-white flex items-center gap-2">
                    <i class="fas fa-chart-line"></i>
                    Aktivitas User
                </h3>
            </div>
            
            <div class="p-8">
                <div class="grid grid-cols-2 gap-4">
                    <!-- Total Pengajuan -->
                    <div class="flex items-center gap-4 p-4 bg-emerald-50 rounded-lg border border-emerald-200">
                        <div class="w-12 h-12 bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-lg flex items-center justify-center text-white">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-gray-900">{{ $user->pengajuans->count() }}</div>
                            <div class="text-sm text-gray-600">Total Pengajuan</div>
                        </div>
                    </div>
                    
                    <!-- Pengajuan Disetujui -->
                    <div class="flex items-center gap-4 p-4 bg-green-50 rounded-lg border border-green-200">
                        <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 rounded-lg flex items-center justify-center text-white">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-gray-900">{{ $user->pengajuans->where('status', 'Disetujui')->count() }}</div>
                            <div class="text-sm text-gray-600">Disetujui</div>
                        </div>
                    </div>
                    
                    <!-- Pengajuan Pending -->
                    <div class="flex items-center gap-4 p-4 bg-yellow-50 rounded-lg border border-yellow-200">
                        <div class="w-12 h-12 bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-lg flex items-center justify-center text-white">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-gray-900">{{ $user->pengajuans->where('status', 'Pending')->count() }}</div>
                            <div class="text-sm text-gray-600">Pending</div>
                        </div>
                    </div>
                    
                    <!-- Pengajuan Ditolak -->
                    <div class="flex items-center gap-4 p-4 bg-red-50 rounded-lg border border-red-200">
                        <div class="w-12 h-12 bg-gradient-to-r from-red-500 to-red-600 rounded-lg flex items-center justify-center text-white">
                            <i class="fas fa-times-circle"></i>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-gray-900">{{ $user->pengajuans->where('status', 'Ditolak')->count() }}</div>
                            <div class="text-sm text-gray-600">Ditolak</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($user->pengajuans->count() > 0)
    <!-- Recent Submissions -->
    <div class="max-w-7xl mx-auto">
        <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-indigo-600 to-purple-600">
                <h3 class="text-lg font-semibold text-white flex items-center gap-2">
                    <i class="fas fa-history"></i>
                    Pengajuan Terbaru
                </h3>
            </div>
            
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Surat</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($user->pengajuans->take(10) as $pengajuan)
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm font-medium text-gray-600">#{{ $pengajuan->id }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-file-contract text-emerald-500"></i>
                                    <span class="text-sm text-gray-900">{{ $pengajuan->jenisSurat->nama ?? 'N/A' }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex flex-col">
                                    <span class="text-sm font-medium text-gray-900">{{ $pengajuan->created_at ? $pengajuan->created_at->format('d M Y') : '-' }}</span>
                                    <span class="text-xs text-gray-500">{{ $pengajuan->created_at ? $pengajuan->created_at->format('H:i') : '-' }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-medium
                                    @if($pengajuan->status == 'Pending') bg-yellow-100 text-yellow-800
                                    @elseif($pengajuan->status == 'Disetujui') bg-green-100 text-green-800
                                    @elseif($pengajuan->status == 'Ditolak') bg-red-100 text-red-800
                                    @endif">
                                    @if($pengajuan->status == 'Pending')
                                        <i class="fas fa-clock"></i> Pending
                                    @elseif($pengajuan->status == 'Disetujui')
                                        <i class="fas fa-check"></i> Disetujui
                                    @elseif($pengajuan->status == 'Ditolak')
                                        <i class="fas fa-times"></i> Ditolak
                                    @endif
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('admin.pengajuan.detail', $pengajuan->id) }}" 
                                   class="inline-flex items-center gap-1 px-3 py-1 bg-blue-600 text-white text-xs font-medium rounded-lg hover:bg-blue-700 transition-colors duration-200">
                                    <i class="fas fa-eye"></i> Detail
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
