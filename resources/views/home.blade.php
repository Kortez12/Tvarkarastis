@extends('layouts.app')

@section('content')
{{-- <script>
    function addField() {
        var table = document.getElementById("trow");
        var row = table.insertRow(2);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        cell1.innerHTML = "NEW CELL1";
        cell2.innerHTML = "NEW CELL2";
    }

</script> --}}
<div class="container py-4">
    <div class="row justify-content-center">
        {{-- <div class="col-md-8"> --}}
        {{-- <div class="card">
                <div class="card-header bg-warning">
                    <p class="h3">Skydas</p>
                </div> --}}
        <div class="col-md-6 mx-auto ">
            <form action="{{ route('tvark.prideti') }}" method="POST" class="form-group">
                @method('PUT')
                @csrf
                <table class="table table-responsive align-middle text-center">
                    <thead class="thead-inverse">
                        <tr class="table-primary">
                            <th>Laikas</th>
                            <th>Paskaita</th>
                            <th>Grupė</th>
                            <th>Destytojas</th>
                            <th>Kabinetas</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td scope="row text-center">8:00</td>
                            <td class="">
                                <div class="form-group">
                                    <select class="form-control" name="paskaitos_id">
                                        @foreach ($paskaitos as $paskaita)
                                        <option value="{{$paskaita->id}}">{{ $paskaita->pavadinimas }}</option>
                                        @endforeach
                                    </select>
                                    {{-- <button type="submit" class="btn btn-primary">Testas</button> --}}
                                </div>
                            </td>
                            <td>
                                <select class="form-control" name="grupe_id">
                                    @foreach ($grupes as $grupe)
                                    <option value="{{$grupe->id}}">{{ $grupe->pavadinimas }}{{ $grupe->kodas}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select class="form-control" name="dest_id">
                                    @foreach ($destytojai as $destytojas)
                                    <option value="{{$destytojas->id}}">{{ $destytojas->vardas }} {{ $destytojas->pavarde}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select class="form-control" name="patalpos_id">
                                    @foreach ($patalpos as $patalpa)
                                    <option value="{{$patalpa->id}}">{{ $patalpa->pavadinimas }} {{ $patalpa->numeris}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="col-md-12">
                    <button class="btn btn-success float-end" name="d" type="submit">Išsaugoti</button>
                    {{-- <button class="btn btn-primary" id="trow" onclick="addField()">Pridėti eilutę</button> --}}
                </div>
        </div>

        {{-- <p class="h2">Prisijungėte, {{ Auth()->user()->vardas }}</p> --}}
    </div>
    {{-- {{-- </div> --}}
</div>
{{-- </div> --}}
@endsection
