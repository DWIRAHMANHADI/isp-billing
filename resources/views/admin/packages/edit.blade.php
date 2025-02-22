<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Paket Internet</title>
</head>
<body>
    <h1>Edit Paket Internet</h1>
    <form action="{{ route('admin.packages.update', $package->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Nama Paket:</label>
        <input type="text" name="name" id="name" value="{{ $package->name }}" required>
        <br>
        <label for="upload_speed">Upload Speed (Mbps):</label>
        <input type="number" name="upload_speed" id="upload_speed" value="{{ $package->upload_speed }}" required>
        <br>
        <label for="download_speed">Download Speed (Mbps):</label>
        <input type="number" name="download_speed" id="download_speed" value="{{ $package->download_speed }}" required>
        <br>
        <label for="price">Harga:</label>
        <input type="number" name="price" id="price" value="{{ $package->price }}" required>
        <br>
        <button type="submit">Update</button>
    </form>
</body>
</html>