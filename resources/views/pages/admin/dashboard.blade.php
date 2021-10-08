@extends('layouts.dashboard')
@push('addon-style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css"/>
@endpush
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
                <h3 class="mb-3">User</h3>
                <table id="myTable" class="table table-bordered ">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Role</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->name }}</td>
                                <td>
                                    @if ($row->roles=='1')
                                      Admin
                                    @else
                                      User
                                    @endif
                                </td>
                                <td>{{ $row->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('addon-script')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.js"></script>
<script type="text/javascript">
    $(document).ready( function () {
        $('#myTable').DataTable(
            // {searching: false, }
        );
    } );
</script>

@endpush