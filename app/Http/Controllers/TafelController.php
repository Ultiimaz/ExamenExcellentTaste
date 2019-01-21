<?php

namespace App\Http\Controllers;

use App\TableData;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TafelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tafels = TableData::all();

        return view('tafel.overzicht', compact('tafels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'aantalstoelen' => 'required|int'
        ]);
        $tafel = new TableData();
        $tafel->aantalstoelen = $request->get('aantalstoelen');
        if ($request->input('status') == 1) {
            $statusvalue = 1;
        } else {
            $statusvalue = 0;
        }
        $tafel->status = $statusvalue;
        $tafel->save();

        return redirect('/tafels')->with('status', 'Tafel is toegevoegd');
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
            'aantalstoelen' => 'required|string'
        ]);
        $tafel = TableData::find($id);
        $tafel->aantalstoelen = $request->get('aantalstoelen');
        if ($request->input('status') == 1) {
            $statusvalue = 1;
        } else {
            $statusvalue = 0;
        }
        $tafel->status = $statusvalue;
        $tafel->save();

        return redirect('/tafels')->with('status', 'Tafel is aangepast');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function delete($id)
    {
        $tafel = TableData::find($id);
        $tafel->delete();

        return redirect('/tafels')->with('status', 'Tafel is verwijderd');
    }
}
