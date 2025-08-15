@extends('layouts.admin')

@section('title', 'Manajemen Anggota BPD')

@section('breadcrumb')
    <span class="mx-2">/</span>
    <a href="{{ route('admin.bpd.index') }}" class="text-gray-500 hover:text-village-primary transition-colors">Manajemen BPD</a>
    <span class="mx-2">/</span>
    <span class="text-village-primary">Anggota BPD</span>
@endsection

@section('content')

<!-- Page Header -->
<div class="mb-6 md:mb-8">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold bg-gradient-to-r from-village-primary to-village-secondary bg-clip-text text-transparent">
                Manajemen Anggota BPD
            </h1>
            <p class="text-gray-600 mt-1 md:mt-2 text-sm md:text-base">Kelola data anggota Badan Permusyawaratan Desa</p>
        </div>
        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.bpd.members.create') }}" class="inline-flex items-center px-4 py-2 bg-village-primary text-white rounded-lg hover:bg-village-secondary transition-colors text-sm font-medium shadow-lg">
                <i class="fas fa-plus mr-2"></i>
                Tambah Anggota
            </a>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
        <div class="flex items-center">
            <i class="fas fa-check-circle text-green-500 mr-3"></i>
            <span class="text-green-800 font-medium">{{ session('success') }}</span>
        </div>
    </div>
@endif

