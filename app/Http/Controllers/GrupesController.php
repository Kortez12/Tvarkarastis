<?php

namespace App\Http\Controllers;

use App\Models\Grupes;
use App\Models\Tvarkarastis;
use Illuminate\Http\Request;
use DB;

class GrupesController extends Controller
{
    public function index()
    {
        $grupes = Grupes::all();
        return view('home')->with(['grupes', $grupes]);
    }

    public function create()
    {
        return view('prideti.grupe');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'pavadinimas' => 'required|string',
            'kodas' => 'required'
        ]);

        $grupes = new Grupes();
        $grupes->pavadinimas = $request->input('pavadinimas');
        $grupes->kodas = $request->input('kodas');
        $grupes->save();

        return redirect()->back()->with('success', 'Grupė pridėta');
    }

    public function grupid(Request $request)
    {
        // $posts = Tvarkarastis::where('grupes_id', $request->id)->get();
        // echo $posts;
        // echo Tvarkarastis::find(1)->grup;
        // echo Tvarkarastis::find(1)->tvark;
        // echo Grupes::find(1)->tvark;



            // $grupes = Grupes::all();
            // $tvarkarastis = Grupes::find($request->id)->grup;
            // dd ($tvarkarastis);

        echo $request->id;


        //  = Tvarkarastis::find(1)->grup;

        // foreach ($tvarkarastis as $tv)
        // {
            // dd ($tvarkarastis);
        // }


        // $tvarkarastis = DB::table('tvarkarastis')->where('grupe_id', $grupe->id)->get();
        //  echo $request->pavadinimas.$request->kodas;
        // return view('tvarks', compact('tvarkarastis'));
        // echo $grupe;
        // $grupes = $request->id;
        // $grupes = Grupes::all();
        // return redirect('welcome');
    }

    public function show(Request $request)
    {
        // echo $request->id;
        $grupes = Grupes::all();
        return view('grupes')->with(compact('grupes'));
    }
}
