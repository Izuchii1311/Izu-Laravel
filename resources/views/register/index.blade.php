@extends('layouts.main')

@section('container')
    
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-5">

            <main class="form-registration w-100 m-auto">
                <h1 class="h3 mb-3 fw-bold text-center">Register Account</h1>
                <form method="post" action="/register" class="mt-5">
                    @csrf
                    
                    <div class="form-floating mt-5 mb-3">
                        <input type="text" name="name" class="form-control @error('name')is-invalid @enderror " id="floatingInput" placeholder="Name" required value="{{ old('name') }}">
                        <label for="name">Nama Lengkap</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" name="username" class="form-control @error('username')is-invalid @enderror" id="floatingInput" placeholder="Username" required value="{{ old('username') }}">
                        <label for="username">Username</label>
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>

                    <div class="form-floating mb-3">    
                        <input type="email" name="email" class="form-control @error('email')is-invalid @enderror" id="floatingInput" placeholder="Email" required value="{{ old('email') }}">
                        <label for="Email">Email</label>
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control @error('password')is-invalid @enderror" id="floatingPassword" placeholder="Password" required>
                        <label for="password">Password</label>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>

                    <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
                
                </form>

                <small class="mt-4 text-center d-block">Already registered? <a href="/login">Login</a></small>
                <p class="mt-5 mb-3 text-body-secondary text-center">&copy; Izuchii - 2023</p>
            </div>
        </div>
    </main>
</div>
  

@endsection