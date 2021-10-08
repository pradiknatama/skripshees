@extends('layouts.dashboard')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="float-left"><h3>Dashboard</h3></div>
            </div>
            <div class="col-6">
                <div class="float-right" style="margin-right:30px; "><h3>Hi, {{ Auth::user()->name }}</h3></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item active"><a href="/">Home</a></li>
                  <!-- <li class="breadcrumb-item active" aria-current="page">
                    Cart
                  </li> -->
                </ol>
              </nav>
            </div>
        </div>
        <div class="col-12">
            <div class="card card-normal">
                <h3 class="mb-3">Ubah Akun</h3>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-9">
                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>                                    
                      @error('name')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection