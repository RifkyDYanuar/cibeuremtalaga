<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pengajuan Surat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            font-size: 18px;
            margin: 0;
        }
        .header p {
            margin: 5px 0;
        }
        .stats {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }
        .stat-item {
            text-align: center;
            border: 1px solid #ddd;
            padding: 10px;
            margin: 0 5px;
            border-radius: 5px;
        }
        .stat-value {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }
        .stat-label {
            font-size: 12px;
            color: #666;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .status-pending {
            color: #ff9800;
        }
        .status-disetujui {
            color: #4caf50;
        }
        .status-ditolak {
            color: #f44336;
        }
        .filter-info {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #f5f5f5;
            border-radius: 5px;
        }
        .filter-info p {
            margin: 2px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>LAPORAN PENGAJUAN SURAT</h1>
        <p>Sistem Informasi Desa (SiDesa)</p>
        <p>Periode: {{ Carbon\Carbon::parse($startDate)->format('d M Y') }} - {{ Carbon\Carbon::parse($endDate)->format('d M Y') }}</p>
    </div>

    <div class="filter-info">
        <p><strong>Filter yang Digunakan:</strong></p>
        <p>Tanggal: {{ Carbon\Carbon::parse($startDate)->format('d M Y') }} - {{ Carbon\Carbon::parse($endDate)->format('d M Y') }}</p>
        <p>Status: {{ $status ? ucfirst($status) : 'Semua Status' }}</p>
        <p>Jenis Surat: {{ $jenisSurat ? 'Terfilter' : 'Semua Jenis Surat' }}</p>
    </div>

    <div class="stats">
        <div class="stat-item">
            <div class="stat-value">{{ $totalPengajuan }}</div>
            <div class="stat-label">Total Pengajuan</div>
        </div>
        <div class="stat-item">
            <div class="stat-value">{{ $pengajuanPending }}</div>
            <div class="stat-label">Pending</div>
        </div>
        <div class="stat-item">
            <div class="stat-value">{{ $pengajuanDisetujui }}</div>
            <div class="stat-label">Disetujui</div>
        </div>
        <div class="stat-item">
            <div class="stat-value">{{ $pengajuanDitolak }}</div>
            <div class="stat-label">Ditolak</div>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pemohon</th>
                <th>Email</th>
                <th>Jenis Surat</th>
                <th>Status</th>
                <th>Tanggal Pengajuan</th>
                <th>Catatan Admin</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pengajuans as $index => $pengajuan)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $pengajuan->user->name ?? 'Tidak diketahui' }}</td>
                <td>{{ $pengajuan->user->email ?? 'Tidak diketahui' }}</td>
                <td>{{ $pengajuan->jenisSurat->nama ?? 'Tidak diketahui' }}</td>
                <td class="status-{{ strtolower($pengajuan->status) }}">
                    {{ $pengajuan->status }}
                </td>
                <td>{{ $pengajuan->created_at ? $pengajuan->created_at->format('d/m/Y H:i') : '-' }}</td>
                <td>{{ $pengajuan->catatan_admin ?? '-' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align: center; padding: 20px; color: #999;">
                    Tidak ada data pengajuan dalam periode ini
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 30px; font-size: 10px; color: #666;">
        <p>Laporan ini digenerate pada: {{ now()->format('d M Y H:i') }}</p>
    </div>
</body>
</html>
