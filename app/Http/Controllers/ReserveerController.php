<?php

namespace App\Http\Controllers;

use App\TableReservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class ReserveerController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
private $volgnummer = 0;
    protected function generateReserveernummerWithDatum($date,$tafel1 = 00,$tafel2 = 00)
    {


        $number = $date.$tafel1.$tafel2. $this->volgnummer;
        if ($this->checkIfExists($number)) {
                $this->volgnummer++;
        return $number;
        }

        return $number;
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


        $reservation = new Reservation;
        if($request->has('tafel2') )
        {
            $reservation->reserveernummer = $this->generateReserveernummerWithDatum(Carbon::parse($request['datum'])->format('Ymd'),$request['tafel1'],$request['tafel2']);
        }else
        {
            $reservation->reserveernummer = $this->generateReserveernummerWithDatum(Carbon::parse($request['datum'])->format('Ymd'), $request->input('tafel1'));
        }
        $reservation->aantalGasten = intval($request->input('aantal_gasten'));
        $reservation->klantnummer = Auth::user()->klantnummer;
        $reservation->datum = Carbon::parse($request['datum']);
        $reservation->dieetwensen = $request['dieetwensen'];
        $reservation->tijd = $request['time'];

        DB::table('tafelreserveringen')->where('tafelnummer',$request->input('tafel1'))->update(
             [
                'tijdin'=> Carbon::parse($request->input('datum')),
                'tijduit'=> Carbon::parse($request->input('datum'))->addMinute(intval($request->input('time'))),
                'reserveernummer' => $reservation->reserveernummer
             ]
         );
         if($request->has('tafel2'))
         {
             DB::table('tafelreserveringen')->where('tafelnummer',$request->input('tafel2'))->update(
                 [
                     'tijdin'=> Carbon::parse($request->input('datum')),
                     'tijduit'=> Carbon::parse($request->input('datum'))->addMinute(intval($request->input('time'))),
                     'reserveernummer' => $reservation->reserveernummer
                 ]
             );
         }

         $reservation->save();
        return response()->json('de reservering is geplaatst!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */




    public function tables(Request $request)
    {
        $all = TableReservation::all();
        $col = $all;
         $table =DB::table('tafelreserveringen')
             ->whereDate('tijdin' ,'<=',Carbon::parse($request->input('datum')))
             ->whereDate('tijduit','>=',Carbon::parse($request->input('datum')));
            foreach($col as $collection)
            {
                foreach($table->get() as $entity)
                {
                    if($entity->tafelnummer == $collection->tafelnummer)
                    {
                        $col->forget($entity->tafelnummer - 1);
                    }
                }
            }
        return response()->json($col->toArray());
    }


}
