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
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;



class MenuController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */


    public function index(){
        $producten = Product::all();
        $categories = ProductCategory::all();

        return view('menukaart', ['producten' => $producten, 'categories' => $categories]);

    }
}