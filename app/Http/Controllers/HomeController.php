<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psy\CodeCleaner\AssignThisVariablePass;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //Abfrage ob man angemeldet ist oder nicht (true or false)
        $authcheck = Auth::check();

        //Der User wird abgefragt
        $user = Auth::user();

        //Wenn man eingeloggt ist
        if ($authcheck == true) {
            return view('home.registered', compact('user'));
        }

        //Wenn man nicht eingeloggt ist
        else{
            return view('home.notloggedin');
        }

    }
}
