<?php

namespace App\Http\Controllers;

use App\Models\Grupes;
use Illuminate\Http\Request;
use PDF;
use DB;

class PDFController extends Controller
{
    public function generuoti(Request $request)
    {

        $pos = Grupes::where('id', $request->input('tvarkId'))->first();

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
                ->where('grupes_id', $request->input('tvarkId'))
                ->leftJoin('laikas', 'tvarkarastis.laikas_id', '=', 'laikas.id')
                ->leftJoin('dienos', 'tvarkarastis.dienos_id', '=', 'dienos.id')
                ->leftJoin('destytojai', 'tvarkarastis.destytojai_id', '=', 'destytojai.id')
                ->leftJoin('patalpos', 'tvarkarastis.patalpos_id', '=', 'patalpos.id')
                ->leftJoin('dalykai', 'tvarkarastis.paskaitos_id', '=', 'dalykai.id')
                ->where('dienos_id', $i)
                ->get();
            array_push($dienos[$i], $laikinas);
        }


        $pdf = PDF::loadView('pdf', compact('dienos', 'pos'));

        return $pdf->download("$pos->pavadinimas" . "$pos->kodas" . ".pdf");
    }
}
