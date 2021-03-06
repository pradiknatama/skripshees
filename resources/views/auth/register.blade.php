@extends('layouts.auth')

@section('content')
<!-- Page Content -->
    <div class="page-content page-auth">
      <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
          <div class="row align-items-center row-login">
            <div class="col-lg-6 text-center">
              <img
                src="/images/login-placeholder.png"
                alt=""
                class="w-50 mb-4 mb-lg-none"
              />
            </div>
            <div class="col-lg-5">
              <h2>
                Monitoring kolam, <br />
                menjadi lebih mudah
              </h2>
              <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Nama Lengkap" autofocus>

                  {{--Tambahan default laravel--}}
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                  @enderror
              </div>
            <div class="form-group">
              <label for="exampleInputPassword1">E-mail</label>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-Mail Address">

              {{--Tambahan default laravel--}}
              @error('email')
              <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
              @enderror
          </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                  {{--Tambahan default laravel--}}
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                  @enderror
              </div>

              <div class="form-group">
                  <label for="exampleInputPassword1">Konfirmasi Password</label>
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">

                  {{--Tambahan default laravel--}}
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                  @enderror
              </div>
                <button type="submit" class="btn btn-success btn-block mt-4">
                  {{ __('Daftar') }}
              </button>
                <button type="submit" class="btn btn-signup btn-block mt-2">
                 <a href="/login">Kembali ke Login</a> 
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
