<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

class ProductController extends Controller
{
     public function show(Request $request, Product $product) {
        $product = Product::all();
        return view('index', compact('product'));
     }
}
