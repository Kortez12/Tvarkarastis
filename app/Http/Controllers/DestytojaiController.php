<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destytojai;

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

        $destytojai = new Destytojai();
        $destytojai->vardas = $request->input('vardas');
        $destytojai->pavarde = $request->input('pavarde');
        $destytojai->pareigos = $request->input('pareigos');
        $destytojai->email = $request->input('email');
        $destytojai->save();

        return redirect()->back()->with('success', 'Dėstytojas pridėtas');

    }
}
