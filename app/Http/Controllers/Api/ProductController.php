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
      //  return product::all();
      //  return response()->json(['message' => '200','data' =>  product::all()],200);
        return response()->json(['message' => '200','data' =>  product::all()],200);
    }

    public function show($id)
    {
        // return Product::find($id);
        return response()->json(['message' => '200','data' =>  Product::findOrFail($id)],200);
    }

    public function feature()
    {
        return response()->json(['message' => '200','data' =>  Product::where('is_featured',1)->get()],200);
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
