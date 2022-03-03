@extends('layouts.app')

@section('content')

<div class="container py-4">
    <div class="row justify-content-center">

        <div class="col-md-6 mx-auto ">


            <form action="{{ route('tvark.prideti') }}" method="POST" class="form-group">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="">Paskaita</label>
                    <select name="paskaitos_id">
                        @foreach($paskaitos as $paskaita)
                        <option class="form-control" value="{{ $paskaita->id}}">{{ $paskaita->pavadinimas}}</option>
                        @endforeach
                    </select>

                    <label for="">Destytojas</label>
                    <select name="dest_id">
                        @foreach($destytojai as $destytojas)
                        <option class="form-control" value="{{ $destytojas->id}}">{{ $destytojas->vardas}}{{ $destytojas->pavarde}}</option>
                        @endforeach
                    </select>

                    <label for="">Patalpos</label>
                    <select name="patalpos_id">
                        @foreach($patalpos as $patalpa)
                        <option class="form-control" value="{{ $patalpa->id}}">{{ $patalpa->pavadinimas}}{{ $patalpa->numeris }}</option>
                        @endforeach
                    </select>

                    <label for="">Paskaita</label>
                    <select name="grupe_id">
                        @foreach($grupes as $grupe)
                        <option class="form-control" value="{{ $grupe->id}}">{{ $grupe->pavadinimas}}{{ $grupe->kodas }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-success" type="submit">Įrašyti</button>
            </form>
            @endsection
