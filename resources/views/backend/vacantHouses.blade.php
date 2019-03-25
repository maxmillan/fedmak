@extends('back')
@section('title', 'Admin Dashboard |')
@section('content')
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <a href="{!! url('admin/properties') !!}" class="btn btn-success">BACK</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover" id="tenantaccounts-table">
            <thead>
            <tr>
                <th class="pull-right">Vacant Houses
            </tr>

            </thead>
            <tbody>
            @foreach($vacantHouses as $vacantHouse)
                <tr>
                    <td class="pull-right">{!! $vacantHouse->house !!}</td>
                    <td>
                        {!! Form::open(['route' => ['tenantaccounts.destroy', $vacantHouse->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{url('admin/leases/create')}}" class='btn btn-success btn-xs'><i class="">INPUT TENANT DETAILS</i></a>
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
<style>
    .table-responsive{
        background-color:aliceblue;
    }
    body,html{
        height: 100%;
        background-image:url({{asset('dist/img/houses.jpeg')}});
        font-family: 'Lato', sans-serif;
    }
</style>