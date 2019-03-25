@extends('back')

@section('content')

    {{--<div class="container-fluid">--}}

        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <!-- ./col -->
                <a href="{{url('admin/bills')}}">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3><i class="glyphicon glyphicon-file"></i></h3>

                                <p>BILL TENANT</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="{{url('admin/cashBank')}}">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3><i class="glyphicon glyphicon-thumbs-up"></i></h3>

                                <p>CASH AND BANK PAYMENTS</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="{{url('admin/mpesapayments')}}">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3><i class="glyphicon glyphicon-thumbs-up"></i></h3>

                                <p>MPESA PAYMENTS</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                        </div>
                    </div>
                </a>



                <a href="{{url('admin/servicebills')}}">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3><i class="glyphicon glyphicon-file"></i></h3>

                                <p>SERVICE BILL</p>
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

@endsection
<style>
    body,html{
        height: 100%;
        background-image:url({{asset('dist/img/houses.jpeg')}});
        font-family: 'Lato', sans-serif;
    }
</style>
