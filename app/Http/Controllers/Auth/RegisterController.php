<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Random klantnummer a customer receives after registration
     *
     * @var string
     */
    public $klantnummer;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%@]).*$/'],
            'achternaam' => ['required', 'string', 'max:255'],
            'voorvoegsel' => ['nullable', 'string', 'max:255'],
            'voorletter' => ['required', 'string', 'max:1'],
            'adres' => ['required', 'string', 'regex:/^([1-9][e][\s])*([a-zA-Z]+(([\.][\s])|([\s]))?)+[1-9][0-9]*(([-][1-9][0-9]*)|([\s]?[a-zA-Z]+))?$/i'],
            'postcode' => ['required', 'string', 'regex:/^[1-9][0-9]{3}[\s]?[A-Za-z]{2}$/i'],
            'plaats' => ['required', 'string', 'max:255'],
            'telefoon' => ['required', 'string'],
            'g-recaptcha-response' => 'required|captcha'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $this->klantnummer = $this->generateKlantnummer();

        return User::create([
            'klantnummer' => $this->klantnummer,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'achternaam' => $data['achternaam'],
            'voorvoegsel' => $data['voorvoegsel'],
            'voorletter' => $data['voorletter'],
            'adres' => $data['adres'],
            'postcode' => $data['postcode'],
            'plaats' => $data['plaats'],
            'telefoon' => $data['telefoon']
        ]);
    }

    /**
     * Create random klantnummer
     */
    protected function generateKlantnummer() {
        $number = substr( rand() * 900000 + 100000, 0, 5 );

        if ($this->checkIfExists($number)) {
            return $this->generateKlantnummer();
        }

        return $number;
    }

    /**
     * Check if klantnummer exists
     */
    protected function checkIfExists($number) {
        return DB::table('users')->where('klantnummer', $number)->exists();
    }
}
