<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paket Internet</title>
</head>
<body>
    <h1>Daftar Paket Internet</h1>
    <a href="{{ route('admin.packages.create') }}">Tambah Paket Baru</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Paket</th>
                <th>Upload Speed</th>
                <th>Download Speed</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($packages as $package)
                <tr>
                    <td>{{ $package->id }}</td>
                    <td>{{ $package->name }}</td>
                    <td>{{ $package->upload_speed }} Mbps</td>
                    <td>{{ $package->download_speed }} Mbps</td>
                    <td>Rp {{ number_format($package->price, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('admin.packages.edit', $package->id) }}">Edit</a>
                        <form action="{{ route('admin.packages.destroy', $package->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>