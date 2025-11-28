<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Tambahkan import model Product

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        // Cek apakah ada query pencarian
        $search = $request->query('search');
        $query = Product::query();

        if ($search) {
            $query->where('name', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%");
        }

        // Ambil semua produk dari database
        $products = $query->get();

        return view('catalog', compact('products'));
    }

    public function create()
    {
        return view('owner.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        // Upload gambar
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $validatedData['image'] = basename($imagePath);
        }

        // Simpan produk ke database
        Product::create($validatedData);

        // Redirect ke halaman utama dengan pesan sukses
        return redirect()->route('index')->with('success', 'Produk berhasil ditambahkan');
    }


    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        // Cari produk berdasarkan ID
        $product = Product::findOrFail($id);

        // Upload gambar jika ada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $validatedData['image'] = basename($imagePath);
        }

        // Update data produk di database
        $product->update($validatedData);

        // Redirect ke halaman utama dengan pesan sukses
        return redirect()->route('index')->with('success', 'Produk berhasil diperbarui');
    }

    public function edit($id)
    {
        // Ambil produk dari database berdasarkan ID
        $product = Product::findOrFail($id);

        // Tampilkan halaman edit dengan data produk
        return view('owner.edit', compact('product'));
    }


    public function destroy($id)
    {
        // Cari produk berdasarkan ID
        $product = Product::findOrFail($id);

        // Hapus produk dari database
        $product->delete();

        // Redirect ke halaman utama dengan pesan sukses
        return redirect()->route('index')->with('success', 'Produk berhasil dihapus');
    }



}
