<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Detail Produk</h2>
        <div class="card">
        <div class="card-header">
                <h4>{{$products->produk}}</h4>
            </div>
            
            <div class="card-body">
                <img src="{{asset('image/'.$products->image)}}" alt="jpeg" class="img-fluid mb-3">
                <p>{{ $products->deskripsi }}</p>
            </div>          
        </div>

        <div class="mt-3">
            <a href="/" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('Edit', $products->slug) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('delete', ['id' => $products->id]) }}" method="POST" class="d-inline">
                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Delete</button>
            </form>
        </div>
    </div>
</body>
</html>