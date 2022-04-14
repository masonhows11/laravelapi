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

    public function product($id)
    {

    }

    public function store(Request $request)
    {
        return product::create([
            'name' => 'Product one',
            'slug' => 'Product-one',
            'description' => 'this is product one',
            'price' => '99.99',

        ]);
    }
    

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }

}
