<?php

namespace App\Http\Controllers;

use App\Models\Grupes;
use App\Models\Tvarkarastis;
use App\Models\Destytojai;
use App\Models\Dienos;
use App\Models\Dalykai;
use App\Models\Laikas;
use App\Models\Patalpos;

use Illuminate\Http\Request;
use DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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

        // echo $asa;

        $destytojai = Destytojai::orderByRaw('vardas asc, pavarde asc')->get();
        $grupes = Grupes::orderByRaw("pavadinimas asc, kodas asc")->get();
        $patalpos = Patalpos::orderByRaw('rumai asc, numeris asc')->get();
        $paskaitos = Dalykai::orderBy('dalykas', 'asc')->get();
        $valandos = Laikas::all();
        $dienoss = Dienos::all();

        $pos = Grupes::where('id', $request->id)->first(); // grupes lenteles duomenys siuo atveju IST19
        // if (!$pos) {
        //     // throw new ModelNotFoundException();
        //     return redirect()->route('grupiu.sarasas')->with('error', 'Grupė neegzistuoja');
        // }
        // $tvarkarastis = Tvarkarastis::where('grupes_id', $request->id);
        // $tvarkarastis = Tvarkarastis::all();
        $tvarkarastis = DB::table('tvarkarastis')->where('grupes_id', $request->id)->get();
        // dd($tvarkarastis);

        // echo $tvarkarastis;

        $dienos = array(
            array(""),
            array("Pirmadienis"),
            array("Antradienis"),
            array("Trečiadienis"),
            array("Ketvirtadienis"),
            array("Penktadienis"),
        );
        for ($i = 1; $i <= 5; $i++) {
            $laikinas = DB::table('tvarkarastis')
                ->select('*', 'tvarkarastis.id as tvark_id')
                ->where('grupes_id', $request->id)
                ->Join('dalykai', 'tvarkarastis.paskaitos_id', '=', 'dalykai.id')
                ->Join('laikas', 'tvarkarastis.laikas_id', '=', 'laikas.id')
                ->Join('destytojai', 'tvarkarastis.destytojai_id', '=', 'destytojai.id')
                ->Join('patalpos', 'tvarkarastis.patalpos_id', '=', 'patalpos.id')
                ->where('dienos_id', $i)
                ->get();
            array_push($dienos[$i], $laikinas);
        }

        return view('tvarks', compact('dienos', 'laikinas', 'destytojai', 'grupes', 'patalpos', 'paskaitos', 'valandos', 'dienoss'))->with('pos', $pos)->with('tvarkarastis', $tvarkarastis);
    }

    public function show(Request $request)
    {
        $grupes = Grupes::orderByRaw('pavadinimas asc, kodas asc')->get();
        return view('grupes')->with(compact('grupes'));
    }
}
