<?php

namespace App\Http\Controllers;

use App\Models\Dalykai;
use App\Models\Destytojai;
use App\Models\Grupes;
use App\Models\Patalpos;
use App\Models\Tvarkarastis;
use Illuminate\Http\Request;

class TvarkarastisController extends Controller
{
    public function index()
    {
        $paskaitos = Dalykai::all();
        $destytojai = Destytojai::all();
        $patalpos = Patalpos::all();
        $grupes = Grupes::all();
        return view('blbl', compact('paskaitos', 'destytojai', 'patalpos', 'grupes'));

    }


    public function store(Request $request)
    {
        $tvark = new Tvarkarastis();
        $tvark->paskaitos_id = $request->input('paskaitos_id');
        $tvark->dalykas_id = $request->input('patalpos_id');
        $tvark->dest_id = $request->input('dest_id');
        $tvark->grupes_id = $request->input('grupe_id');
        $tvark->save();

        return redirect()->back();
    }
}
