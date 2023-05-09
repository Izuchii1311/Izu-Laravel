@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Posts</h1>
</div>    

<div class="col-lg-8">
    {{-- Karena menggunakan resource maka akan otomatis mengarah ke store untuk menambah datanya karena methodnya post --}}
    <form method="post" action="/dashboard/posts" class="mb-5" enctype="multipart/form-data">
        {{-- @csrf salah satu security milik laravel --}}
        @csrf

        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}"  autofocus>
          @error('title')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        {{-- Akan membuat slug otomatis ketika kita membuat judulnya --}}
        {{-- Dengan menggunakan sebuah package eloquent sluggable --}}
        <div class="mb-3">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" readonly value="{{ old('slug') }}">
          @error('slug')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
          <p>*slug akan dibuat secara otomatis.</p>
        </div>

        <div class="mb-3">
          <label for="category" class="form-label">Category</label>
          <select class="form-select" name="category_id">
            {{-- akan melooping category dari table category dengan cara menginclude kan model category di controllernya --}}
            @foreach ($categories as $category)
              <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label" for="image">Upload Image</label>
          <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
          @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        {{-- trix editor untuk body, jika excerpt akan mengambil beberapa kata dari body --}}
        <div class="mb-3">
          {{-- ubah for, id. name, inputnya menjadi body --}}
          <label for="body" class="form-label">Body</label>
          <input id="body" type="hidden" name="body" value="{{ old('body') }}">
          <trix-editor input="body"></trix-editor>
          @error('body')<p class="text-danger">{{ $message }}</p>@enderror
        </div>

        <a href="/dashboard/posts" class="btn btn-warning text-white mb-5">Kembali</a>
        <button type="submit" class="btn btn-primary mb-5">Create Post</button>
    </form>
</div>

{{-- Menggunakan Fetch API Java Script, untuk mengambil judulnya dan merubahnya menjadi slug secara otomatis --}}
<script>
  const title = document.querySelector('#title');
  const slug = document.querySelector('#slug');

  // Even Handler, yang menangani ketika kita tuliskan di dalam title itu berubah.
  title.addEventListener('change', function() {
    // kita akan melakukan fetch dari controller dashboard post
    // data dari title diambil kemudian diolah dan dikembalikan sebagai slug
    fetch('/dashboard/posts/checkSlug?title=' + title.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
      console.log(data.slug);
  });

  // mematikan fungsi file upload di trix
  document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
  });
</script>
@endsection