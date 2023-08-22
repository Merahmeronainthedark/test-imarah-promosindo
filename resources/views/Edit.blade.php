<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Tambah Produk</h2>
        <form action="{{ route('edit_produk'), $products->slug }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="nama">products</label>
                <input type="text" class="form-control" id="produk" name="nama" value="{{ $products->produk }}" required>
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" value="{{ $products->slug }}" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" value="{{ $products->harga }}" required>
            </div>
            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select class="form-control" id="kategori" name="kategori" required>
                    <option value="digital_printing">Digital Printing</option>
                    <option value="spanduk">Spanduk</option>
                    <option value="poster">Poster</option>
                </select>
            </div>
            <div class="form-group">
                <label for="foto">Foto</label>
                <img src="{{asset('image/'.$products->image)}}" alt="jpeg" class="img-fluid mb-3">
                <input type="file" class="form-control-file" id="image" name="foto" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi"  rows="4" value="{{ $products->deskripsi }}" required ></textarea>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="/" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
