<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Penilaian</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #999;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #eee;
        }
    </style>
</head>
<body>
    <h2>Data Penilaian</h2>

    <table>
        <thead>
            <tr>
                <th>Ranking</th>
                <th>Nama Santri</th>
                @if (!empty($hasil[0]['detail']))
                    @foreach (array_keys($hasil[0]['detail']) as $kriteria)
                        <th>{{ $kriteria }}</th>
                    @endforeach
                @endif
                <th>Nilai Akhir</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($hasil as $index => $row)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $row['nama'] }}</td>
                    @foreach ($row['detail'] as $nilai)
                        <td>{{ number_format($nilai, 2) }}</td>
                    @endforeach
                    <td>{{ number_format($row['nilai_akhir'], 2) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="100%" style="text-align: center;">Data Kosong!</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
