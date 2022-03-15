@extends('layouts.app')
@section('content')

<div class="container p-4 froboto">
    @if (Auth::check() && Auth::user()->isAdmin == 1)
    <form action="{{ route('tvark.prideti') }}" method="POST" class="form-group">
        @method('PUT')
        @csrf

        <select class="form-control" name="grupe_id" hidden>
            <option hidden value="{{$pos->id}}">{{ $pos->pavadinimas }}{{ $pos->kodas}}</option>
        </select>
        <h4 class="text-center">Tvarkaraščio sudarymas</h4>
        <table class="table table-striped table-hover table-responsive mb-5">
            <thead class="text-center">
                <tr class="table-dark">
                    <th>Savaitės diena</th>
                    <th>Laikas</th>
                    <th>Paskaita</th>
                    <th>Destytojas</th>
                    <th>Kabinetas</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row text-center m-5">
                        <div class="form-group">
                            <select class="form-control" name="dienos_id">
                                @foreach ($dienoss as $diena)
                                <option value="{{ $diena->id }}">{{ $diena->diena }}</option>
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td scope="row text-center">
                        <div class="form-group">
                            <select class="form-control" name="valandos_id">
                                @foreach ($valandos as $valanda)
                                <option name="abra" value="{{ $valanda->id }}">{{ $valanda->valandos }}</option>
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td class="">
                        <div class="form-group">
                            <select class="form-control" name="paskaitos_id">
                                @foreach ($paskaitos as $paskaita)
                                <option value="{{$paskaita->id}}">{{ $paskaita->dalykas }}</option>
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td>
                        <select class="form-control" name="dest_id">
                            @foreach ($destytojai as $destytojas)
                            <option value="{{$destytojas->id}}">{{ $destytojas->vardas }} {{ $destytojas->pavarde}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="form-control mx-auto" name="patalpos_id">
                            @foreach ($patalpos as $patalpa)
                            <option value="{{$patalpa->id}}">{{ $patalpa->rumai }}-{{ $patalpa->numeris}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="col-md-12">
            <button class="btn btn-success float-end" name="d" type="submit">Išsaugoti</button>
            {{-- <a href="{{ route('grupiu.sarasas') }}" class="btn btn-primary">Grupių sąrašas</a> --}}
        </div>
    </form>
    @endif

    <form action="{{ route('pdf.pdf') }}" method="POST" class="col-4">
        @method('PUT')
        @csrf
        <button type="submit" class="btn btn-dark mb-2 float-start">Eksportuoti į PDF</button>
        <input type="hidden" name="tvarkId" value="{{ $pos->id }}" />
    </form>

    <h2 class="text-center pb-2">Grupės {{ $pos->pavadinimas.$pos->kodas}} tvarkaraštis</h2>
    <table class="table table-striped table-hover table-responsive">
        <thead class="table-dark">
            <tr>
                <th>Laikas</th>
                <th>Dalykas</th>
                <th>Destytojas</th>
                <th>Rūmai</th>
                @if(Auth::check() && Auth::user()->isAdmin == 1)
                <th class="col-2">#</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @for ($i = 1; $i <= 5; $i++) <tr class="table-dark">
                <td colspan="5" class="text-center"><b class="h4">{{ $dienos[$i][0] }}</b></td>
                </tr>
                @foreach ($dienos[$i][1] as $tv)
                <tr>
                    <td>{{ $tv->valandos }}</td>
                    <td>{{ $tv->dalykas }}</td>
                    <td>{{ $tv->vardas.' '.$tv->pavarde }}</td>
                    <td>{{ $tv->rumai.'-'.$tv->numeris }}</td>
                    @if (Auth::check() && Auth::user()->isAdmin == 1)
                    <td>
                        <a href="{{ url("/tvarkarastis/redaguoti/{$tv->tvark_id}") }}" class="btn btn-primary">Redaguoti</a>
                        <a href="{{ url("/tvarkarastis/sunaikinti/{$tv->tvark_id}") }}" class="btn btn-danger">Ištrinti</a>
                    </td>
                    @endif
                </tr>
                @endforeach
                @endfor
        </tbody>
    </table>
</div>

@endsection
