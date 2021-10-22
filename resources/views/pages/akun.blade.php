@extends('layouts.dashboard')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="float-left"><h3>Akun Saya</h3></div>
            </div>
            <div class="col-6">
                <div class="float-right" style="margin-right:30px; "><h3>Hi, {{ Auth::user()->name }}</h3></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  {{-- <li class="breadcrumb-item active"><a href="/">Home</a></li> --}}
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
                <form action="{{ url('/edit_akun/'.$user->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>    
          <strong>{{ $message }}</strong>
      </div>
    @endif
                  @foreach ($errors->all() as $error)
                  {{-- @if ($message = Session::get('error')) --}}
                  <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>    
                    <strong>{{ $error }}</strong>
                  </div>
                {{-- @endif --}}
                         @endforeach 
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
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Password Sebelumnya</label>

                    <div class="col-md-9">
                      <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                      <small style="color: red">*Kosongkan jika tidak ingin mengganti password</small>
                    </div>
                  
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Password Baru</label>

                    <div class="col-md-9">
                      <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Konfirmasi Password Baru</label>

                    <div class="col-md-9">
                        <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                    </div>
                  </div>
                  <div class="form-group row mb-0">
                    <div class="col-md-4 ">
                      <button type="submit" class="btn btn-primary">
                        Update 
                      </button>
                    </div>
                  </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection