@extends('back')

@section('content')

    {{--<div class="content-wrapper">--}}

        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <a href="{{url('admin/users')}}">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3><i class="glyphicon glyphicon-thumbs-up"></i></h3>

                                <p>ALL TENANTS</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- ./col -->
                <a href="{{url('admin/paidtenants')}}">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3><i class="glyphicon glyphicon-file"></i></h3>

                                <p>PAID TENANT</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="{{url('admin/tenantaccounts')}}">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3><i class="glyphicon glyphicon-file"></i></h3>

                                <p>UNPAID TENANT</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- ./col -->


                <!-- ./col -->

            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <a href="{!! url('admin') !!}" class="btn btn-default">BACK</a>
                </div>
            </div>
            <!-- ./col -->
            <!-- /.row -->
            <!-- Main row -->

            <!-- /.row (main row) -->

        </section>
    </div>


    <style>
        .content{
            background-color:#e4e4e4;

        }

    </style>
@endsection
