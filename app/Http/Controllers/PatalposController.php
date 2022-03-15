<?php

namespace App\Http\Controllers;

use App\Models\Patalpos;
use Illuminate\Http\Request;

class PatalposController extends Controller
{
    public function index(){

        $patalpos = Patalpos::all();
        return view('sarasas')->with(['patalpos', $patalpos]);
    }

    public function create(){

        return view('prideti.patalpos');
    }

    public function store(Request $request){

        $this->validate($request, [
            'rumai' => 'required|string',
            'numeris' => 'required'
        ]);

        $patalpos = new Patalpos();
        $patalpos->rumai = $request->input('rumai');
        $patalpos->numeris = $request->input('numeris');
        $patalpos->save();

        return redirect()->back()->with('success', 'Patalpos pridėtos');

    }
}
