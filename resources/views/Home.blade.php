<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Daftar Produk</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($products  as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->produk }}</td>
                    <td>{{ $data->harga }}</td>
                    <td>
                        <a href="{{ route('detail', $data->slug) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('Edit', $data->slug) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('delete', ['id' => $data->id]) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="/tambah" class="btn btn-success">Tambah Produk</a>
    </div>
</body>
</html>