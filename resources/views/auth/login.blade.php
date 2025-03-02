@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<section class="flexbox-container">
  <div class="col-12 d-flex align-items-center justify-content-center">
    <div class="col-lg-4 col-md-6 col-10 box-shadow-2 p-0">
      <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
        <div class="card-header border-0">
          <div class="text-center mb-1">
            <img src="{{ asset('back/images/logo/logo.png') }}" alt="branding logo">
          </div>
          <div class="font-large-1 text-center">
            Welcome Back
          </div>
        </div>
        <div class="card-content">
          <div class="card-body">
            <!-- Form Login -->
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
              @csrf
              <!-- Email Address -->
              <fieldset class="form-group position-relative has-icon-left">
                <input type="email" name="email" id="email" class="form-control round" placeholder="Your Email" value="{{ old('email') }}" required autofocus autocomplete="username">
                <div class="form-control-position">
                  <i class="ft-mail"></i>
                </div>
                @error('email')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </fieldset>
              
              <!-- Password -->
              <fieldset class="form-group position-relative has-icon-left">
                <input type="password" name="password" id="password" class="form-control round" placeholder="Enter Password" required autocomplete="current-password">
                <div class="form-control-position">
                  <i class="ft-lock"></i>
                </div>
                @error('password')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </fieldset>

              <!-- Remember Me -->
              <div class="form-group row">
                
              </div>

              <!-- Submit Button -->
              <div class="form-group text-center">
                <button type="submit" class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-12 mr-1 mb-1">
                  Login
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
