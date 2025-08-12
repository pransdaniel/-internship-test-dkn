<!DOCTYPE html>
<html>
<head>
    <title>Edit Tabungan</title>
</head>
<body>
    <h2>Edit Data Tabungan</h2>
    <p><strong>File:</strong> {{ $file }}</p>

    <form method="POST" action="{{ route('update') }}">
        @csrf
        <table border="1" cellpadding="5">
            <thead>
                <tr>
                    @foreach($rows[0] as $col)
                        <th><input type="text" name="header[]" value="{{ $col }}" readonly></th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach(array_slice($rows, 1) as $i => $row)
                    <tr>
                        @foreach($row as $j => $col)
                            <td><input type="text" name="data[{{ $i }}][{{ $j }}]" value="{{ $col }}"></td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <button type="submit">Simpan</button>
    </form>
    <br>
    <a href="{{ route('read') }}">Kembali</a>
</body>
</html>
