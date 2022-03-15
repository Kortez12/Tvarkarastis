<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destytojai;
use App\Models\Dienos;
use App\Models\Tvarkarastis;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class DestytojaiController extends Controller
{
    public function index()
    {
        $destytojai = Destytojai::all();
        return view('sarasas', ['destytojai' => $destytojai]);
    }

    public function create()
    {
        return view('prideti.destytojas');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'vardas' => 'required|string',
            'pavarde' => 'required|string',
            'pareigos' => 'required|string',
            'email' => 'email|required'
        ]);
        // $slug1 = Str::slug($request->input('vardas'));
        // $slug2 = Str::slug($request->input('pavarde'));
        $destytojai = new Destytojai();
        $destytojai->vardas = $request->input('vardas');
        $destytojai->pavarde = $request->input('pavarde');
        $destytojai->pareigos = $request->input('pareigos');
        $destytojai->email = $request->input('email');
        // $destytojai->slug = $slug1 . '-' . $slug2;
        $destytojai->save();

        return redirect()->back()->with('success', 'Dėstytojas pridėtas');
    }

    public function show(Request $request, Destytojai $dest)
    {
        $destytojas = Destytojai::find($dest)->first();

        $dienos = Dienos::all();
        $tvs = [];

        
        $sav = array($dienos);

        for ($i = 0; $i <= 4; $i++) {
            $tab = DB::table('tvarkarastis')
                ->select('*', 'tvarkarastis.id as tvark_id')
                ->leftJoin('grupes', 'tvarkarastis.grupes_id', 'grupes.id')
                ->leftJoin('laikas', 'tvarkarastis.laikas_id', 'laikas.id')
                ->leftJoin('dienos', 'tvarkarastis.dienos_id', 'dienos.id')
                ->leftJoin('dalykai', 'tvarkarastis.paskaitos_id', 'dalykai.id')
                ->leftJoin('destytojai', 'tvarkarastis.destytojai_id', 'destytojai.id')
                ->leftJoin('patalpos', 'tvarkarastis.patalpos_id', 'patalpos.id')
                ->where('destytojai_id', $dest->id)
                ->
                ->get();
            array_push($tvs[$i], $tab);
        }
        return $tvs;
        // return $tvarkarastis;

        return view('dtv', compact('dest', 'tab', 'destytojas', 'sav'));

        // $dienos = array(
        //     array(""),
        //     array("Pirmadienis"),
        //     array("Antradienis"),
        //     array("Trečiadienis"),
        //     array("Ketvirtadienis"),
        //     array("Penktadienis"),
        // );
        // for ($i = 1; $i <= 5; $i++) {
        //     $laikinas = DB::table('tvarkarastis')
        //         ->select('*', 'tvarkarastis.id as tvark_id')
        //         ->where('grupes_id', $request->id)
        //         ->Join('dalykai', 'tvarkarastis.paskaitos_id', '=', 'dalykai.id')
        //         ->Join('laikas', 'tvarkarastis.laikas_id', '=', 'laikas.id')
        //         ->Join('destytojai', 'tvarkarastis.destytojai_id', '=', 'destytojai.id')
        //         ->Join('patalpos', 'tvarkarastis.patalpos_id', '=', 'patalpos.id')
        //         ->where('dienos_id', $i)
        //         ->get();
        //     array_push($dienos[$i], $laikinas);
        // }
        // $destytojai = Tvarkarastis::where('destytojai_id', $request->id)->get();

        // return $destytojai;

        // return view('dtv', compact('dienos', 'laikinas', 'destytojai', 'grupes', 'patalpos', 'paskaitos', 'valandos', 'dienoss'))->with('pos', $pos)->with('tvarkarastis', $tvarkarastis);

        // return view('dtv', compact('dest', 'destytojas'));
    }
}
