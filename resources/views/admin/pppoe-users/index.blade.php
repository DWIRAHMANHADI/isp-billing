<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPPoE Users</title>
</head>
<body>
    <h1>Daftar Pengguna PPPoE</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Nama Pelanggan</th>
                <th>Paket Internet</th>
                <th>ODP</th>
                <th>Tanggal Berlangganan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pppoeUsers as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->user->name }}</td>
                    <td>{{ $user->package->name }}</td>
                    <td>{{ $user->odp->name }}</td>
                    <td>{{ $user->subscription_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>