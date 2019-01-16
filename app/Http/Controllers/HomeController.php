<?php

namespace App\Http\Controllers;

use App\Order;
use App\Reservation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        //$phone = Reservation::find(12345678)->customer();
        //dd($phone);

//        $x = new Order;
//        $x->device=1;
//        $x->timestamp=1000;
//        $x->productnummer=2400;
//        $x->reserveernummer=12455;
//        $x->prijsbetaald='0.00';
//        $x->aantalbesteld=1;
//        $x->save();

        return view('home');

    }
}
