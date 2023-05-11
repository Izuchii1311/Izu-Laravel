@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Post Category</h1>
</div>    

{{-- alert data success --}}
@if(session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="table-responsive col-lg-8">
  <a href="/dashboard/categories/create" class="btn btn-primary mb-3">Create new Category +</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Category Name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $category)            
        <tr>
        {{-- loops laravel --}}
            <td>{{ $loop->iteration }}</td>
            <td>{{ $category->name }}</td>
            <td>
                <a href="/dashboard/categories/{{ $category->slug }}" class="badge bg-info text-white"><span data-feather="eye" class="align-text-bottom"></span></a>
                <a href="/dashboard/categories/{{ $category->slug }}/edit" class="badge bg-warning text-white"><span data-feather="edit" class="align-text-bottom"></span></a>
                <form action="/dashboard/categories/{{ $category->slug }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger text-white border-0" onclick="return confirm('Are you sure?')"><span data-feather="trash-2" class="align-text-bottom"></span></button>
                </form>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection