<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk Baru</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Tambah Produk Baru</h2>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Nama Produk</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label>Foto Produk</label>
                <input type="file" name="image" class="form-control-file">
            </div>
            <div class="form-group">
                <label>Stok</label>
                <input type="number" name="stock" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="price" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Produk</button>
        </form>
    </div>
</body>
</html>
