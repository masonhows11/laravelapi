<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        return product::all();
    }

    public function show($id)
    {
        return Product::find($id);
    }

    public function feature()
    {
        
    }

    public function sponsor()
    {
        
    }

    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'price' => 'required',

        ]);
        return product::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'price' => $request->price,
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([

            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'price' => 'required',

        ]);

        $product = Product::find($id);
        $product->update($request->all());
        return $product;

       /* return product::where('id',$id)->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'price' => $request->price,
        ]);*/
    }

    public function destroy($id)
    {
        return Product::destroy($id);
    }

    public function search($slug)
    {
        return Product::where('slug','like','%'.$slug.'%')->get();
    }
}
