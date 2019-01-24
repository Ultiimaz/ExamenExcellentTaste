<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if (Auth::user()->status == 2){
            $producten = Product::all();
            $categories = ProductCategory::all();

            return view('product.overzicht', ['producten' => $producten, 'categories' => $categories]);
        }
        else{
            return redirect('/home');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'productomschrijving' => 'required',
            'prijs' => 'required'
        ]);
        $product = new Product;
        $product->productomschrijving = $request->get('productomschrijving');
        $product->prijs = floatval($request->get('prijs'));
        $product->category_id = $request->get('category');
        $product->save();

        return redirect('/producten')->with('status', 'Product is toegevoegd');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'productomschrijving'=>'required'
        ]);

        $product = Product::find($id);
        $product->productomschrijving = $request->get('productomschrijving');
        $product->prijs = $request->get('prijs');
        $product->category_id = $request->get('category');
        $product->save();

        return redirect('/producten')->with('status', 'Product is aangepast');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect('/producten')->with('status', 'Product is verwijderd');
    }

    /**
     * Create product category
     *
     * @return Response
     */
    public function categoriesCreate(Request $request) {
        $category = new ProductCategory();
        $category->category_name = $request->get('categoryname');
        $category->save();

        return redirect('/producten')->with('status', 'Categorie is toegevoegd');
    }

    /**
     * Removes product category
     *
     * @param int $id
     * @return Response
     */
    public function categoriesDelete($id) {
        $category = ProductCategory::find($id);
        $category->delete();

        return redirect('/producten')->with('status', 'Categorie is verwijderd');
    }
}
