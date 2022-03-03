@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-lg-4 col-md-6 col-sm-4 col-xs-1 mx-auto pt-5">
            <h1 class="h2 text-center">Pridėti dėstytoją į sąrašą</h1>
            <form class="row needs-validation g-2" action="{{ url('/destytojas/pridetas') }}" method="POST">
                @csrf
                <div class="p-1">
                    <label class="form-label" class="form-label">Vardas</label>
                    <input type="text" name="vardas" class="form-control @error('vardas') is-invalid @enderror">
                    @error('vardas')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="p-1">
                    <label class="form-label">Pavarde</label>
                    <input type="text" name="pavarde" class="form-control @error('pavarde') is-invalid @enderror">
                    @error('pavarde')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="p-1">
                    <label class="form-label" class="form-label">Pareigos</label>
                    <input type="text" name="pareigos" class="form-control @error('pareigos') is-invalid @enderror">
                    @error('pareigos')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="p-1">
                    <label class="form-label">El. paštas</label>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror">
                    @error('email')
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
