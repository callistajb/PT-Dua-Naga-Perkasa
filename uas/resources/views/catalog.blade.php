<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Katalog Produk</title>
    <link rel="stylesheet" href="{{ asset('css/catalog.css') }}">
</head>
<body>
    <!-- Taskbar -->
    <div class="taskbar">
        <img src="{{ asset('storage/images/logo.png') }}" alt="Company Logo" class="taskbar-logo">
        <span class="taskbar-title">PT. Dua Naga Perkasa</span>
    </div>

    <div class="container mt-5">
        <h2 class="text-center">Katalog Produk</h2>

        <!-- Button Add Product -->
        <div class="add-product-btn">
            <a href="{{ route('products.create') }}">Tambah Produk Baru</a>
        </div>

        <!-- Search Bar -->
        <form action="{{ route('index') }}" method="GET" class="search-form">
            <input type="text" name="search" placeholder="Cari produk..." value="{{ request()->query('search') }}" class="search-input">
            <button type="submit" class="search-button">Cari</button>
        </form>

        <!-- Success Message Pop-up -->
        @if(session('success'))
            <script>
                alert("{{ session('success') }}");
            </script>
        @endif

        <!-- Product Grid -->
        <div class="row">
            @forelse($products as $index => $product)
                <div class="col-md-4 mb-3">
                    <div class="card product-card">
                        <img src="{{ isset($product['image']) ? Storage::url('images/' . $product['image']) : asset('images/default-image.jpg') }}" class="card-img-top" alt="{{ $product['name'] }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product['name'] }}</h5>
                            <p class="card-text">{{ $product['description'] }}</p>
                            <p>Stok: {{ $product['stock'] }}</p>
                            <p>Harga: Rp{{ number_format($product['price'], 0, ',', '.') }}</p>

                            <!-- Action Buttons -->
                            <a href="{{ route('products.edit', $product['id']) }}" class="btn btn-warning">Edit</a>

                            <!-- Delete Form -->
                            <form action="{{ route('products.destroy', $product['id']) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>

                            <!-- Contact Button -->
                            <a href="https://wa.me/628111444861?text=Saya%20tertarik%20dengan%20produk%20{{ urlencode($product['name']) }}" class="btn btn-success mt-2">Hubungi Penjual</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p>Tidak ada produk yang tersedia.</p>
                </div>
            @endforelse
        </div>
    </div>
</body>
</html>
