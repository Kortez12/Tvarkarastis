@extends('layouts.app')
@section('content')

<div class="container py-4 froboto">
    <div class="featured-section">
        <p class="h1 text-center text-success p-2">Grupių sąrašas</p>
        <div class="products text-center">
            @foreach ($grupes as $grupe)
            <div class="card bg-secondary rounded-pill">
                <div class="card-body">
                    <a href="{{ url("/grupes/$grupe->id") }}" class="link-dark text-decoration-none">
                        <h5 class="text-white">{{$grupe->pavadinimas}}{{$grupe->kodas}}</h5>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <p class="h1 text-center text-success pt-5">Dėstytojų sąrašas</p>
        <div class="products text-center">
            @foreach ($destytojai as $destytojas)
            {{-- <a href="{{ url("destytojas/$destytojas->slug") }}" class="link-dark text-decoration-none"> --}}
            <a href="{{ url("destytojas/$destytojas->slug") }}" class="link-dark text-decoration-none">
                <div class="card bg-secondary rounded-pill">
                    <div class="card-body">
                        <h5 class="fw-bold text-light">{{$destytojas->vardas}} {{ $destytojas->pavarde }}</h5>
                        <h6 class="h6 text-center fst-italic text-light">{{ $destytojas->pareigos }}</h6>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        <p class="h1 text-center text-success pt-5">Patalpų sąrašas</p>
        <div class="products text-center">
            @foreach ($patalpos as $patalpa)
            <div class="card bg-secondary rounded-pill">
                <div class="card-body">
                    <h4 class="text-light">{{ $patalpa->rumai }}-{{ $patalpa->numeris }}</h4>
                </div>
            </div>
            @endforeach
        </div>

        <p class="h1 text-center text-success pt-5">Dalykų sąrašas</p>
        <div class="products text-center">
            @foreach ($paskaitos as $dalykas)
            <div class="card bg-secondary rounded-pill">
                <div class="card-body">
                    <h4 class="text-light">{{$dalykas->dalykas}}</h4>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
