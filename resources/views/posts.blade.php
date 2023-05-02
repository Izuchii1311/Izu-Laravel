@extends('layouts.main')

@section('container')
<div class="container mt-4">

    <h3 class="border-bottom border-danger-subtle pb-3 mb-4">{{ $title ?? null }}</h3>

        @foreach ($posts as $post)
            <div class="content m-4">
                <h5 class="fw-bolder"><a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a></h6>
                <p>By. <a href="/authors/{{ $post->user->username }}" class="text-decoration-none">{{ $post->user->username }}</a> in category <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
                <p>{{ $post->excerpt }}
                    <a href="/posts/{{ $post->slug }}" class="text-decoration-none">Read more ...</a>
                </p>
                <hr>
            </div>
        @endforeach

</div>
@endsection