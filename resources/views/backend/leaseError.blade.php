@extends('back')
@section('title', 'Admin Dashboard |')
@section('content')
    <div class="content">
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">WARNING!</h4>
            <p><b>ALL Tenants have been allocated Houses.Please Register New Tenant and Input Tenant Details.</b></p>
            <hr>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <a href="{!! url('admin/users/create') !!}" class="btn btn-success">REGISTER TENANT</a>
            </div>
        </div>
        <!-- Content Header (Page header) -->

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
@endsection