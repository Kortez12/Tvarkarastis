<?php

namespace App\Http\Controllers;

use App\Models\Dalykai;
use Illuminate\Http\Request;

class DalykaiController extends Controller
{
    public function index()
    {
        $dalykai = Dalykai::all();
        return view('sarasas')->with(['dalykai', $dalykai]);
    }

    public function create()
    {
        return view('prideti.dalykai');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'pavadinimas' =>'required|string',
        ]);

        $dalykai = new Dalykai();
        $dalykai->pavadinimas = $request->input('pavadinimas');
        $dalykai->save();

        return redirect()->back()->with('success', 'Dalykas pridėtas');
    }
}
