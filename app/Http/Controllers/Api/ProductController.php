<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function get()
    {
        $products = DB::table('products')->get();
        // return response()->json($products);
        return $products;
    }

    public function create(Request $request)
    {
       $products_create =  DB::table('products')->insert([
                        'code' => $request->product_code,
                        'name' => $request->product_name,
                        'price' => $request->product_price,
                        'category' => $request->product_category,
                        'quantity' => $request->product_quantity
                        ]);
        return response()->json($products_create);
        // return $products_create;
    }

    public function update(Request $request)
    {
        $products_update = DB::table('products')->where('id',$request->id)->update([
                            'code' => $request->product_code,
                            'name' => $request->product_name,
                            'price' => $request->product_price,
                            'category' => $request->product_category,
                            'quantity' => $request->product_quantity
                            ]);
        return response()->json($products_update);
    }

    public function delete($id)
    {
       $products_delete =  DB::table('products')->where('id',$id)->delete();
        return response()->json($products_delete);
    }

    public function getById($id)
    {
        $products_byId = DB::table('products')->where('id', $id)->get();

        // return request()->user()->tokens()->delete();
        return response()->json($products_byId);

    }

}
