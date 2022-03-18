<?php

namespace App\Http\Controllers;

use App\Models\Dienos;
use App\Models\Grupes;
use App\Models\Laikas;
use App\Models\Dalykai;
use App\Models\Patalpos;
use App\Models\Destytojai;
use Illuminate\Routing\Controller;
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

        return redirect(route('home'));
        // if (auth::guest())
        //     return view('sarasas');
        // else
        //     return redirect(url('/sarasas'));
    }

    public function dalyk()
    {
        $destytojai = Destytojai::orderByRaw('pavarde asc, vardas asc')->get();
        $grupes = Grupes::orderByRaw("pavadinimas asc, kodas asc")->get();
        $patalpos = Patalpos::orderByRaw('rumai asc, numeris asc')->get();
        $paskaitos = Dalykai::orderBy('dalykas', 'asc')->get();
        $valandos = Laikas::all();
        $dienos = Dienos::all();

        if (!auth::guest()) {
            return view('sarasas', compact('destytojai', 'grupes', 'patalpos', 'paskaitos', 'valandos', 'dienos'));
        } else
            return "Tuščia";
    }
}
