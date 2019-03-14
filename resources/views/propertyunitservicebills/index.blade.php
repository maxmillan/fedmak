@extends('back')

@section('content')
    <div class="content">

    <section class="content-header">
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <a href="{!! url('admin/pUnits/'.$property_id) !!}" class="btn btn-default">BACK</a>
            </div>
        </div>
        @foreach($properties as $property)
        <h1 class="pull-left">Bills for House No: <a href="">{{$property->house}}</a> </h1>
        @endforeach
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! url('admin/createUnitServiceBill/'.$propertyunit_id) !!}">New Bill</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('propertyunitservicebills.table')
            </div>
        </div>
        <form>
            <input type="hidden" value=$property_id>
        </form>
        <div class="text-center">

        </div>
    </div>
    </div>
    <style>
        .content{
            background-color:#e4e4e4;

        }

    </style>
@endsection

