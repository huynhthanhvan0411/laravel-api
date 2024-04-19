<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

class ProductController extends Controller
{
     public function show(Request $request){
        // Kiểm tra xem session có tồn tại không
        if ($request->session()->has('products')) {
            // Nếu session tồn tại, lấy dữ liệu từ session
            $products = $request->session()->get('products');
        } else {
            // Nếu không tồn tại, lấy dữ liệu từ database và lưu vào session
            $products = Product::all();
            $request->session()->put('products', $products);
        }

        // Kiểm tra xem cookie có tồn tại không
        if ($request->cookie('product_ids')) {
            // Nếu cookie tồn tại, lấy ID sản phẩm từ cookie
            $productIds = json_decode($request->cookie('product_ids'), true);
        } else {
            // Nếu không tồn tại, tạo một mảng rỗng
            $productIds = [];
        }

        // Lọc ra các sản phẩm dựa trên ID từ cookie
        $cartProducts = collect($products)->whereIn('id', $productIds);
        return view('index', compact('product'));
     }
}