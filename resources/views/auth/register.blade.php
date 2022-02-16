@extends('layouts.app')

@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb-wrapper bg-img bg-overlay" style="background-image: url('img/bg-img/12.jpg');">
      <div class="container h-100">
        <div class="row h-100 align-items-center">
          <div class="col-12">
            <div class="breadcrumb-content">
              <h2 class="breadcrumb-title">Login</h2>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="#">Register</a></li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="mb-120 d-block"></div>
    <!-- Register -->
    <div class="register-area">
        <div class="container">
        <div class="row g-4 g-lg-5 align-items-center justify-content-between">
            <div class="col-12 col-lg-6">
            <div class="register-thumbnail"><img src="img/illustrator/hero-3.png" alt=""></div>
            </div>
            <div class="col-12 col-lg-6">
            <div class="card register-card bg-gray p-2 p-sm-4">
                <div class="card-body">
                <h4>Create your free account</h4>
                <p>Already have an account?<a class="ms-2" href="/login">Log In</a></p>
                <!-- Register Form-->
                <div class="register-form my-5">
                    <form action="/register" method="post">
                        @csrf
                    <div class="form-group mb-3">
                        <input name="email" class="form-control rounded-0
                            @error('email') is-invalid @enderror" type="email" placeholder="Email Address" required
                            value="{{old('email')}}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <input name="name" class="form-control rounded-0
                            @error('name') is-invalid @enderror" type="text" placeholder="Full Name" required
                            value="{{old('name')}}">
                    
                        @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="label-psswd" for="registerPassword">Show</label>
                        <input name="password" class="form-control rounded-0
                            @error('password') is-invalid @enderror" id="registerPassword" type="password" placeholder="Password" required
                            value="{{old('password')}}">
                    
                        @error('password')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="label-psswd" for="registerPassword">Show</label>
                        <input name="password_confirmation" class="form-control rounded-0
                            @error('password') is-invalid @enderror" id="password_confirmation" type="password" placeholder="Password Confirmation" required
                            value="{{old('password')}}">
                    
                        @error('password')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary w-100" type="submit">Register Now</button>
                    </form>
                </div>
                <!-- Sign in via others-->
                <div class="signin-via-others">
                    <p class="mb-0">Or Sign in with</p><a class="btn btn-primary btn-sm mt-3 me-3" href="#"><i class="bi bi-facebook me-2"></i>Facebook</a><a class="btn btn-primary btn-sm mt-3 me-3" href="#"><i class="bi bi-twitter me-2"></i>Twitter</a>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="mb-120 d-block"></div>
@endsection