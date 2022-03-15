@extends('layouts.app')
@section('content')

<div class="container pt-5">
    <p class="text-center h4 mb-5">Tvarkaraščio keitimas</p>
    <form action="{{ route('tvark.update') }}" method="POST">
        @csrf
        <input type="hidden" name="tv_id" value="{{ $tvark->id}}">
        <table class="table table-responsive">
            <thead>
                <tr class="table-dark text-center">
                    <th>Savaitės diena</th>
                    <th>Laikas</th>
                    <th>Paskaita</th>
                    <th>Grupė</th>
                    <th>Destytojas</th>
                    <th>Kabinetas</th>
                </tr>
            </thead>
            <tbody>
                <tr class="table-active">
                    <td scope="row text-center m-5">
                        <div class="form-group">
                            <select class="form-select" name="dienos_id">
                                <option selected hidden value="{{ $diena[0]->id }}">{{ $diena[0]->diena }}</option>
                                @foreach ($dienos as $diena)
                                <option value="{{ $diena->id }}">{{ $diena->diena }}</option>
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td scope="row text-center">
                        <div class="form-group">
                            <select class="form-control" name="valandos_id">
                                <option selected hidden value="{{ $laikas[0]->id }}">{{ $laikas[0]->valandos }}</option>
                                @foreach ($valandos as $valanda)
                                <option name="abra" value="{{ $valanda->id }}">{{ $valanda->valandos }}</option>
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td class="">
                        <div class="form-group">
                            <select class="form-control" name="paskaitos_id">
                                <option selected hidden value="{{ $dalykas[0]->id }}">{{ $dalykas[0]->dalykas}}</option>
                                @foreach ($paskaitos as $paskaita)
                                <option value="{{$paskaita->id}}">{{ $paskaita->dalykas }}</option>
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td>
                        <select class="form-control" name="grupe_id">
                            <option selected hidden value="{{ $grupe[0]->id }}">{{ $grupe[0]->pavadinimas.$grupe[0]->kodas }}</option>
                            @foreach ($grupes as $grupe)
                            <option value="{{$grupe->id}}">{{ $grupe->pavadinimas }}{{ $grupe->kodas}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="form-control" name="dest_id">
                            <option selected hidden value="{{ $destytojas[0]->id }}">{{ $destytojas[0]->vardas.' '.$destytojas[0]->pavarde}}</option>
                            @foreach ($destytojai as $destytojas)
                            <option value="{{$destytojas->id}}">{{ $destytojas->vardas }} {{ $destytojas->pavarde}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="form-control mx-auto" name="patalpos_id">
                            <option selected hidden value="{{ $patalpos[0]->id }}">{{ $patalpos[0]->rumai.$patalpos[0]->numeris}}</option>
                            @foreach ($patalposs as $patalpa)
                            <option value="{{$patalpa->id}}">{{ $patalpa->rumai }}-{{ $patalpa->numeris}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="text-center">
            <x-button></x-button>
        </div>
    </form>
</div>
@endsection
