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
    public function store(Request $request)
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
    return redirect()->route('home')->with('success', 'Produk berhasil ditambahkan.');
}

    public function Edit($id)
    {
        $products = products::where('id', $id)->first();
        return view('Edit', compact('products'));
    }
    public function edit_produk(Request $request, $id)
    {
        $request->validate([
            'produk' => 'required',
            'harga' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
        ]);
    
        $product = products::where('id', $id)->firstOrFail();
        $input = $request->all();
    
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $imageName = $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);
            $input['image'] = $imageName;
        } else {
            unset($input['image']);
        }
    
        $product->update($input);
    
        return redirect()->route('home', ['id' => $product->id])->with('success', 'Produk berhasil diperbarui.');
    }
    
public function Delete($id)
{
    $product=products::where('id', $id)->delete();
    return redirect('/')->with('success', 'Data berhasil dihapus');
}
public function detail($id)
{
$products = products::where('id', $id)->first();
return view('detail', compact('products'));
}
}
