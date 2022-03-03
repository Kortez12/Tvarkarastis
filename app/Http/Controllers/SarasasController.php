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
        // dd($user->masina);
        return view('sarasas')->with('destytojai', Destytojai::all())->with('grupes', Grupes::all())->with('patalpos', Patalpos::all())->with('dalykai', Dalykai::all());
        // return view('home')->with('knygos', $user->muzika);
    }
}
