@extends('layouts.main')

@section('container')
<div class="container mt-4">

    <div class="container">
        <h3 class="border-bottom border-danger-subtle pb-3 mb-4 fw-bold">{{ $title }}</h3>

        <div class="container">
            <div class="row">
                @foreach ($categories as $category)
                <div class="col-md-4">
                    <a href="/posts?category={{ $category->slug }}">
                    <div class="card text-bg-dark">
                        <img src="https://source.unsplash.com/500x500?{{ $category->name }}" class="card-img-top" alt="{{ $category->name }}" class="img-fluid">
                        <div class="card-img-overlay d-flex align-items-center p-0">
                            <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color: rgba(0,0,0,0.7)">{{ $category->name }}</h5>
                        </div>
                    </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>





</div>
@endsection