<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        // mengambil data dari table products
        $products = DB::table('products')->get();

        // mengirim data products ke view products
        return view('products',['products' => $products]);
    }

    public function addProducts()
    {
        return view('addProducts');
    }

    public function save(Request $request)
    {
        // insert data ke table products
        $db =  DB::table('products')->insert([
            'code' => $request->product_code,
            'name' => $request->product_name,
            'price' => $request->product_price,
            'category' => $request->product_category,
            'quantity' => $request->product_quantity
            ]);
        return redirect('/products');
    }

    public function edit($id)
    {
        // mengambil data pegawai berdasarkan id yang dipilih
        $products = DB::table('products')->where('id',$id)->get();
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('editProducts',['products' => $products]);

    }

    public function update(Request $request)
    {
        // dd($request);
        DB::table('products')->where('id',$request->id)->update([
            'code' => $request->product_code,
            'name' => $request->product_name,
            'price' => $request->product_price,
            'category' => $request->product_category,
            'quantity' => $request->product_quantity
        ]);

        // alihkan halaman ke halaman products
        return redirect('/products');
    }

    public function delete($id)
    {
        //  dd($request);
        // menghapus data products berdasarkan id yang dipilih
        DB::table('products')->where('id', $id)->delete();

        // alihkan halaman ke halaman products
        return redirect('/products');
    }
}
