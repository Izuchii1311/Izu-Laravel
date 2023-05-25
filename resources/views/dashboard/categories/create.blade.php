@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Category</h1>
</div>    

<div class="col-lg-8">
    {{-- Karena menggunakan resource maka akan otomatis mengarah ke store untuk menambah datanya karena methodnya post --}}
    <form method="post" action="/dashboard/categories" class="mb-5">
        {{-- @csrf salah satu security milik laravel --}}
        @csrf

        <div class="mb-3">
          <label for="name" class="form-label">Category Name</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Input new categories" autofocus>
          @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" readonly>
            @error('slug')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
            <p>*slug akan dibuat secara otomatis.</p>
        </div>

        <a href="/dashboard/categories" class="btn btn-warning text-white mb-5">Back</a>
        <button type="submit" class="btn btn-primary mb-5">Create New Category</button>
    </form>
</div>

<script>
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');

    name.addEventListener('change', function() {
        fetch('/dashboard/categories/checkSlug?name=' + name.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
        console.log(data.slug);
    });

</script>
@endsection