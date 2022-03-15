@extends('layouts.app')
@section('content')
<p>{{ $sav[5] }}</p>
<div class="container py-5">
    <div class="ffredoka text-center h3">
        <p>{{ $destytojas->vardas.' '.$destytojas->pavarde }}</p>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Laikas</th>
                <th scope="col">Grupė</th>
                <th scope="col">Paskaita</th>
                <th scope="col">Rūmai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tab as $a) 
                <tr>
                    <td scope="row">{{ $a->valandos }}</td>
                    <td>{{ $a->pavadinimas.$a->kodas }}</td>
                    <td>{{ $a->dalykas }}</td>
                    <td>{{ $a->rumai.'-'.$a->numeris }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


</div>

@endsection
