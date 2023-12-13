@extends('layouts.app')
@section('title', 'Register')
@section('content')

<section class="auth">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card py-3 px-4">
                    <form class="row gy-3" action="{{url('registerSubmit')}}" method="post">
                        @csrf
                        <div class="col-12">
                            <label for="nameInput" class="form-label">Name</label>
                            <input type="text" class="form-control" id="nameInput" name="name"
                                placeholder="name@example.com" value="{{old('name')}}">
                            @error('name')<small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class="col-12">
                            <label for="emailInput" class="form-label">Email Address</label>
                            <input type="text" class="form-control" id="emailInput" name="email"
                                placeholder="name@example.com" value="{{old('email')}}">
                            @error('email')<small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class="col-12">
                            <label for="passInput" class="form-label">Password</label>
                            <input type="password" class="form-control" id="passInput" name="password"
                                placeholder="&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;">
                            @error('password')<small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100" type="submit">Register</button>
                        </div>
                    </form>
                    <div class="text-center mt-3">
                        <p class="m-0 text-secondary">
                            Already have an account
                            <a class="text-decoration-underline" href="{{url('login')}}">
                                Login
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection