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
                  <li class="breadcrumb-item active" aria-current="page"><a href="#">Login</a></li>
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
          <!-- Thumbnail -->
          <div class="col-12 col-lg-6">
            <div class="register-thumbnail"><img src="img/illustrator/hero-3.png" alt=""></div>
          </div>
          <div class="col-12 col-lg-6">
            <div class="card register-card bg-gray p-2 p-sm-4">
              <div class="card-body">
                @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Register Success</strong> Please login!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Login Failed</strong> Email or password invalid
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <h4>Welcome Back!</h4>
                <p>Didn't have an account?<a class="ms-2" href="/register">Sign Up</a></p>
                <!-- Register Form -->
                <div class="register-form my-4 my-lg-5">
                  <form action="/login" method="post">
                      @csrf
                    <div class="form-group mb-3">
                        <input name="email" class="form-control rounded-0
                            @error('email') is-invalid @enderror" type="email" placeholder="Email Address" required
                            value="{{old('email')}}">
                    </div>
                    <div class="form-group mb-3">
                      <label class="label-psswd" for="registerPassword">Show</label>
                      <input name="password" class="form-control rounded-0" id="registerPassword" type="password" placeholder="Password" required>
                    </div>
                    <button class="btn btn-primary w-100" type="submit"><i class="bi bi-unlock me-2"></i>Login</button>
                  </form>
                  <div class="login-meta-data d-flex align-items-center justify-content-between">
                    <div class="form-check mt-3">
                      <input class="form-check-input" id="rememberMe" type="checkbox" value="" checked>
                      <label class="form-check-label" for="rememberMe">Keep me logged in</label>
                    </div><a class="forgot-password mt-3" href="forget-password.html">Forgot Password?</a>
                  </div>
                </div>
                <!-- Sign in via others -->
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