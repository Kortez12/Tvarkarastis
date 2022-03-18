@extends('layouts.app')
@section('content')

Masasasasasasasas
sadas

<div class="container py-5">
    <div class="ffredoka text-center h3">
        <p>{{ $destytojas->vardas.' '.$destytojas->pavarde }}</p>
    </div>

    <table class="table table-striped table-hover table-responsive">
        <thead class="table-dark">
            <tr>
                <th scope="col">Laikas</th>

                <th scope="col">Grupė</th>
                <th scope="col">Paskaita</th>
                <th scope="col">Rūmai</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 1; $i <= 5; $i++) <tr class="table-dark">
                <td colspan="4" class="text-center fw-bold h4">{{ $dienos[$i][0] }}</td>
                </tr>

                @foreach ($dienos[$i][1] as $a)
                <tr>
                    <td scope="row">{{ $a->valandos }}</td>
                    <td>{{ $a->pavadinimas.$a->kodas }}</td>
                    <td>{{ $a->dalykas }}</td>
                    <td>{{ $a->rumai.'-'.$a->numeris }}</td>
                </tr>
                @endforeach
                @endfor
        </tbody>
    </table>


</div>

@endsection
