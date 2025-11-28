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

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('products.update', $id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nama Produk</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $product['name']) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea name="description" class="form-control" id="description">{{ old('description', $product['description']) }}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Gambar Produk</label>
                <input type="file" name="image" class="form-control" id="image">
                @if($product['image'])
                    <img src="{{ asset('storage/images/' . $product['image']) }}" alt="{{ $product['name'] }}" class="mt-3" width="100">
                @endif
            </div>

            <div class="form-group">
                <label for="stock">Stok</label>
                <input type="number" name="stock" class="form-control" id="stock" value="{{ old('stock', $product['stock']) }}" required>
            </div>

            <div class="form-group">
                <label for="price">Harga</label>
                <input type="text" name="price" class="form-control" id="price" value="{{ old('price', $product['price']) }}" required>
            </div>

            <button type="submit" class="btn btn-success">Perbarui Produk</button>
        </form>
    </div>
</body>
</html>
