<?php

namespace App\Http\Controllers;
use App\Product;

use App\ProductCategory;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(){
        $producten = Product::all();
        $categories = ProductCategory::all();
//        dd($producten->category_id);

        return view('landing', compact('producten', 'categories'));

    }
}
