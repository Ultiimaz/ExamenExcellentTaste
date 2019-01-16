<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
class ReserveerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reservering.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
//        dd($request);
        if(!$request['aantalgasten'])
        {
            return back()->withInput()->with('status',"U moet eerst aantal gasten invullen!");
        }
        $reservation = new Reservation;
        $reservation->fill($request->toArray());

        return route("reserveer");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        return Response()->json("fdjgklkfg");
//        return Route('overzicht');
    }
}
