<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
     public function show(){
        $product = Product::all();
        return view('index', compact('product'));
     }
}