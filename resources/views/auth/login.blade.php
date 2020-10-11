@extends('layouts.login', ['title' => 'Login'])

@section('content')
<main class="login-container">
  <div class="container">
    <div class="row page-login d-flex align-items-center">
      <div class="section-left col-12 col-md-6">
        <h1 class="mb-4">we explore the new <br />life much better</h1>
        <img src={{ url('frontend/images/login-image.jpg') }} alt="" class="w-75 d-none
        d-sm-flex" />
      </div>
      <div class="section-right col-12 col-md-4">
        <div class="card">
          <div class="card-body">
            <div class="text-center atas">
              <a href="{{ route('home') }}">
                <h3>Clover Peace</h3>
              </a>
            </div>
            <form method="POST" action="{{ route('login') }}">
              @csrf

              <div class="form-group">
                <label for="email">Email Adress</label>
                <input
                  type="email"
                  class="form-control @error('email') is_invalid @enderror"
                  id="email"
                  name="email"
                  value="{{ old('email') }}"
                  required autocomplete="email" autofocus
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input
                  type="password"
                  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"
                  id="password"
                  name="password"
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="form-group form-check">
                <input
                  type="checkbox"
                  class="form-check-input"
                  id="remember"
                  name="remember"
                  {{ old('remember') ? 'checked' : '' }}
                />
                <label for="remember" class="form-check-label"
                  >Remember me</label
                >
              </div>
              <button type="submit" class="btn btn-login btn-block">
                Sign In
              </button>
              <p class="text-center mt-4">
                @if (Route::has('password.request'))
                  <a class="btn btn-link" href="{{ route('password.request') }}">
                      {{ __('Saya lupa password') }}
                  </a>
                @endif
              </p>
              <p class="text-center">
                  Belum punya akun?
                <a href="{{ route('register') }}" class="btn btn-link">
                Daftar disini
                </a>
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
