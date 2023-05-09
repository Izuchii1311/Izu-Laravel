@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Post</h1>
</div>    

{{-- alert data success --}}
@if(session()->has('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="table-responsive">
  <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Create new Post +</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Judul</th>
          <th scope="col">Kategori</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)            
        <tr>
        {{-- loops laravel --}}
            <td>{{ $loop->iteration }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->category->name }}</td>
            <td>
                <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info text-white"><span data-feather="eye" class="align-text-bottom"></span></a>
                <a href="" class="badge bg-warning text-white"><span data-feather="edit" class="align-text-bottom"></span></a>
                <a href="" class="badge bg-danger text-white"><span data-feather="trash-2" class="align-text-bottom"></span></a>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection