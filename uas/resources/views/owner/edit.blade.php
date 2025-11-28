<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Produk</h2>
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nama Produk</label>
                <input type="text" name="name" class="form-control" value="{{ $product['name'] }}" required>
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="description" class="form-control">{{ $product['description'] }}</textarea>
            </div>
            <div class="form-group">
                <label>Foto Produk</label>
                <input type="file" name="image" class="form-control-file">
                <p>Foto saat ini: <img src="{{ asset('storage/images/' . $product['image']) }}" width="100"></p>
            </div>
            <div class="form-group">
                <label>Stok</label>
                <input type="number" name="stock" class="form-control" value="{{ $product['stock'] }}" required>
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="price" class="form-control" value="{{ $product['price'] }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Perbarui Produk</button>
        </form>
    </div>
</body>
</html>

