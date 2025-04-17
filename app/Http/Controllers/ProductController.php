<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'image' => 'required|image|mimes:png,jpg,jpeg'
        ]);

        $imagePath = $request->file('image')->store('product', 'public');

        Product::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'stok' => $validated['stok'],
            'image' => $imagePath,
        ]);

        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product', 'public');
            $product->image = $imagePath;
        }

        $product->name = $validated['name'];
        $product->price = $validated['price'];
        $product->stok = $validated['stok'];
        $product->save();

        return redirect()->route('product.index')->with('success', 'Produk berhasil diupdate.');
    }

    public function updateStock(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'stok' => 'required|integer|min:0',
        ]);

        $product->stok = $request->stok;
        $product->save();

        return redirect()->route('product.index')->with('success', 'Stok berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image && \Storage::disk('public')->exists($product->image)) {
            \Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus.');
    }
}
