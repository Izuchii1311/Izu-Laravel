@extends('layouts.main')

@section('container')
    
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-5">

            {{-- Success Register --}}
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Failed Login --}}
            @if(session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <main class="form-signin w-100 m-auto">
                <h1 class="h3 mb-3 fw-bold text-center">Login</h1>
                <form method="post" action="/login" class="mt-5">
                    @csrf
            
                    <div class="form-floating mt-5 mb-3">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" autofocus required>
                        <label for="email">Email</label>
                    </div>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                        <label for="password">Password</label>
                    </div>

                    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                
                </form>

                <small class="mt-4 text-center d-block">Not registered? <a href="/register">Register</a></small>
                <p class="mt-5 mb-3 text-body-secondary text-center">&copy; Izuchii - 2023</p>
            </div>
        </div>
    </main>
</div>
  

@endsection