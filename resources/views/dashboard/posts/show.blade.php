@extends('dashboard.layouts.main')

@section('container')
<div class="container mt-4">

    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <h3 class="border-bottom border-danger-subtle pb-3 mb-4 fw-bold">{{ $post->title }}</h3>
                
                <article>
                    <div class="justify-content-end d-flex">
                        <a href="" class="btn btn-warning mb-4 ms-2"><span data-feather="edit" class="align-text-bottom text-white"></span></a>
                        <a href="" class="btn btn-danger mb-4 ms-2"><span data-feather="trash-2" class="align-text-bottom"></span></a>
                    </div>

                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}" class="img-fluid">
                    <p>{!! $post->body !!}</p>
            
                    <a href="/dashboard/posts" class="btn btn-success mb-4"><span data-feather="arrow-left" class="align-text-bottom"></span> Back to all my posts</a>

                </article>
            </div>
        </div>
    </div>

</div>
@endsection