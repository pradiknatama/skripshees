@extends('layouts.dashboard')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="float-left"><h3>Setting Parameter</h3></div>
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
                <h3 class="mb-3">Setting Parameter</h3>
                <form action="{{ url('/update_suhu/'.$suhu->id) }}" method="POST" enctype="multipart/form-data">
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
                    <label class="col-sm-3 col-form-label">Suhu Min</label>
                    <div class="col-sm-9">
                      <input id="suhu_min" type="number" class="form-control @error('suhu_min') is-invalid @enderror" name="suhu_min" value="{{ $suhu->suhu_min }}" required autocomplete="suhu_min" autofocus>                                    
                      @error('suhu_min')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Suhu Max</label>
                    <div class="col-sm-9">
                      <input id="suhu_max" type="number" class="form-control @error('suhu_max') is-invalid @enderror" name="suhu_max" value="{{ $suhu->suhu_max }}" required autocomplete="suhu_max" autofocus>                                    
                      @error('suhu_max')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
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