@extends('layouts.main')

@section('container')
    <div class="container text-center">
        <h3 class="mt-4">About Me {{ $name }}</h3>
        <img src="/image/{{ $image }}" alt="{{ $image }}" class="img-thumbnail rounded-circle" width="200" height="200">
        <p class="mt-3">{{ $body }}{{ $body }}</p>
        <p class="fw-bold fst-italic">contact me on. {{ $email }}</p>
    </div>
@endsection