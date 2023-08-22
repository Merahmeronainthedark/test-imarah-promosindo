<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = products::all();
    return view('home', compact('products'));
}
    public function tambah()
    {
        return view('tambah');
    }
    public function store_produk(Request $request)
    {
        $request->validate([
            'produk' => 'required',
            'slug' => 'required',
            'harga' => 'required',
            'kategori' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif', 
            'deskripsi' => 'required',
        ]);

    $input = $request->all();

    if ($image = $request->file('image')) {
        $destinationPath = 'image/';
        $imageName = $image->getClientOriginalName();
        $image->move($destinationPath, $imageName);
        $input['image'] = $imageName;
    }

    products::create($input);
    return redirect()->route('home')->with('success', 'Produk berhasil disimpan.');
}

    public function Edit($slug)
    {
        $products = products::where('slug', $slug)->first();
        return view('Edit', compact('products'));
    }
public function edit_produk(Request $request)
    {
        $request->validate([
            'produk' => 'required',
            'slug' => 'required',
            'harga' => 'required',
            'kategori' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif', 
        'deskripsi' => 'required',
    ]);

    $input = $request->all();

    if ($image = $request->file('image')) {
        $destinationPath = 'image/';
        $imageName = $image->getClientOriginalName();
        $image->move($destinationPath, $imageName);
        $input['image'] = $imageName;
    }

    products::create($input);
    return redirect()->route('edit_produk')->with('success', 'Produk berhasil disimpan.');
}
public function Delete(products $product)
{
    $product->delete();
    return redirect('/')->with('success', 'Data berhasil dihapus');
}
public function detail($slug)
{
$products = products::where('slug', $slug)->first();
if (!$products) {
    abort(404);
}
return view('detail', compact('products'));
}
}
