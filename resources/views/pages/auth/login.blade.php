@extends('layouts.app')
@section('title', 'Login')
@section('content')

<section class="auth">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card py-3 px-4">
                    <form class="row gy-3" action="{{url('loginSubmit')}}" method="post">
                        @csrf
                        <div class="col-12">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="name@example.com" value="{{old('email')}}">
                            @error('email')<small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class="col-12">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;">
                            @error('password')<small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class="col-6">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember_me">
                            <label class="form-check-label ms-1" for="remember">Remember me</label>
                        </div>
                        <div class="col-6 text-end">
                            <a class="text-decoration-underline" href="#">Forget Password?</a>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100" type="submit">Login</button>
                        </div>
                    </form>
                    <div class="text-center mt-3">
                        <p class="m-0 text-secondary">
                            I don't have an account
                            <a class="text-decoration-underline" href="{{url('register')}}">
                                Register
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection