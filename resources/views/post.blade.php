@extends('layouts.main')

@section('container')
<div class="container mt-4">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <h3 class="border-bottom border-danger-subtle pb-3 mb-4 fw-bold">{{ $post->title }}</h3>
                
                <article>
                    <p>By. <a href="/posts?authors={{ $post->user->username }}" class="text-decoration-none">{{ $post->user->username }}</a> in category <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
                    @if($post->image)
                    <div style="max-height: 500px; overflow: hidden;">
                        <img src="  {{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->category->name }}" class="img-fluid">
                    </div>
                    @else
                        <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                        
                    @endif
                    <p>{!! $post->body !!}</p>
            
                    <a href="/posts" class="text-decoration-none">Kembali</a>
                </article>
            </div>
        </div>
    </div>

</div>
@endsection