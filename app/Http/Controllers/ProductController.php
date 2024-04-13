<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductType;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $data['title'] = 'Product';
        $data['table'] = Product::with('productType')->get();
        $data['type'] = ProductType::all();
        return view('admin.product',$data);
    }
    public function post(Request $request){
        $product = new Product();
        $product->name = $request->name;
        $product->type = $request->type;
        $product->size = $request->size;
        $product->color = strtoupper($request->color);
        $product->stock  = $request->stok;
        $product->hpp = getAmount($request->hpp);
        $product->harga_jual = getAmount($request->harga_jual);
        $product->save();

        return redirect()->back()->with('success','Produk Dibuat');
    }
    public function edit(Request $request,$id){
        $product = Product::find($id);
        $product->name = $request->name;
        $product->type = $request->type;
        $product->size = $request->size;
        $product->color = strtoupper($request->color);
        $product->stock  = $request->stok;
        $product->hpp = getAmount($request->hpp);
        $product->harga_jual = getAmount($request->harga_jual);
        $product->save();

        return redirect()->back()->with('success','Produk Dibuat');
    }
}

