<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;



class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if (Auth::user()->status == 2) {
            $order = Order::all();
            $product = Product::all();
            $reservering = Reservation::all();

            return view('order.overzicht', ['orders' => $order, 'producten' =>$product, 'reservering' => $reservering] );
        } else {
            return redirect('/home');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function create(Request $request) {
        $order = new Order();
        $order->device = 1;
        $order->timestamp = Carbon::now();
        $order->productnummer = $request->get('aantalbesteld');
        $order->aantalbesteld = $request->input('aantalbesteld');
        $order->save();

        return redirect('/bestellingen')->with('status', 'Categorie is toegevoegd');
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
}

