@extends('back')

@section('content')
    <div class="content">

    <section class="content-header">
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <a href="{!! url('admin/reports') !!}" class="btn btn-default">BACK</a>
            </div>
        </div>
        <h1 class="pull-left">Paid Tenants</h1>
        <h1 class="pull-right">
           {{--<a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('paidtenants.create') !!}">Add New</a>--}}
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box">
            <div class="box-body">
                <form method="post" action="{{ url('admin/getPaidFilter/'.$property_id) }}">
                    {{ csrf_field() }}
                    <div class="col-md-12">
                        <div class="col-md-3 col-md-offset-2">
                            <div class="form-group">
                                <label>Start Date</label>
                                <input type="date" name="from" value="{{ \Carbon\Carbon::today()->firstOfMonth()->toDateString() }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>End Date</label>
                                <input type="date" name="to" value="{{ \Carbon\Carbon::today()->endOfMonth()->toDateString() }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="submit" class="btn btn-sm btn-success" value="Search" style="margin-top: 28px">
                            </div>
                        </div>
                    </div>
                </form>

            </div>

        </div>
        <div class="clearfix"></div>

        <div class="box box-primary">
            <div class="box-body">
                    @include('paidtenants.table')
            </div>
        </div>

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

