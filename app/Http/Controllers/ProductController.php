<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    private function validate(Request $request)
    {
        $request->validate([
            "name" => "unique:products,name",
            "description" => "required",
            "store_id" => "required|numeric",
            "price" => "required|numeric"
        ]);
    }
    public function index()
    {
        // hiển thị toàn bộ products
        $products = Product::paginate(5);
        // foreach ($products as $product) {
        //     echo $product->name;
        // }
        return view("products.index", compact("products"));
    }
    public function store(Request $request)
    {
        // controller add product
        $this->validate($request);

        Product::create($request->all());
        return redirect()->back()->with("success", "them moi thanh cong");
    }
    public function create()
    {
        // view thêm product
        $stores = Store::all();
        return view("products.create", compact("stores"));
    }
    public function edit($id)
    {
        // view sửa product
        $stores = Store::all();
        $product = Product::find($id);
        return view("products.edit", compact("stores", "product"));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request);
        $product = Product::find($id);
        $product->update($request->all());
        return redirect()->back()->with("success", "cap nhat thanh cong");
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with("success", "Xoa thanh cong");
    }
}
