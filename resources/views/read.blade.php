<!DOCTYPE html>
<html>
<head>
    <title>Read Tabungan</title>
</head>
<body>
    <h2>Daftar Tabungan</h2>
    <p><strong>File:</strong> {{ $file }}</p>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="5">
        <thead>
            <tr>
                @foreach($rows[0] as $col)
                    <th>{{ $col }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach(array_slice($rows, 1) as $row)
                <tr>
                    @foreach($row as $col)
                        <td>{{ $col }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <a href="{{ route('edit') }}">Edit Data</a> |
    <a href="{{ route('upload.form') }}">Pilih File Lain</a>
</body>
</html>
