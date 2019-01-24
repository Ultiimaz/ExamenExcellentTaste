<?php

namespace App\Http\Controllers;

use App\TableReservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Symfony\Component\Console\Helper\Table;

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
    protected function generateReserveernummer() {
        $number = substr( rand() * 900000 + 100000, 0, 5 );

        if ($this->checkIfExists($number)) {
            return $this->generateReserveernummer();
        }

        return intval($number);
    }

    /**
     * Check if klantnummer exists
     */
    protected function checkIfExists($number) {
        return DB::table('reserveringen')->where('reserveernummer', $number)->exists();
    }

    public function create(Request $request)
    {
        if(!$request->input('aantal_gasten') )
        {
            return back()->withInput()->with('status',"U moet eerst aantal gasten invullen!");
        }
        if($request->input('aantal_gasten') == 0)
        {
            return back()->withInput()->with('status',"U moet minimaal 1 gast invullen bij aantal gasten!");
        }
        if(!$request->input('tafel1') )
        {
            return back()->withInput()->with('status',"U moet minimaal 1 tafel kiezen!");
        }
        $reservation = new Reservation;
        $reservation->reserveernummer = $this->generateReserveernummer();
        $reservation->aantalGasten = intval($request->input('aantal_gasten'));
        $reservation->klantnummer = Auth::user()->klantnummer;
        $reservation->datum = $request['datum'];

        DB::table('tafelreserveringen')->where('tafelnummer',$request->input('tafel1'))->update(
             [
                'tijdin'=> Carbon::parse($request->input('datum')),
                'tijduit'=> Carbon::parse($request->input('datum'))->addMinute(intval($request->input('time'))),
                'reserveernummer' => $reservation->reserveernummer
             ]
         );
         if($request->has('tafel2')){
             DB::table('tafelreserveringen')->where('tafelnummer',$request->input('tafel2'))->update(
                 [
                     'tijdin'=> Carbon::parse($request->input('datum')),
                     'tijduit'=> Carbon::parse($request->input('datum'))->addMinute(intval($request->input('time'))),
                     'reserveernummer' => $reservation->reserveernummer
                 ]
             );
         }

         $reservation->save();
        return redirect('reserveer')->with('status','de reservering is geplaatst!');
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
