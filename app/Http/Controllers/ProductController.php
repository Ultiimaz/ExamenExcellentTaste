<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $producten = Product::all();

        return view('product.overzicht', compact('producten'));
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
}
