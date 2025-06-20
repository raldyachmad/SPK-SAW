<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Santri</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #999; padding: 8px; text-align: left; }
        th { background-color: #eee; }
    </style>
</head>
<body>
    <h2>Data Santri</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Diperbarui</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($santris as $no => $santri)
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $santri->nama }}</td>
                    <td>{{ $santri->jenis_kelamin }}</td>
                    <td>{{ $santri->updated_at->format('d-m-Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Data Kosong</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
