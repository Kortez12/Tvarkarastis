<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destytojai;
use App\Models\Patalpos;
use App\Models\Grupes;
use App\Models\Dalykai;

class SarasasController extends Controller
{
    public function index()
    {
        $destytojai = Destytojai::all();
        $grupes = Grupes::orderByRaw("pavadinimas asc, kodas asc")->get();
        $patalpos = Patalpos::orderByRaw("rumai asc, numeris asc")->get();;
        $paskaitos = Dalykai::orderBy('dalykas', 'asc')->get();

        return view('sarasas', compact('destytojai', 'grupes', 'patalpos', 'paskaitos'));
    }
}
