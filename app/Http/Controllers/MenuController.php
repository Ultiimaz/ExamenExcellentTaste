<?php
/**
 * Created by PhpStorm.
 * User: rubje
 * Date: 24-Jan-19
 * Time: 09:26
 */

namespace App\Http\Controllers;
use App\Product;
use App\ProductCategory;


class MenuController
{

    public function index(){
        $producten = Product::all();
        $categories = ProductCategory::all();

        return view('menukaart', ['producten' => $producten, 'categories' => $categories]);

    }
}