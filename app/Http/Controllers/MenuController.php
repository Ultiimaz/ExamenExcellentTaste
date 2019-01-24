<?php
/**
 * Created by PhpStorm.
 * User: rubje
 * Date: 24-Jan-19
 * Time: 09:26
 */

namespace App\Http\Controllers;
use App\Product;


class MenuController
{

    public function index(){
        $producten = Product::all();


        return view('menukaart', compact('producten'));

    }
}