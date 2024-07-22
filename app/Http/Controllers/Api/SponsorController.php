<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sponser;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    //
    public function sponsor()
    {
        return response()->json(['message' => '200','data' =>  Sponser::all()],200);
    }
}
