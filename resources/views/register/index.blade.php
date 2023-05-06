@extends('layouts.main')

@section('container')
    
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-5">
            <main class="form-registration w-100 m-auto">
                <h1 class="h3 mb-3 fw-bold text-center">Register Account</h1>
                <form method="" action="" class="mt-5">
            
                <div class="form-floating mt-5 mb-3">
                    <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Name">
                    <label for="name">Nama Lengkap</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username">
                    <label for="username">Username</label>
                </div>

                <div class="form-floating mb-3">    
                    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="Email">
                    <label for="Email">Email</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="password">Password</label>
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