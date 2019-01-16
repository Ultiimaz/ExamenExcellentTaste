<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderPick;
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

//        $test1 = Reservation::find(12345679)->customer();

//        $flights = Order::findOrFail([1, 21578, 2400]);
        $flights= Order::where('device', 1)->where('timestamp', 21578)->where('productnummer', 2400)->get();
//        dd(new Order);
        dd($flights);

        return view('home');

    }
}
