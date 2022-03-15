<?php

namespace App\Http\Controllers;

use App\Models\Tvarkarastis;
use Illuminate\Http\Request;
use App\Models\Destytojai;
use App\Models\Patalpos;
use App\Models\Laikas;
use App\Models\Dienos;
use App\Models\Grupes;
use App\Models\Dalykai;

class TvarkarastisController extends Controller
{

    public function store(Request $request)
    {
        $tvarks = Tvarkarastis::where('grupes_id', $request->input('grupe_id'))->where('dienos_id', $request->input('dienos_id'))->where('laikas_id', $request->input('valandos_id'));
        // if(Tvarkarastis::where('grupes_id', $request->input('grupe_id'))->where('dienos_id', $request->input('dienos_id'))->where('laikas_id', $request->input('valandos_id'))->exists())
        // return "yra";
        // else
        // return "nera";

        if ($tvarks->exists()) {
            return redirect()->back()->with('error', 'Laikas jau egzistuoja!');
        } else {
            $tvark = new Tvarkarastis();
            $tvark->dienos_id = $request->input('dienos_id');
            $tvark->laikas_id = $request->input('valandos_id');
            $tvark->paskaitos_id = $request->input('paskaitos_id');
            $tvark->patalpos_id = $request->input('patalpos_id');
            $tvark->destytojai_id = $request->input('dest_id');
            $tvark->grupes_id = $request->input('grupe_id');
            $tvark->save();
            return redirect()->back()->with('success', 'Tvarkaraščio laikas pridėtas');
        }

        // if($tvarks == '[]')
        // return "dd";

    }

    public function edit($id)
    {
        if (Tvarkarastis::where('id', $id)->count() <= 0) {
            return back();
        }

        $tvark = Tvarkarastis::find($id);
        $dalykas = Tvarkarastis::find($id)->tdalykai;
        $laikas = Tvarkarastis::find($id)->laikas;
        $destytojas = Tvarkarastis::find($id)->destytojai;
        $diena = Tvarkarastis::find($id)->dienos;
        $patalpos = Tvarkarastis::find($id)->patalpos;
        $grupe = Tvarkarastis::find($id)->grupes;

        $destytojai = Destytojai::orderByRaw('vardas asc, pavarde asc')->get();
        $grupes = Grupes::orderByRaw("pavadinimas asc, kodas asc")->get();
        $patalposs = Patalpos::orderByRaw('rumai asc, numeris asc')->get();
        $paskaitos = Dalykai::orderBy('dalykas', 'asc')->get();
        $valandos = Laikas::all();
        $dienos = Dienos::all();

        // $tvarkarastis = Tvarkarastis::where('id', $id);
        // return $tvarkarastis->dalykai;

        return view('edit', compact('dalykas', 'laikas', 'patalpos', 'diena', 'destytojas', 'destytojai', 'grupes', 'patalposs', 'paskaitos', 'valandos', 'dienos', 'grupe', 'tvark'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // $tikrinimas = Tvarkarastis::where('laikas_id', $request->input('valandos_id'))->where('dienos_id', $request->input('dienos_id'))->where('grupes_id', $request->input('grupe_id'));
        // if (($tikrinimas->exists()))
        // return redirect()->back()->with('error', 'Tokiu laiku jau egzistuoja įrašas');
        // else{
        $grupes = Grupes::find($request->input('grupe_id'));
        $tvarkarastis = Tvarkarastis::find($request->tv_id);
        $tvarkarastis->dienos_id = $request->input('dienos_id');
        $tvarkarastis->laikas_id = $request->input('valandos_id');
        $tvarkarastis->paskaitos_id = $request->input('paskaitos_id');
        $tvarkarastis->grupes_id = $request->input('grupe_id');
        $tvarkarastis->destytojai_id = $request->input('dest_id');
        $tvarkarastis->patalpos_id = $request->input('patalpos_id');
        $tvarkarastis->save();
        return redirect(url("grupes/{$grupes->id}"))->with('success', 'Tvarkaraštis atnaujintas');
    }

    public function destroy($id)
    {
        // $tvarkarastis = Tvarkarastis::where($request->input('tds_id'), 'id');
        $tvarkarastis = Tvarkarastis::find($id);
        $tvarkarastis->delete();
        return redirect()->back();
        // echo $tvarkarastis;

        // $automobiliai = Auto::find($id);
        // $automobiliai->delete();
        // if (auth()->user()->id !== $automobiliai->user_id) {
        //     return redirect('/automobiliai')->with('error', 'Negalima trinti ne savo įrašą!');
        // }
        // return redirect('/home')->with('success', 'Tema ištrinta');
    }
}
