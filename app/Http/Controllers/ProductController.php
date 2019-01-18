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
    public function store(Request $request)
    {
        $product->validate([
            'productomschrijving' => 'required',
            'prijs' => 'required'
        ]);
        $product = new Product([
            'productomschrijving' => $request->get('productomschrijving'),
            'prijs'=> $request->get('prijs')
        ]);
        $product->save();
        return redirect('/shares')->with('success', 'Stock has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('edit', compact('product','id'));
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
    public function destroy($id)
    {
        //
    }
}