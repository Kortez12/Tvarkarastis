@extends('layouts.app')
@section('content')

<div class="container py-4">
    <div class="featured-section">
        <div class="jumbotron">
            <h1 class="display-3">{{ $tvarkarastis->grupe_id }}</h1>
            <p class="lead">Jumbo helper text</p>
            <hr class="my-2">
            <p>More info</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="Jumbo action link" role="button">Jumbo action name</a>
            </p>
        </div>
    </div>
</div>
@endsection
