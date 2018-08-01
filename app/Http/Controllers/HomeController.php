<?php

namespace App\Http\Controllers;

use App\Makale;
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
        $makaleler = Makale::orderBy("created_at","desc")->paginate(10);
        return view('anasayfa',compact('makaleler'));

    }

    public function logout()
    {
       auth()->logout();
       return redirect()->route("home");
    }
}
