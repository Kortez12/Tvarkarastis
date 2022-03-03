@extends('layouts.app')

@section('content')

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-6 mx-auto ">


            @foreach ($grupes as $grupe)
            {{-- <a class="btn btn-link" href="{{ url('/grupess/'.$grupe->pavadinimas.$grupe->kodas) }}">{{$grupe->pavadinimas }}{{$grupe->kodas}}</a> --}}
            <a class="btn btn-link" href={{ url("/grupess/{$grupe->id}") }}> {{$grupe->pavadinimas }}{{$grupe->kodas}}</a>
            @endforeach
            {{-- <p class="h2">Prisijungėte, {{ Auth()->user()->vardas }}</p> --}}
        </div>
        {{-- {{-- </div> --}}
    </div>
    {{-- </div> --}}
    @endsection
