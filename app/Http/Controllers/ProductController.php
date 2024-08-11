<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $itemPerPage = 5;
        if (!empty ($keyword)) {
            $products = Product::where('name', 'LIKE', "%$keyword%")->orWhere('category', 'LIKE', "%$keyword%")->latest()->paginate($itemPerPage);
        } else {
            $products = Product::latest()->paginate($itemPerPage);
        }
        return view("product.index", ["products" => $products])->with("i", (request()->input("page", 1) - 1) * $itemPerPage);
    }
    public function create()
    {
        return view('product.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $product = new Product;

        $fileName = time() . ' . ' . request()->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $fileName);
        // Product::select(['*'])->wheres(['name' => $request->name])->get();

        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = $fileName;
        $product->category = $request->category;
        $product->quantity = $request->quantity;
        $product->price = $request->price;

        $product->save();
        return redirect()->route('products.index')->with('message', "Product added successfully");
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));
    }
    public function update(Request $req)
    {

        $req->validate([
            "name" => 'required',
        ]);
        if (file_exists(public_path('images/' . $req->image))) {
            $fileName = $req->image;
        } else {
            $fileName = time() . ' . ' . request()->image->getClientOriginalExtension();
            $req->image->move(public_path('images'), $fileName);
        }
        $product = Product::findOrFail($req->id);
        $product->name = $req->name;
        $product->description = $req->description;
        $product->image = $fileName;
        $product->category = $req->category;
        $product->quantity = $req->quantity;
        $product->price = $req->price;

        $product->save();

        return redirect()->route("products.index")->with('message', "Product updated successfully");
    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $imagePath = public_path() . '/images/';
        $image = $imagePath . $product->image;
        if (file_exists($image)) {
            unlink($image);
        }
        $product->delete();
        return redirect()->route("products.index")->with('message', "Product deleted successfully");
    }
}