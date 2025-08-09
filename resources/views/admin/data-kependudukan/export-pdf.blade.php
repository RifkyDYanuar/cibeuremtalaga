<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Kependudukan - {{ $tanggal_export }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 10px;
            margin: 0;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }
        .header h1 {
            margin: 0;
            font-size: 18px;
            color: #333;
        }
        .header h2 {
            margin: 5px 0;
            font-size: 14px;
            color: #666;
        }
        .info {
            margin-bottom: 15px;
        }
        .info-row {
            display: inline-block;
            margin-right: 20px;
            margin-bottom: 5px;
        }
        .filters {
            background-color: #f5f5f5;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .filters h3 {
            margin: 0 0 5px 0;
            font-size: 12px;
        }
        .stats {
            display: table;
            width: 100%;
            margin-bottom: 20px;
        }
        .stat-item {
            display: table-cell;
            text-align: center;
            padding: 10px;
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            width: 25%;
        }
        .stat-number {
            font-size: 16px;
            font-weight: bold;
            color: #333;
        }
        .stat-label {
            font-size: 10px;
            color: #666;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 4px;
            text-align: left;
            font-size: 8px;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
            text-align: center;
        }
        .text-center {
            text-align: center;
        }
        .footer {
            margin-top: 20px;
            font-size: 8px;
            color: #666;
            text-align: right;
        }
        .status-aktif {
            background-color: #d4edda;
            color: #155724;
            padding: 2px 4px;
            border-radius: 3px;
            font-size: 7px;
        }
        .status-pindah {
            background-color: #fff3cd;
            color: #856404;
            padding: 2px 4px;
            border-radius: 3px;
            font-size: 7px;
        }
        .status-meninggal {
            background-color: #f8d7da;
            color: #721c24;
            padding: 2px 4px;
            border-radius: 3px;
            font-size: 7px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>DATA KEPENDUDUKAN</h1>
        <h2>DESA [DESA CIBEUREUM]</h2>
        <p>Tanggal Export: {{ $tanggal_export }}</p>
    </div>

    <!-- Statistik -->
    <div class="stats">
        <div class="stat-item">
            <div class="stat-number">{{ $statistik['total_penduduk'] }}</div>
            <div class="stat-label">Total Penduduk</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">{{ $statistik['laki_laki'] }}</div>
            <div class="stat-label">Laki-laki</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">{{ $statistik['perempuan'] }}</div>
            <div class="stat-label">Perempuan</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">{{ $statistik['kepala_keluarga'] }}</div>
            <div class="stat-label">Kepala Keluarga</div>
        </div>
    </div>

    @if($filters['search'] || $filters['jenis_kelamin'] || $filters['status'] || $filters['rt'])
    <div class="filters">
        <h3>Filter yang Diterapkan:</h3>
        @if($filters['search'])
            <span class="info-row"><strong>Pencarian:</strong> {{ $filters['search'] }}</span>
        @endif
        @if($filters['jenis_kelamin'])
            <span class="info-row"><strong>Jenis Kelamin:</strong> {{ $filters['jenis_kelamin'] }}</span>
        @endif
        @if($filters['status'])
            <span class="info-row"><strong>Status:</strong> {{ ucfirst($filters['status']) }}</span>
        @endif
        @if($filters['rt'])
            <span class="info-row"><strong>RT:</strong> {{ $filters['rt'] }}</span>
        @endif
    </div>
    @endif
    <table>
        <thead>
            <tr>
                <th style="width: 3%;">No</th>
                <th style="width: 12%;">NIK</th>
                <th style="width: 15%;">Nama</th>
                <th style="width: 3%;">JK</th>
                <th style="width: 10%;">Tempat/Tgl Lahir</th>
                <th style="width: 4%;">Usia</th>
                <th style="width: 15%;">Alamat</th>
                <th style="width: 4%;">RT/RW</th>
                <th style="width: 8%;">Agama</th>
                <th style="width: 10%;">Pekerjaan</th>
                <th style="width: 8%;">Pendidikan</th>
                <th style="width: 8%;">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penduduk as $index => $p)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td>{{ $p->nik }}</td>
                <td>{{ $p->nama }}</td>
                <td class="text-center">{{ $p->jenis_kelamin == 'Laki-laki' ? 'L' : 'P' }}</td>
                <td>{{ $p->tempat_lahir }}, {{ $p->tanggal_lahir ? $p->tanggal_lahir->format('d/m/Y') : '' }}</td>
                <td class="text-center">{{ $p->usia }}th</td>
                <td>{{ $p->alamat }}</td>
                <td class="text-center">{{ $p->rt }}/{{ $p->rw }}</td>
                <td>{{ $p->agama }}</td>
                <td>{{ $p->pekerjaan }}</td>
                <td>{{ $p->pendidikan }}</td>
                <td class="text-center">
                    @if($p->status == 'aktif' || $p->status == 'Aktif')
                        <span class="status-aktif">Aktif</span>
                    @elseif($p->status == 'pindah' || $p->status == 'Pindah')
                        <span class="status-pindah">Pindah</span>
                    @else
                        <span class="status-meninggal">Meninggal</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Dicetak pada: {{ date('d F Y H:i:s') }} | Total: {{ $penduduk->count() }} data</p>
    </div>
</body>
</html>
