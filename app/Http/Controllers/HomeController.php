<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Anasayfa');
    }

    public function logout()
    {
       auth()->logout();
       return redirect()->route("home");
    }
}
