@extends('layouts.app')
@section('content')

<div class="container py-4">
    <div class="featured-section">
        <p class="h1 text-center text-success p-2">Dėstytojų sąrašas</p>
        <div class="products text-center">
            @foreach ($destytojai as $destytojas)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$destytojas->vardas}} {{ $destytojas->pavarde }}</h5>
                    <h6 class="h6 text-center">{{ $destytojas->pareigos }}</h6>
                </div>
            </div>
            @endforeach
        </div>
        {{-- <div class="my-5"></div> --}}
        <p class="h1 text-center text-success p-2">Dalykų sąrašas</p>
        <div class="products text-center">
            @foreach ($dalykai as $dalykas)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$dalykas->pavadinimas}}</h5>
                </div>
            </div>
            @endforeach
        </div>
        {{-- <div class="my-5"></div> --}}
        <p class="h1 text-center text-success p-2">Grupių sąrašas</p>
        <div class="products text-center">
            @foreach ($grupes as $grupe)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$grupe->pavadinimas}} {{ $grupe->kodas}}</h5>
                </div>
            </div>
            @endforeach
        </div>
        {{-- <div class="my-5"></div> --}}
        <p class="h1 text-center text-success p-2">Patalpų sąrašas</p>
        <div class="products text-center">
            @foreach ($patalpos as $patalpa)
            <div class="card">
                <div class="card-body">
                    <h4>{{ $patalpa->pavadinimas }}, {{ $patalpa->numeris }}</h4>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
