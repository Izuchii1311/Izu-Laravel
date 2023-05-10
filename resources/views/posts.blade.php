@extends('layouts.main')

@section('container')
<div class="container mt-4">

    <h3 class="border-bottom border-danger-subtle pb-3 mb-4">{{ $title ?? null }}</h3>

    {{-- Fitur Search --}}
    <div class="row justify-content-end mb-3">
        <div class="col-6">
            <form action="/posts" method="get">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('authors'))
                    <input type="hidden" name="authors" value="{{ request('authors') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
                    <button class="btn btn-dark text-white" type="submit">Search</button>
                  </div>
            </form>
        </div>
    </div>  

    {{-- Kondisi cek postingan --}}
    @if ($posts->count())
    <div class="card mb-3">

        @if ($posts[0]->category->id == 1)
        <div class="position-absolute bg-dark p-3 text-white"><a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none text-white">{{ $posts[0]->category->name }}</a></div>                            
        @elseif ($posts[0]->category->id == 2)
            <div class="position-absolute bg-danger p-3 text-white"><a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none text-white">{{ $posts[0]->category->name }}</a></div>
        @elseif ($posts[0]->category->id == 3)
        <div class="position-absolute bg-warning p-3 text-white"><a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none text-white">{{ $posts[0]->category->name }}</a></div>
        @endif

        {{-- jika ada field image maka tampilkan --}}
        @if($posts[0]->image)
            <div style="max-height: 350px; overflow: hidden;">
                <img src="{{ asset('storage/' . $posts[0]->image) }}" class="card-img-top img-fluid" alt="{{ $posts[0]->category->name }}">
            </div>
        @else
            <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
        @endif


        {{-- Memanggil gambar menggunakan API Unsplash dengan berdasarkan kategory kita. --}}
        {{-- <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}"> --}}
        <div class="card-body text-center">
            <h3 class="card-title"><a href="/posts/{{ $posts[0]->slug }}"  class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h5>
            <p>
                <small class="text-body-secondary">
                By. 
                <a href="/posts?authors={{ $posts[0]->user->username }}" class="text-decoration-none">{{ $posts[0]->user->username }}</a> in category 
                <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a>
                <br> last update {{ $posts[0]->created_at->diffForHumans() }}
                </small>
            </p>
            <p class="card-text">{{ $posts[0]->excerpt }}</p>
            <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read more </a>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @foreach ($posts->skip(1) as $post)
                <div class="col-md-4 mb-3 align-items-stretch">
                    <div class="card">

                        @if ($post->category->id == 1)
                            <div class="position-absolute bg-dark p-3 text-white"><a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none text-white">{{ $post->category->name }}</a></div>                            
                        @elseif ($post->category->id == 2)
                            <div class="position-absolute bg-danger p-3 text-white"><a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none text-white">{{ $post->category->name }}</a></div>
                        @elseif ($post->category->id == 3)
                            <div class="position-absolute bg-warning p-3 text-white"><a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none text-white">{{ $post->category->name }}</a></div>
                        @endif

                        {{-- <div class="position-absolute bg-dark p-3 me-3 text-white">{{ $post->category->name }}</div> --}}

                        @if($post->image)
                        <div style="max-height: 350px; overflow: hidden;">
                            <img src="  {{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->category->name }}" class="img-fluid">
                        </div>
                        @else
                            <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                            
                        @endif


                        
                        <div class="card-body">
                        <h5 class="card-title"><a href="/posts/{{ $post->slug }}" class="text-decoration-none text-dark">{{ $post->title }}</a></h5>
                        <p>
                            <small class="text-body-secondary">
                            By. 
                            <a href="/posts?authors={{ $post->user->username }}" class="text-decoration-none">{{ $post->user->username }}</a> 
                            {{-- in category 
                            <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a> --}}
                            last update {{ $post->created_at->diffForHumans() }}
                            </small>
                        </p>
                        <p class="card-text">{{ $post->excerpt }}</p>
                        <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @else 
        <p class="text-center fw-bolder fs-4">No post found.</p>
    @endif

    {{-- Pagination --}}
    <div class="d-flex justify-content-center mt-5 mb-5">
        {{ $posts->links() }}
    </div>

    {{-- Mengulang menampilkan data dari database namun di skip datanya 1 --}}
    {{-- @foreach ($posts->skip(1) as $post)
        <div class="content m-4">
            <h5 class="fw-bolder"><a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a></h6>
            <p>By. <a href="/authors/{{ $post->user->username }}" class="text-decoration-none">{{ $post->user->username }}</a> in category <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
            <p>{{ $post->excerpt }}
                <a href="/posts/{{ $post->slug }}" class="text-decoration-none">Read more ...</a>
            </p>
            <hr>
        </div>
    @endforeach --}}

</div>


@endsection