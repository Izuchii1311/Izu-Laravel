@extends('layouts.main')

@section('container')
<div class="container mt-4">

    <h3 class="border-bottom border-danger-subtle pb-3 mb-4">Postingan</h3>

        <div class="content m-4">
            <h5 class="fw-bolder">{{ $post->title }}</h6>
            <p>By. <a href="/auhors/{{ $post->user->username }}" class="text-decoration-none">{{ $post->user->username }}</a> in category <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
            <p>{{ $post->body }}</p>

            <a href="/posts" class="text-decoration-none">Kembali</a>
        </div>

</div>
@endsection