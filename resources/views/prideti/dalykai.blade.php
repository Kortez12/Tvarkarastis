@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-lg-4 col-md-6 col-sm-4 col-xs-1 mx-auto pt-5">
            <h1 class="h2 text-center">Pridėti dalyką į sąrašą</h1>
            <form class="row needs-validation g-2" action="{{ url('/dalykas/pridetas') }}" method="POST">
                @csrf
                <div class="p-1">
                    <label class="form-label" class="form-label">Pavadinimas</label>
                    <input type="text" name="pavadinimas" class="form-control @error('pavadinimas') is-invalid @enderror">
                    @error('pavadinimas')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

        </div>
        <div class="col-lg-4 col-md-6 col-sm-4 col-xs-1 mx-auto pt-2">
            <button class="btn btn-primary" type="submit">Pridėti</button>
            <a class="btn btn-success float-end" href="{{ url('sarasas') }}">Peržiūrėti sąraša</a>
        </div>
        </form>
    </div>
@endsection
