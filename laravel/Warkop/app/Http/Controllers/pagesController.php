<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function Landingpages()
    {
        $products = Products::with('kategoriprd')->get();
        return view('pages.landingpages', compact('products'));
    }
}
