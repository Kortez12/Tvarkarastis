<?php

namespace App\Http\Controllers;

use App\Models\Dalykai;
use App\Models\Destytojai;
use App\Models\Grupes;
use App\Models\Patalpos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth::guest())
        return view('home');
        else
        return redirect(url('/home'));
    }

    public function dalyk()
    {
        if(!auth::guest())
        {
        return view('home')->with('destytojai', Destytojai::all())->with('grupes', Grupes::all())->with('patalpos', Patalpos::all())->with('paskaitos', Dalykai::all());
        }
        else
        return "abra";
    }
}
