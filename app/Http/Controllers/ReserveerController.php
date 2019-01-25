<?php

namespace App\Http\Controllers;

use App\TableReservation;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use App\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Symfony\Component\Console\Helper\Table;

class ReserveerController extends Controller
{
    private $volgnummer = 0;


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
    public function index()
    {
        $reserveringen =Reservation::where('klantnummer',Auth::user()->klantnummer);

        return view('reservering.index',['reserveringen' =>$reserveringen]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    protected function generateReserveernummerWithDatum($date,$tafel1 = 00,$tafel2 = 00)
    {
        $number = $date.$tafel1.$tafel2. $this->volgnummer;
        if ($this->checkIfExists($number)) {
            $this->volgnummer++;
            return $this->generateReserveernummerWithDatum($date,$tafel1,$tafel2);
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

            $tafel1 = $request->input('tafel1') || 1;

        $reservation = new Reservation;
        if($request->has('tafel2') )
        {
            $reservation->reserveernummer = intval($this->generateReserveernummerWithDatum(Carbon::parse($request['datum'])->format('Ymd'),$request['tafel2'],$request['tafel2']));
        }else
        {
            $reservation->reserveernummer = intval($this->generateReserveernummerWithDatum($request['datum'],$tafel1));
        }
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
        return response()->json('de reservering is geplaatst!');
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
        if(!$request->input('aantal_gasten') )
        {
            return back()->withInput()->with('status',"U moet eerst aantal gasten invullen!");
        }
        if($request->input('aantal_gasten') == 0)
        {
            return back()->withInput()->with('status',"U moet minimaal 1 gast invullen bij aantal gasten!");
        }

        $reservation = Reservation::find($id);
        if($request->has('tafel2') )
        {
            $reservation->reserveernummer = intval($this->generateReserveernummerWithDatum(Carbon::parse($request['datum'])->format('Ymd'),$request['tafel2'],$request['tafel2']));
        }else
        {
            $reservation->reserveernummer = intval($this->generateReserveernummerWithDatum($request['datum'],$tafel1));
        }
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
        return response()->json('de reservering is geplaatst!');
    }

    public function tables(Request $request)
    {
        $all = TableReservation::all();
        $col = $all;
         $table =DB::table('tafelreserveringen')
             ->whereDate('tijdin' ,'<=',Carbon::parse($request->input('datum')))
             ->whereDate('tijdin','>=',Carbon::parse($request->input('datum'))->addMinute(120));

//        for($i= 0; $i < count($col->toArray());$i++)
//        {
//            foreach($table->get() as $entity)
//            {
//                if($entity->tafelnummer == $all[$i]->tafelnummer)
//                {
//                    ddd($col);
//                    $col->forget($entity);
//                }
//            }
//
//        }

            foreach($col as $collection)
            {
                foreach($table->get() as $entity)
                {
                    if($entity->tafelnummer == $collection->tafelnummer)
                    {
                        $col->forget($entity);
                    }
                }
            }
        return response()->json($col->toArray());

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $user = Auth::user();
        $reservering = Reservation::where('reserveernummer', $id);
        if($reservering->first()->klantnummer== $user->klantnummer)
        {
            $reservering->delete();
//            return response()->json("je moeder is een pietje");
        }
        return redirect('reserveer/lijst');
    }
}
