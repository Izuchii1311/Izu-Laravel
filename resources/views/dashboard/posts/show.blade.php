@extends('dashboard.layouts.main')

@section('container')
<div class="container mt-4">

    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <h3 class="border-bottom border-danger-subtle pb-3 mb-4 fw-bold">{{ $post->title }}</h3>
                
                <article>
                    <div class="justify-content-end d-flex">
                        <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning mb-4 me-2"><span data-feather="edit" class="align-text-bottom text-white"></span></a>
                        <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger text-white" onclick="return confirm('Are you sure?')"><span data-feather="trash-2" class="align-text-bottom"></span></button>
                          </form>
                    </div>

                    {{-- jika ada field image maka tampilkan --}}
                    @if($post->image)
                        <div style="max-height: 350px; overflow: hidden;">
                            <img src="  {{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->category->name }}" class="img-fluid">
                            <p>{!! $post->body !!}</p>
                        </div>
                    @else
                        <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}" class="img-fluid">
                        <p>{!! $post->body !!}</p>
                    @endif
            
                    <a href="/dashboard/posts" class="btn btn-success mb-4"><span data-feather="arrow-left" class="align-text-bottom"></span> Back to all my posts</a>

                </article>
            </div>
        </div>
    </div>

</div>
@endsection