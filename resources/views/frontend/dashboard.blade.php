@extends('front')
@section('title', 'Dashboard |')
@section('content')
    <div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tenant

{{--            @foreach($balances as $balance)--}}
                @if($balances > 0)
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="">BALANCE = {{$balances}}</a>
                @else
                <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="">PAID</a>

                @endif
            {{--@endforeach--}}

            <small>Control panel</small>

        </h1>
        {{--<ol class="breadcrumb">--}}
            {{--<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>--}}
            {{--<li class="active">Dashboard</li>--}}
        {{--</ol>--}}
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <a href="{{url('PayRent')}}">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3><i class="glyphicon glyphicon-thumbs-up"></i></h3>

                            <p>PAY</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </div>
            </a>

            <!-- ./col -->
            <a href="{{url('paymentRecords')}}">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><i class="glyphicon glyphicon-file"></i></h3>

                            <p>Payment Records</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        </div>
                </div>
            </a>

            <!-- ./col -->
            <a href="{{url('complaint')}}">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3><i class="glyphicon glyphicon-phone"></i></h3>

                            <p>Complaints</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                </div>
            </a>

            <!-- ./col -->
            <a href="">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3><i class="glyphicon glyphicon-pencil"></i></h3>

                            <p>Advance</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                    </div>

            </div>
            </a>
        </div>

            <!-- ./col -->
        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- Control Sidebar -->
{{--<aside class="control-sidebar control-sidebar-dark">--}}
{{--    <!-- Create the tabs -->--}}
{{--    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">--}}
{{--        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>--}}
{{--        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>--}}
{{--    </ul>--}}
{{--    <!-- Tab panes -->--}}
{{--    <div class="tab-content">--}}
{{--        <!-- Home tab content -->--}}
{{--        <div class="tab-pane" id="control-sidebar-home-tab">--}}
{{--            <h3 class="control-sidebar-heading">Recent Activity</h3>--}}
{{--            <ul class="control-sidebar-menu">--}}
{{--                <li>--}}
{{--                    <a href="javascript:void(0)">--}}
{{--                        <i class="menu-icon fa fa-birthday-cake bg-red"></i>--}}

{{--                        <div class="menu-info">--}}
{{--                            <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>--}}

{{--                            <p>Will be 23 on April 24th</p>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="javascript:void(0)">--}}
{{--                        <i class="menu-icon fa fa-user bg-yellow"></i>--}}

{{--                        <div class="menu-info">--}}
{{--                            <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>--}}

{{--                            <p>New phone +1(800)555-1234</p>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="javascript:void(0)">--}}
{{--                        <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>--}}

{{--                        <div class="menu-info">--}}
{{--                            <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>--}}

{{--                            <p>nora@example.com</p>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="javascript:void(0)">--}}
{{--                        <i class="menu-icon fa fa-file-code-o bg-green"></i>--}}

{{--                        <div class="menu-info">--}}
{{--                            <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>--}}

{{--                            <p>Execution time 5 seconds</p>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--            <!-- /.control-sidebar-menu -->--}}

{{--            <h3 class="control-sidebar-heading">Tasks Progress</h3>--}}
{{--            <ul class="control-sidebar-menu">--}}
{{--                <li>--}}
{{--                    <a href="javascript:void(0)">--}}
{{--                        <h4 class="control-sidebar-subheading">--}}
{{--                            Custom Template Design--}}
{{--                            <span class="label label-danger pull-right">70%</span>--}}
{{--                        </h4>--}}

{{--                        <div class="progress progress-xxs">--}}
{{--                            <div class="progress-bar progress-bar-danger" style="width: 70%"></div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="javascript:void(0)">--}}
{{--                        <h4 class="control-sidebar-subheading">--}}
{{--                            Update Resume--}}
{{--                            <span class="label label-success pull-right">95%</span>--}}
{{--                        </h4>--}}

{{--                        <div class="progress progress-xxs">--}}
{{--                            <div class="progress-bar progress-bar-success" style="width: 95%"></div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="javascript:void(0)">--}}
{{--                        <h4 class="control-sidebar-subheading">--}}
{{--                            Laravel Integration--}}
{{--                            <span class="label label-warning pull-right">50%</span>--}}
{{--                        </h4>--}}

{{--                        <div class="progress progress-xxs">--}}
{{--                            <div class="progress-bar progress-bar-warning" style="width: 50%"></div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="javascript:void(0)">--}}
{{--                        <h4 class="control-sidebar-subheading">--}}
{{--                            Back End Framework--}}
{{--                            <span class="label label-primary pull-right">68%</span>--}}
{{--                        </h4>--}}

{{--                        <div class="progress progress-xxs">--}}
{{--                            <div class="progress-bar progress-bar-primary" style="width: 68%"></div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--            <!-- /.control-sidebar-menu -->--}}

{{--        </div>--}}
{{--        <!-- /.tab-pane -->--}}
{{--        <!-- Stats tab content -->--}}
{{--        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>--}}
{{--        <!-- /.tab-pane -->--}}
{{--        <!-- Settings tab content -->--}}
{{--        <div class="tab-pane" id="control-sidebar-settings-tab">--}}
{{--            <form method="post">--}}
{{--                <h3 class="control-sidebar-heading">General Settings</h3>--}}

{{--                <div class="form-group">--}}
{{--                    <label class="control-sidebar-subheading">--}}
{{--                        Report panel usage--}}
{{--                        <input type="checkbox" class="pull-right" checked>--}}
{{--                    </label>--}}

{{--                    <p>--}}
{{--                        Some information about this general settings option--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--                <!-- /.form-group -->--}}

{{--                <div class="form-group">--}}
{{--                    <label class="control-sidebar-subheading">--}}
{{--                        Allow mail redirect--}}
{{--                        <input type="checkbox" class="pull-right" checked>--}}
{{--                    </label>--}}

{{--                    <p>--}}
{{--                        Other sets of options are available--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--                <!-- /.form-group -->--}}

{{--                <div class="form-group">--}}
{{--                    <label class="control-sidebar-subheading">--}}
{{--                        Expose author name in posts--}}
{{--                        <input type="checkbox" class="pull-right" checked>--}}
{{--                    </label>--}}

{{--                    <p>--}}
{{--                        Allow the user to show his name in blog posts--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--                <!-- /.form-group -->--}}

{{--                <h3 class="control-sidebar-heading">Chat Settings</h3>--}}

{{--                <div class="form-group">--}}
{{--                    <label class="control-sidebar-subheading">--}}
{{--                        Show me as online--}}
{{--                        <input type="checkbox" class="pull-right" checked>--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--                <!-- /.form-group -->--}}

{{--                <div class="form-group">--}}
{{--                    <label class="control-sidebar-subheading">--}}
{{--                        Turn off notifications--}}
{{--                        <input type="checkbox" class="pull-right">--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--                <!-- /.form-group -->--}}

{{--                <div class="form-group">--}}
{{--                    <label class="control-sidebar-subheading">--}}
{{--                        Delete chat history--}}
{{--                        <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--                <!-- /.form-group -->--}}
{{--            </form>--}}
{{--        </div>--}}
{{--        <!-- /.tab-pane -->--}}
{{--    </div>--}}
{{--</aside>--}}
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
    @endsection
<style>
    body,html{
        height: 100%;
        background-image:url({{asset('dist/img/houses.jpeg')}});
        font-family: 'Lato', sans-serif;
    }
</style>