<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data Kriteria</title>
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
    <h2>Data Kriteria</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kriteria</th>
                <th>Bobot</th>
                <th>Atribut</th>
                <th>Tanggal Diperbarui</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @forelse ($criterias as $criteria)
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $criteria->nama }}</td>
                    <td>{{ $criteria->bobot }}</td>
                    <td>{{ $criteria->atribut }}</td>
                    <td>{{ $criteria->updated_at->format('d-m-Y') }}</td>
                </tr>
                @php $no++; @endphp
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;">Data Kosong!</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>