<!-- Members List -->
<div class="bg-white rounded-xl md:rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-village-primary/5 to-village-secondary/5">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <div class="w-8 h-8 bg-gradient-to-br from-village-primary to-village-secondary rounded-lg flex items-center justify-center shadow-lg mr-3">
                    <i class="fas fa-users text-white text-sm"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Daftar Anggota BPD</h3>
                    <p class="text-sm text-gray-500">{{ $members->count() }} anggota terdaftar</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="overflow-hidden">
        @if($members->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Foto</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Posisi</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden lg:table-cell">Telepon</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($members as $member)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <img src="{{ $member->photo_url }}" alt="{{ $member->name }}" 
                                         class="w-12 h-12 rounded-full object-cover shadow-sm border-2 border-gray-100">
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">{{ $member->name }}</div>
                                            @if($member->bio)
                                                <div class="text-xs text-gray-500 mt-1 hidden sm:block">{{ Str::limit($member->bio, 50) }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @php
                                        $positionColors = [
                                            'ketua' => 'from-blue-500 to-blue-600',
                                            'wakil_ketua' => 'from-purple-500 to-purple-600',
                                            'sekretaris' => 'from-green-500 to-green-600',
                                            'bendahara' => 'from-orange-500 to-orange-600',
                                            'anggota' => 'from-gray-500 to-gray-600'
                                        ];
                                        $color = $positionColors[$member->position] ?? 'from-gray-500 to-gray-600';
                                    @endphp
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium text-white bg-gradient-to-r {{ $color }}">
                                        {{ \App\Models\BpdMember::getPositionOptions()[$member->position] ?? $member->position }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 hidden md:table-cell">
                                    @if($member->email)
                                        <a href="mailto:{{ $member->email }}" class="text-village-primary hover:text-village-secondary transition-colors">
                                            {{ $member->email }}
                                        </a>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 hidden lg:table-cell">
                                    @if($member->phone)
                                        <a href="tel:{{ $member->phone }}" class="text-village-primary hover:text-village-secondary transition-colors">
                                            {{ $member->phone }}
                                        </a>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex items-center space-x-2">
                                        <a href="{{ route('admin.bpd.members.edit', $member->id) }}" 
                                           class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-blue-600 bg-blue-100 rounded-md hover:bg-blue-200 transition-colors">
                                            <i class="fas fa-edit mr-1"></i>
                                            <span class="hidden sm:inline">Edit</span>
                                        </a>
                                        <button type="button" onclick="showDeleteModal({{ $member->id }}, '{{ addslashes($member->name) }}')" 
                                                class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-red-600 bg-red-100 rounded-md hover:bg-red-200 transition-colors">
                                            <i class="fas fa-trash mr-1"></i>
                                            <span class="hidden sm:inline">Hapus</span>
                                        </button>
                                        <!-- Alternative simple delete form -->
                                        <form method="POST" action="{{ route('admin.bpd.members.destroy', $member->id) }}" class="inline" 
                                              onsubmit="return confirm('Yakin ingin menghapus {{ addslashes($member->name) }}?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center px-2 py-1 text-xs font-medium text-red-600 bg-red-50 rounded hover:bg-red-100 transition-colors ml-1" title="Hapus Langsung">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-12">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-users text-gray-400 text-2xl"></i>
                </div>
                <h4 class="text-lg font-medium text-gray-900 mb-2">Belum Ada Anggota BPD</h4>
                <p class="text-sm text-gray-500 mb-6">Tambahkan anggota BPD pertama untuk memulai</p>
                <a href="{{ route('admin.bpd.members.create') }}" class="inline-flex items-center px-4 py-2 bg-village-primary text-white rounded-lg hover:bg-village-secondary transition-colors text-sm font-medium">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah Anggota Pertama
                </a>
            </div>
        @endif
    </div>
</div>

<!-- Delete Modal -->
<div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <div class="flex items-center mb-4">
                <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                    <i class="fas fa-exclamation-triangle text-red-600"></i>
                </div>
            </div>
            <div class="text-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-2">Konfirmasi Hapus</h3>
                <p class="text-sm text-gray-500 mb-2">Apakah Anda yakin ingin menghapus anggota BPD <strong id="memberName"></strong>?</p>
                <p class="text-xs text-red-600">Tindakan ini tidak dapat dibatalkan.</p>
            </div>
            <div class="flex items-center justify-center space-x-3 mt-6">
                <button type="button" onclick="hideDeleteModal()" class="px-4 py-2 bg-gray-300 text-gray-800 text-sm font-medium rounded-md hover:bg-gray-400 transition-colors">
                    Batal
                </button>
                <form id="deleteForm" method="POST" action="" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 transition-colors">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
console.log('BPD Members page loaded');

function showDeleteModal(id, name) {
    console.log('showDeleteModal called with ID:', id, 'Name:', name);
    
    // Set member name in modal
    const memberNameEl = document.getElementById('memberName');
    if (memberNameEl) {
        memberNameEl.textContent = name;
    }
    
    // Set form action
    const form = document.getElementById('deleteForm');
    if (form) {
        form.action = '{{ url("/admin/bpd/members") }}/' + id;
        console.log('Form action set to:', form.action);
    } else {
        console.error('Delete form not found');
        return;
    }
    
    // Show modal
    const modal = document.getElementById('deleteModal');
    if (modal) {
        modal.classList.remove('hidden');
        console.log('Modal shown');
    } else {
        console.error('Delete modal not found');
    }
}

function confirmDelete(id, name) {
    // Legacy function for backward compatibility
    showDeleteModal(id, name);
}

function deleteMember(id) {
    // Legacy function for backward compatibility
    showDeleteModal(id, 'anggota ini');
}

function hideDeleteModal() {
    const modal = document.getElementById('deleteModal');
    if (modal) {
        modal.classList.add('hidden');
        console.log('Modal hidden');
    }
}

// Close modal when clicking outside
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('deleteModal');
    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                hideDeleteModal();
            }
        });
    }

    // Add form submit handler
    const deleteForm = document.getElementById('deleteForm');
    if (deleteForm) {
        deleteForm.addEventListener('submit', function(e) {
            console.log('Form submitted to:', this.action);
            console.log('Form method:', this.method);
            
            // Show loading state
            const submitBtn = this.querySelector('button[type="submit"]');
            if (submitBtn) {
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Menghapus...';
                submitBtn.disabled = true;
                
                // Re-enable if form submission fails
                setTimeout(() => {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                }, 5000);
            }
        });
    }
});

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        hideDeleteModal();
    }
});

// Test function - can be called from console
window.testDelete = function() {
    showDeleteModal(1, 'Test User');
};

console.log('BPD Members script loaded successfully');
</script>
@endpush
