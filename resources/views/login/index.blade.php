@extends('layouts.main')

@section('container')
    
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-5">
            <main class="form-signin w-100 m-auto">
                <h1 class="h3 mb-3 fw-bold text-center">Login</h1>
                <form method="" action="" class="mt-5">
            
                <div class="form-floating mt-5 mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
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