@extends('layouts.app')
@section('content')

<div class="container py-5">
    <div class="row justify-content-center rounded-2">
        <div class="col-md-8">
            <div class="card rounded">
                <div class="card-header bg-dark text-white h4">
                    <p class="text-center">Grupių sąrašas</p>
                </div>
                <div class="card-body">
                    @foreach ($grupes as $grupe)
                    <div class="d-inline">
                        {{-- <a class="btn btn-outline-primary my-2" href={{ url("/grupes/{$grupe->pavadinimas}/{$grupe->kodas}") }}> {{$grupe->pavadinimas }}{{$grupe->kodas}}</a> --}}
                        <a class="btn btn-outline-primary my-2" href={{ url("/grupes/{$grupe->id}") }}> {{$grupe->pavadinimas }}{{$grupe->kodas}}</a>

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
