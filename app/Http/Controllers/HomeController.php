<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderPick;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        return view('layouts/dashboard');
        //return view('home');
        $user = Auth::user();


        $reserveringen = Reservation::where('klantnummer', $user->klantnummer)->get();
        return view('home', ['user' => $user, 'reserveringen' => $reserveringen]);

    }
}
