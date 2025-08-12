<!DOCTYPE html>
<html>
<head>
    <title>Upload File TXT</title>
</head>
<body>
    <h2>Pilih File TXT</h2>
    <form method="POST" action="{{ route('upload.file') }}" enctype="multipart/form-data">
        @csrf
        <input type="file" name="txtfile" accept=".txt" required>
        <br><br>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
