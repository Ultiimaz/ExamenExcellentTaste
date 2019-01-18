<?php

namespace App\Http\Controllers;

use App\Profiel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;

class ProfielController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'voorletter'=>'required',
            'achternaam'=>'required',
            'telefoon'=>'required',
            'adres'=>'required',
            'postcode'=>'required',
            'plaats'=>'required'
        ]);

        $user = User::find($id);
        $user->voorletter = $request->get('voorletter');
        $user->voorvoegsel = $request->get('voorvoegsel');
        $user->achternaam = $request->get('achternaam');
        $user->telefoon = $request->get('telefoon');
        $user->adres = $request->get('adres');
        $user->postcode = $request->get('postcode');
        $user->plaats = $request->get('plaats');

        $user->save();

        return redirect('/profiel')->with('status', 'Profiel is aangepast');
    }


}