@extends('layouts.public')

@section('title', 'APBDES Desa Cibeureum')

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-dark-100 transition-colors duration-300 pt-20">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12">
        <!-- Header -->
        <div class="text-center mb-8 md:mb-12">
            <div class="inline-block px-4 py-2 bg-village-primary/10 text-village-primary rounded-full text-sm font-semibold mb-4">
                📊 APBDES
            </div>
            <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                Anggaran Pendapatan, Belanja dan Pembiayaan Desa
            </h1>
            <p class="text-base md:text-lg text-gray-600 dark:text-gray-400 max-w-3xl mx-auto">
                Transparansi penggunaan anggaran pendapatan, belanja, dan pembiayaan untuk pembangunan dan pelayanan masyarakat Desa Cibeureum
            </p>
        </div>

        <!-- Year Filter and Export -->
        <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">
            <form method="GET" class="flex items-center space-x-4">
                <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Tahun Anggaran:</label>
                <select name="tahun" onchange="this.form.submit()" 
                        class="px-4 py-2 border border-gray-300 dark:border-dark-400 rounded-lg focus:ring-2 focus:ring-village-primary focus:border-transparent dark:bg-dark-300 dark:text-white">
                    @forelse($tahunList as $year)
                        <option value="{{ $year }}" {{ $tahun == $year ? 'selected' : '' }}>{{ $year }}</option>
                    @empty
                        <option value="{{ date('Y') }}">{{ date('Y') }}</option>
                    @endforelse
                </select>
            </form>
            
            <a href="{{ route('public.apbdes.export.pdf', ['tahun' => $tahun]) }}" 
               class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg transition-colors duration-200 shadow-sm">
                <i class="fas fa-file-pdf mr-2"></i>
                Export PDF
            </a>
        </div>

        <!-- Summary Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 mb-8 md:mb-12">
            <div class="bg-white dark:bg-dark-300 rounded-lg shadow-sm border border-gray-200 dark:border-dark-400 p-4 md:p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center">
                            <i class="fas fa-arrow-up text-green-600 dark:text-green-400 text-lg"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Pendapatan</p>
                        <p class="text-lg md:text-xl font-bold text-green-600 dark:text-green-400">
                            {{ 'Rp ' . number_format($totalPendapatan, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-dark-300 rounded-lg shadow-sm border border-gray-200 dark:border-dark-400 p-4 md:p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 bg-red-100 dark:bg-red-900/30 rounded-lg flex items-center justify-center">
                            <i class="fas fa-arrow-down text-red-600 dark:text-red-400 text-lg"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Belanja</p>
                        <p class="text-xs text-gray-500 dark:text-gray-500 mb-1">(Termasuk Pembiayaan)</p>
                        <p class="text-lg md:text-xl font-bold text-red-600 dark:text-red-400">
                            {{ 'Rp ' . number_format($totalBelanjaKeseluruhan, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-dark-300 rounded-lg shadow-sm border border-gray-200 dark:border-dark-400 p-4 md:p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center">
                            <i class="fas fa-balance-scale text-blue-600 dark:text-blue-400 text-lg"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Saldo</p>
                        <p class="text-xs text-gray-500 dark:text-gray-500 mb-1">(Pendapatan - Total Belanja)</p>
                        <p class="text-lg md:text-xl font-bold {{ $saldo >= 0 ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
                            {{ 'Rp ' . number_format($saldo, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pendapatan Section -->
        <div class="bg-white dark:bg-dark-300 rounded-lg shadow-sm border border-gray-200 dark:border-dark-400 mb-8 overflow-hidden">
            <div class="bg-green-50 dark:bg-green-900/20 px-4 md:px-6 py-4 border-b border-gray-200 dark:border-dark-400">
                <h2 class="text-lg md:text-xl font-bold text-green-800 dark:text-green-400 flex items-center">
                    <i class="fas fa-arrow-up mr-2"></i>
                    Pendapatan Desa Tahun {{ $tahun }}
                </h2>
            </div>
            
            @if($pendapatan->count() > 0)
                <!-- Mobile View -->
                <div class="block md:hidden">
                    @foreach($pendapatan as $kategori => $items)
                        <div class="border-b border-gray-200 dark:border-dark-400 last:border-b-0">
                            <div class="bg-gray-50 dark:bg-dark-200 px-4 py-3 border-b border-gray-200 dark:border-dark-400">
                                <h3 class="font-semibold text-gray-900 dark:text-white text-sm">{{ $kategori }}</h3>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                    Total: {{ 'Rp ' . number_format($items->sum('jumlah'), 0, ',', '.') }}
                                </p>
                            </div>
                            @foreach($items as $item)
                                <div class="p-4 border-b border-gray-100 dark:border-dark-400 last:border-b-0">
                                    <div class="space-y-2">
                                        <h4 class="font-medium text-gray-900 dark:text-white text-sm">{{ $item->uraian }}</h4>
                                        <p class="text-lg font-bold text-green-600 dark:text-green-400">{{ $item->formatted_jumlah }}</p>
                                        @if($item->keterangan)
                                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $item->keterangan }}</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>

                <!-- Desktop View -->
                <div class="hidden md:block overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-dark-400">
                        <thead class="bg-gray-50 dark:bg-dark-200">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Kategori</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Uraian</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Jumlah</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-dark-300 divide-y divide-gray-200 dark:divide-dark-400">
                            @foreach($pendapatan as $kategori => $items)
                                @foreach($items as $index => $item)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-dark-200 transition-colors">
                                        @if($index === 0)
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white border-r border-gray-200 dark:border-dark-400" rowspan="{{ $items->count() }}">
                                                <div class="space-y-2">
                                                    <div>{{ $kategori }}</div>
                                                    <div class="text-xs text-green-600 dark:text-green-400 font-semibold">
                                                        Total: {{ 'Rp ' . number_format($items->sum('jumlah'), 0, ',', '.') }}
                                                    </div>
                                                </div>
                                            </td>
                                        @endif
                                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-white">{{ $item->uraian }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-bold text-green-600 dark:text-green-400">{{ $item->formatted_jumlah }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $item->keterangan ?? '-' }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="p-8 text-center">
                    <div class="text-gray-400 dark:text-gray-500 mb-4">
                        <i class="fas fa-inbox text-4xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">Belum ada data pendapatan</h3>
                    <p class="text-gray-500 dark:text-gray-400">Data pendapatan untuk tahun {{ $tahun }} belum tersedia</p>
                </div>
            @endif
        </div>

        <!-- Belanja Section -->
        <div class="bg-white dark:bg-dark-300 rounded-lg shadow-sm border border-gray-200 dark:border-dark-400 mb-8 overflow-hidden">
            <div class="bg-red-50 dark:bg-red-900/20 px-4 md:px-6 py-4 border-b border-gray-200 dark:border-dark-400">
                <h2 class="text-lg md:text-xl font-bold text-red-800 dark:text-red-400 flex items-center">
                    <i class="fas fa-arrow-down mr-2"></i>
                    Belanja Desa Tahun {{ $tahun }}
                </h2>
            </div>
            
            @if($belanja->count() > 0)
                <!-- Mobile View -->
                <div class="block md:hidden">
                    @foreach($belanja as $kategori => $items)
                        <div class="border-b border-gray-200 dark:border-dark-400 last:border-b-0">
                            <div class="bg-gray-50 dark:bg-dark-200 px-4 py-3 border-b border-gray-200 dark:border-dark-400">
                                <h3 class="font-semibold text-gray-900 dark:text-white text-sm">{{ $kategori }}</h3>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                    Total: {{ 'Rp ' . number_format($items->sum('jumlah'), 0, ',', '.') }}
                                </p>
                            </div>
                            @foreach($items as $item)
                                <div class="p-4 border-b border-gray-100 dark:border-dark-400 last:border-b-0">
                                    <div class="space-y-2">
                                        <h4 class="font-medium text-gray-900 dark:text-white text-sm">{{ $item->uraian }}</h4>
                                        <p class="text-lg font-bold text-red-600 dark:text-red-400">{{ $item->formatted_jumlah }}</p>
                                        @if($item->keterangan)
                                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $item->keterangan }}</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>

                <!-- Desktop View -->
                <div class="hidden md:block overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-dark-400">
                        <thead class="bg-gray-50 dark:bg-dark-200">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Kategori</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Uraian</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Jumlah</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-dark-300 divide-y divide-gray-200 dark:divide-dark-400">
                            @foreach($belanja as $kategori => $items)
                                @foreach($items as $index => $item)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-dark-200 transition-colors">
                                        @if($index === 0)
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white border-r border-gray-200 dark:border-dark-400" rowspan="{{ $items->count() }}">
                                                <div class="space-y-2">
                                                    <div>{{ $kategori }}</div>
                                                    <div class="text-xs text-red-600 dark:text-red-400 font-semibold">
                                                        Total: {{ 'Rp ' . number_format($items->sum('jumlah'), 0, ',', '.') }}
                                                    </div>
                                                </div>
                                            </td>
                                        @endif
                                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-white">{{ $item->uraian }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-bold text-red-600 dark:text-red-400">{{ $item->formatted_jumlah }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $item->keterangan ?? '-' }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="p-8 text-center">
                    <div class="text-gray-400 dark:text-gray-500 mb-4">
                        <i class="fas fa-inbox text-4xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">Belum ada data belanja</h3>
                    <p class="text-gray-500 dark:text-gray-400">Data belanja untuk tahun {{ $tahun }} belum tersedia</p>
                </div>
            @endif
        </div>

        <!-- Pembiayaan Section -->
        <div class="bg-white dark:bg-dark-300 rounded-lg shadow-sm border border-gray-200 dark:border-dark-400 mb-8 overflow-hidden">
            <div class="bg-yellow-50 dark:bg-yellow-900/20 px-4 md:px-6 py-4 border-b border-gray-200 dark:border-dark-400">
                <h2 class="text-lg md:text-xl font-bold text-yellow-800 dark:text-yellow-400 flex items-center">
                    <i class="fas fa-coins mr-2"></i>
                    Pembiayaan Desa Tahun {{ $tahun }}
                </h2>
            </div>
            
            @if($pembiayaan->count() > 0)
                <!-- Mobile View -->
                <div class="block md:hidden">
                    @foreach($pembiayaan as $kategori => $items)
                        <div class="border-b border-gray-200 dark:border-dark-400 last:border-b-0">
                            <div class="bg-gray-50 dark:bg-dark-200 px-4 py-3 border-b border-gray-200 dark:border-dark-400">
                                <h3 class="font-semibold text-gray-900 dark:text-white text-sm">{{ $kategori }}</h3>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                    Total: {{ 'Rp ' . number_format($items->sum('jumlah'), 0, ',', '.') }}
                                </p>
                            </div>
                            @foreach($items as $item)
                                <div class="p-4 border-b border-gray-100 dark:border-dark-400 last:border-b-0">
                                    <div class="space-y-2">
                                        <h4 class="font-medium text-gray-900 dark:text-white text-sm">{{ $item->uraian }}</h4>
                                        <p class="text-lg font-bold text-yellow-600 dark:text-yellow-400">{{ $item->formatted_jumlah }}</p>
                                        @if($item->keterangan)
                                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $item->keterangan }}</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>

                <!-- Desktop View -->
                <div class="hidden md:block overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-dark-400">
                        <thead class="bg-gray-50 dark:bg-dark-200">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Kategori</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Uraian</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Jumlah</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-dark-300 divide-y divide-gray-200 dark:divide-dark-400">
                            @foreach($pembiayaan as $kategori => $items)
                                @foreach($items as $index => $item)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-dark-200 transition-colors">
                                        @if($index === 0)
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white border-r border-gray-200 dark:border-dark-400" rowspan="{{ $items->count() }}">
                                                <div class="space-y-2">
                                                    <div>{{ $kategori }}</div>
                                                    <div class="text-xs text-yellow-600 dark:text-yellow-400 font-semibold">
                                                        Total: {{ 'Rp ' . number_format($items->sum('jumlah'), 0, ',', '.') }}
                                                    </div>
                                                </div>
                                            </td>
                                        @endif
                                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-white">{{ $item->uraian }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-bold text-yellow-600 dark:text-yellow-400">{{ $item->formatted_jumlah }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $item->keterangan ?? '-' }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="p-8 text-center">
                    <div class="text-gray-400 dark:text-gray-500 mb-4">
                        <i class="fas fa-inbox text-4xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">Belum ada data pembiayaan</h3>
                    <p class="text-gray-500 dark:text-gray-400">Data pembiayaan untuk tahun {{ $tahun }} belum tersedia</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
