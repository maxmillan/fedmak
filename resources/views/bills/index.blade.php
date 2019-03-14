    @extends('back')

@section('content')
    <div class="content">

    <section class="content-header">
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <a href="{!! url('admin/payments&billing') !!}" class="btn btn-default">BACK</a>
            </div>
        </div>
        <h1 class="pull-left">Bills</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('bills.create') !!}">BILL TENANT</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('bills.table')
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

