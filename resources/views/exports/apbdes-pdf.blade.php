<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APBDES Desa Cibeureum {{ $tahun }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
            line-height: 1.4;
            color: #333;
        }
        
        .container {
            max-width: 100%;
            margin: 0 auto;
            padding: 20px;
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #2563eb;
            padding-bottom: 20px;
        }
        
        .header h1 {
            font-size: 20px;
            font-weight: bold;
            color: #1e40af;
            margin-bottom: 8px;
        }
        
        .header h2 {
            font-size: 16px;
            color: #374151;
            margin-bottom: 4px;
        }
        
        .header p {
            font-size: 12px;
            color: #6b7280;
        }
        
        .summary-cards {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            gap: 20px;
        }
        
        .summary-card {
            flex: 1;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
        }
        
        .summary-card.pendapatan {
            border-left: 4px solid #10b981;
        }
        
        .summary-card.belanja {
            border-left: 4px solid #ef4444;
        }
        
        .summary-card.pembiayaan {
            border-left: 4px solid #f59e0b;
        }
        
        .summary-card.saldo {
            border-left: 4px solid #3b82f6;
        }
        
        .summary-card h3 {
            font-size: 11px;
            color: #6b7280;
            margin-bottom: 5px;
            text-transform: uppercase;
            font-weight: 600;
        }
        
        .summary-card .amount {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 2px;
        }
        
        .summary-card.pendapatan .amount {
            color: #10b981;
        }
        
        .summary-card.belanja .amount {
            color: #ef4444;
        }
        
        .summary-card.pembiayaan .amount {
            color: #f59e0b;
        }
        
        .summary-card.saldo .amount {
            color: #3b82f6;
        }
        
        .section {
            margin-bottom: 30px;
            page-break-inside: avoid;
        }
        
        .section-header {
            background: #f1f5f9;
            border: 1px solid #cbd5e1;
            border-radius: 6px 6px 0 0;
            padding: 12px 15px;
            margin-bottom: 0;
        }
        
        .section-header.pendapatan {
            background: #ecfdf5;
            border-color: #a7f3d0;
        }
        
        .section-header.belanja {
            background: #fef2f2;
            border-color: #fecaca;
        }
        
        .section-header.pembiayaan {
            background: #fffbeb;
            border-color: #fed7aa;
        }
        
        .section-header h2 {
            font-size: 14px;
            font-weight: bold;
            color: #374151;
        }
        
        .section-header.pendapatan h2 {
            color: #047857;
        }
        
        .section-header.belanja h2 {
            color: #dc2626;
        }
        
        .section-header.pembiayaan h2 {
            color: #d97706;
        }
        
        .data-table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #cbd5e1;
            border-top: none;
        }
        
        .data-table th,
        .data-table td {
            border: 1px solid #e2e8f0;
            padding: 8px 10px;
            text-align: left;
            vertical-align: top;
        }
        
        .data-table th {
            background: #f8fafc;
            font-weight: 600;
            font-size: 11px;
            color: #374151;
            text-transform: uppercase;
        }
        
        .data-table td {
            font-size: 11px;
        }
        
        .kategori-cell {
            font-weight: 600;
            background: #f9fafb;
            border-right: 2px solid #d1d5db;
        }
        
        .amount-cell {
            text-align: right;
            font-weight: 600;
        }
        
        .amount-cell.pendapatan {
            color: #047857;
        }
        
        .amount-cell.belanja {
            color: #dc2626;
        }
        
        .amount-cell.pembiayaan {
            color: #d97706;
        }
        
        .kategori-total {
            font-size: 10px;
            color: #6b7280;
            margin-top: 3px;
        }
        
        .no-data {
            text-align: center;
            padding: 30px;
            color: #6b7280;
            font-style: italic;
            background: #f9fafb;
            border: 1px solid #e2e8f0;
            border-top: none;
        }
        
        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 2px solid #e2e8f0;
            font-size: 10px;
            color: #6b7280;
            text-align: center;
        }
        
        .footer p {
            margin-bottom: 5px;
        }
        
        .page-break {
            page-break-before: always;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>ANGGARAN PENDAPATAN, BELANJA DAN PEMBIAYAAN DESA</h1>
            <h2>DESA CIBEUREUM</h2>
            <p>Tahun Anggaran {{ $tahun }}</p>
        </div>

        <!-- Summary Cards -->
        <div class="summary-cards">
            <div class="summary-card pendapatan">
                <h3>Total Pendapatan</h3>
                <div class="amount">{{ 'Rp ' . number_format($totalPendapatan, 0, ',', '.') }}</div>
            </div>
            <div class="summary-card belanja">
                <h3>Total Belanja</h3>
                <div style="font-size: 9px; color: #6b7280; margin-bottom: 3px;">(Termasuk Pembiayaan)</div>
                <div class="amount">{{ 'Rp ' . number_format($totalBelanjaKeseluruhan, 0, ',', '.') }}</div>
            </div>
            <div class="summary-card saldo">
                <h3>Saldo</h3>
                <div style="font-size: 9px; color: #6b7280; margin-bottom: 3px;">(Pendapatan - Total Belanja)</div>
                <div class="amount">{{ 'Rp ' . number_format($saldo, 0, ',', '.') }}</div>
            </div>
        </div>

        <!-- Pendapatan Section -->
        <div class="section">
            <div class="section-header pendapatan">
                <h2>PENDAPATAN DESA TAHUN {{ $tahun }}</h2>
            </div>
            
            @if($pendapatan->count() > 0)
                <table class="data-table">
                    <thead>
                        <tr>
                            <th style="width: 25%">Kategori</th>
                            <th style="width: 45%">Uraian</th>
                            <th style="width: 20%">Jumlah</th>
                            <th style="width: 10%">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendapatan as $kategori => $items)
                            @foreach($items as $index => $item)
                                <tr>
                                    @if($index === 0)
                                        <td class="kategori-cell" rowspan="{{ $items->count() }}">
                                            <div>{{ $kategori }}</div>
                                            <div class="kategori-total">
                                                Total: {{ 'Rp ' . number_format($items->sum('jumlah'), 0, ',', '.') }}
                                            </div>
                                        </td>
                                    @endif
                                    <td>{{ $item->uraian }}</td>
                                    <td class="amount-cell pendapatan">{{ $item->formatted_jumlah }}</td>
                                    <td>{{ $item->keterangan ?? '-' }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="no-data">
                    Belum ada data pendapatan untuk tahun {{ $tahun }}
                </div>
            @endif
        </div>

        <!-- Belanja Section -->
        <div class="section page-break">
            <div class="section-header belanja">
                <h2>BELANJA DESA TAHUN {{ $tahun }}</h2>
            </div>
            
            @if($belanja->count() > 0)
                <table class="data-table">
                    <thead>
                        <tr>
                            <th style="width: 25%">Kategori</th>
                            <th style="width: 45%">Uraian</th>
                            <th style="width: 20%">Jumlah</th>
                            <th style="width: 10%">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($belanja as $kategori => $items)
                            @foreach($items as $index => $item)
                                <tr>
                                    @if($index === 0)
                                        <td class="kategori-cell" rowspan="{{ $items->count() }}">
                                            <div>{{ $kategori }}</div>
                                            <div class="kategori-total">
                                                Total: {{ 'Rp ' . number_format($items->sum('jumlah'), 0, ',', '.') }}
                                            </div>
                                        </td>
                                    @endif
                                    <td>{{ $item->uraian }}</td>
                                    <td class="amount-cell belanja">{{ $item->formatted_jumlah }}</td>
                                    <td>{{ $item->keterangan ?? '-' }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="no-data">
                    Belum ada data belanja untuk tahun {{ $tahun }}
                </div>
            @endif
        </div>

        <!-- Pembiayaan Section -->
        <div class="section">
            <div class="section-header pembiayaan">
                <h2>PEMBIAYAAN DESA TAHUN {{ $tahun }}</h2>
            </div>
            
            @if($pembiayaan->count() > 0)
                <table class="data-table">
                    <thead>
                        <tr>
                            <th style="width: 25%">Kategori</th>
                            <th style="width: 45%">Uraian</th>
                            <th style="width: 20%">Jumlah</th>
                            <th style="width: 10%">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pembiayaan as $kategori => $items)
                            @foreach($items as $index => $item)
                                <tr>
                                    @if($index === 0)
                                        <td class="kategori-cell" rowspan="{{ $items->count() }}">
                                            <div>{{ $kategori }}</div>
                                            <div class="kategori-total">
                                                Total: {{ 'Rp ' . number_format($items->sum('jumlah'), 0, ',', '.') }}
                                            </div>
                                        </td>
                                    @endif
                                    <td>{{ $item->uraian }}</td>
                                    <td class="amount-cell pembiayaan">{{ $item->formatted_jumlah }}</td>
                                    <td>{{ $item->keterangan ?? '-' }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="no-data">
                    Belum ada data pembiayaan untuk tahun {{ $tahun }}
                </div>
            @endif
        </div>

        <!-- Footer -->
        <div class="footer">
            <p><strong>APBDES Desa Cibeureum Tahun {{ $tahun }}</strong></p>
            <p>Dokumen ini digenerate secara otomatis pada {{ date('d/m/Y H:i') }} WIB</p>
            <p>Data yang ditampilkan merupakan informasi resmi yang telah melalui proses verifikasi</p>
        </div>
    </div>
</body>
</html>
