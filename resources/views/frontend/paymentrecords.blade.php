@extends('front')
@section('title', 'Pay Rent |')
@section('content')
        <div class="container-fluid">
            <section class="content-header">
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <a href="{!! url('Dashboard') !!}" class="btn btn-default">BACK</a>
                    </div>
                </div>
                <h1 class="pull-left">Mpesapayments</h1>
                <h1 class="pull-right">
                </h1>
            </section>
            <div class="content">
                <div class="clearfix"></div>

                <div class="clearfix"></div>
                <div class="box box-primary">
                    <div class="box-body"></div>
                    <div class="text-center">

                    </div>
                    <div class="table-responsive">

                    <table class="table table-bordered table-hover" id="properties-table">
                        <thead>
                        <tr>
                            <th>Tenant Name</th>
                            <th>Property</th>
                            <th>House No</th>
                            <th>House Type</th>
                            <th>Status</th>
                            <th>Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($frontendPayments as $frontendPayment)
                            <tr>
                                <td>{{$frontendPayment->user->name}} {{$frontendPayment->user->last}}</td>
                                <td>{{$frontendPayment->lease->propertyunit->property->name}}</td>
                                <td>{{$frontendPayment->lease->propertyunit->house}}</td>
                                <td>{{$frontendPayment->lease->propertyunit->housetype}}</td>
                                <td>PAID</td>
                                <td>{{$frontendPayment->amount}}</td>
                                {{--{!! Form::open(['route' => ['properties.destroy', $property->id], 'method' => 'delete']) !!}--}}
                                {{--<div class='btn-group'>--}}
                                {{--<a href="{!! url('admin/pUnits/'.$property->id) !!}" class='btn btn-success btn-xs'><i class="">View Property Houses</i></a>--}}
                                {{--<a href="{!! route('properties.edit', [$property->id]) !!}" class='btn btn-default btn-xs'><i class="">Edit Property</i></a>--}}
                                {{--{!! Form::button('<i class="">Delete</i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
                                {{--</div>--}}
                                {{--{!! Form::close() !!}--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    </div>

                </div>

            </div>

        </div>




@endsection
<style>
    .container-fluid{
        background-color:#e4e4e4;

    }


</style>