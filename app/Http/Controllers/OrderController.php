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

            return view('order.overzicht', ['orders' => $order, 'producten' =>$product, 'reserveringen' => $reservering] );
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
        $request->validate([
            'productnummer'=>'required',
            'reserveernummer'=>'required',
            'aantalbesteld'=>'required',
        ]);


        $order = new Order();
        $order->device = 1;
        $order->timestamp = Carbon::now();
        $order->productnummer = $request->get('productnummer');
        $order->aantalbesteld = $request->input('aantalbesteld');
        $order->reserveernummer = $request->input('reserveernummer');
        $order->save();

        return redirect('/bestellingen')->with('status', 'Bestelling is toegevoegd');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function delete($id)
    {
//        $product = Order::find($id);
         Order::where('timestamp',$id)->delete();
//        $product->delete();

        return redirect('/bestellingen')->with('status', 'Bestelling is verwijderd');
    }
}

