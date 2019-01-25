<?php

    namespace App\Http\Controllers;

    use App\TableData;
    use App\User;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Hash;

    class UserController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return Response
         */
        public function __construct()
        {
            $this->middleware(['auth','verified']);
        }
        public function index()
        {
            if (Auth::user()->status == 2){
            $users = User::all();
                return view('user.overzicht', compact('users'));

            }
            else{
                return redirect('/');
            }

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
                'achternaam' => ['required', 'string', 'max:255'],
                'voorvoegsel' => ['nullable', 'string', 'max:255'],
                'voorletter' => ['required', 'string', 'max:1'],
                'adres' => ['required', 'string', 'regex:/^([1-9][e][\s])*([a-zA-Z]+(([\.][\s])|([\s]))?)+[1-9][0-9]*(([-][1-9][0-9]*)|([\s]?[a-zA-Z]+))?$/i'],
                'postcode' => ['required', 'string', 'regex:/^[1-9][0-9]{3}[\s]?[A-Za-z]{2}$/i'],
                'plaats' => ['required', 'string', 'max:255'],
                'telefoon' => ['required', 'string'],
                'g-recaptcha-response' => 'required|captcha'
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

            return redirect('/gebruikers/'.$id)->with('status', 'Gebruiker is aangepast');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return Response
         */
        public function delete($id)
        {
            $user = User::find($id);
            $user->email = null;
            $user->adres = null;
            $user->postcode = null;
            $user->telefoon = null;
            $user->plaats = null;
            $user->password = null;
            $user->achternaam = null;
            $user->voorvoegsel = null;
            $user->voorletter = null;
            $user->status = 3;
            $user->save();

            return redirect('/gebruikers')->with('status', 'Gebruiker is verwijderd');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return Response
         */
        public function view($id)
        {
            $user = User::find($id);

            if (!$user) {
                return redirect('/gebruikers')->with('status', 'Kon de gebruiker niet vinden');
            }

            return view('user.view', compact('user'));
        }

        /**
         * Blocks a user
         *
         * @param int $id
         * @return Response
         */
        public function block($id)
        {
            $user = User::find($id);
            $user->status = 0;
            $user->save();

            return redirect('/gebruikers/'.$id)->with('status', 'Gebruiker '.$id.' geblokkeerd');
        }

        /**
         * Unblocks an user
         *
         * @param int $id
         * @return Response
         */
        public function unblock($id)
        {
            $user = User::find($id);
            $user->status = 1;
            $user->save();

            return redirect('/gebruikers/'.$id)->with('status', 'Gebruiker '.$id.' gedeblokkeerd');
        }

        /**
         * Create a new user as beheerder
         *
         * @param int $id
         * @return Response
         */
        public function create(Request $request)
        {
            $request->validate([
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

            $statusreq = $request->get('status');

            $user = new User();
            $user->klantnummer = $this->generateKlantnummer();
            $user->password = Hash::make($request->get('password'));
            $user->email = $request->get('email');
            $user->voorletter = $request->get('voorletter');
            $user->voorvoegsel = $request->get('voorvoegsel');
            $user->achternaam = $request->get('achternaam');
            $user->telefoon = '06-'.$request->get('telefoon');
            $user->adres = $request->get('adres');
            $user->postcode = $request->get('postcode');
            $user->plaats = $request->get('plaats');
            if (!$statusreq == 2) {
                $status = 1;
            } else {
                $status = $statusreq;
            }
            $user->status = $status;
            $user->save();

            return redirect('/gebruikers')->with('status', 'Gebruiker is toegevoegd');
        }

        /**
         * Create random klantnummer
         */
        protected function generateKlantnummer() {
            $number = substr( rand() * 900000 + 100000, 0, 5 );

            if ($this->checkIfExists($number)) {
                return $this->generateKlantnummer();
            }

            return intval($number);
        }

        /**
         * Check if klantnummer exists
         */
        protected function checkIfExists($number) {
            return DB::table('users')->where('klantnummer', $number)->exists();
        }
    }
