<?php

namespace App\Http\Controllers;

use App\Profiel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

class ProfielController extends Controller
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

    /**
     * Edit user password
     *
     * @param int $id
     * @return Response
     */
    public function resetPassword(Request $request, $id) {
        $request->validate([
            'currentpassword'=>'required',
            'password'=> ['required', 'min:8', 'confirmed', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%@]).*$/'],
            'g-recaptcha-response' => 'required|captcha'
        ]);

        $knownhash = User::find($id);
        $requestedpassword = $request['currentpassword'];

        if (Hash::check($requestedpassword ,$knownhash->password))
        {
            $knownhash->password = Hash::make($request['password']);

            return redirect('/profiel')->with('password', 'Wachtwoord is gewijzigd');
        } else {
            return redirect('/profiel')->with('password', 'Bestaande wachtwoord is incorrect');
        }

    }


}