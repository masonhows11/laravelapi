<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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
    }

    public function destroy($id)
    {
    }
}
