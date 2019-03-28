@extends('back')
@section('title', 'Payment Report |')
@section('content')
    <div class="content">
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
{{--                <a href="{!! url('admin/users') !!}" class="btn btn-default">BACK</a>--}}
            </div>
        </div>
        @if(url('admin/propertReport'))
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <a href="{!! url('admin/reports') !!}" class="btn btn-default">BACK</a>
            </div>
        </div>

    @else
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <a href="{!! url('admin/users') !!}" class="btn btn-default">BACK</a>
            </div>
        </div>
        
        @endif

        <div class="box">
            <div class="box-body">
                <form method="post" action="{{ url('admin/getReportFilter/'.$property_id) }}">
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
        <h2>PAYMENT REPORT </h2>

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    <div class="table-responsive">
                        <table summary="This table shows how to create responsive tables using Bootstrap's default functionality" class="table table-bordered table-hover">
                            {{--<caption class="text-center">An example of a responsive table based on <a href="https://getbootstrap.com/css/#tables-responsive" target="_blank">Bootstrap</a>:</caption>--}}
                            <thead>
                            <tr>
                                {{--<th>Country</th>--}}
                                <th>Tenant Name</th>
                                <th>Property Name</th>
                                <th>House No</th>
                                <th>House Type</th>
                                {{--<th>BALANCE(Monthly)</th>--}}
                                <th style="text-align: right;">Credit(KSH)</th>
                                <th style="text-align: right;">Debit(KSH)</th>
                                <th style="text-align: right;">Date</th>
                                {{--<th>Area (Km²)</th>--}}
                            </tr>
                            </thead>tenantaccounts
                            <tbody>
                            @foreach($finalReports as $finalReport)
                                <tr>
                                    <td>{{$finalReport->user->name}} {{$finalReport->user->last}}</td>
                                    <td>{{$finalReport->lease->propertyunit->property->name}}</td>
                                    <td>{{$finalReport->lease->propertyunit->house}}</td>
                                    <td>{{$finalReport->lease->propertyunit->housetype}}</td>
                                    {{--<td>Rent</td>--}}
                                    <th style="text-align: right;">{{ number_format(($finalReport->transaction_type == 'credit')? $finalReport->amount : 0,2) }}</th>
                                    <th style="text-align: right;">{{ number_format(($finalReport->transaction_type == 'debit')? $finalReport->amount : 0,2) }}</th>
                                    <td style="text-align: right;">{{$finalReport->created_at->format('m/d/Y')}}</td>
                                    {{--@foreach($finals as $final)--}}
                                    {{--<td>{{$final->amount}}</td>--}}
                                    {{--@endforeach--}}
                                    {{--<td>2,780,387</td>--}}
                                </tr>
                            </tbody>
                            @endforeach
{{--                            @foreach($totals as $total)--}}
                            <tr class="bg-primary">
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>TOTAL</th>

                                <th style="text-align: right;"> {{ $totals }}</th>

                            </tr>
                            {{--@endforeach--}}
                            {{--<tr>--}}
                                {{--<th>Total</th>--}}
                                {{--<td></td>--}}
                                {{--<td></td>--}}
                                {{--<td></td>--}}
                                {{--<th style="text-align: right;"> ${{ number_format(\App\Finalreport::where('transaction_type','credit')->sum('amount')),2}}0.00</th>--}}
                            {{--</tr>--}}
                            {{--<caption class="text-center">An example of a responsive table based on <a href="https://getbootstrap.com/css/#tables-responsive" target="_blank">Bootstrap</a>:</caption>--}}
                            <tbody>
                            {{--@foreach($finals as $final)--}}
                                {{--<tr>--}}
                                    {{--<td>{{$final->user->name}} {{$final->user->last}}</td>--}}
                                    {{--<td>{{$final->lease->propertyunit->property->name}}</td>--}}
                                    {{--<td>{{$final->lease->propertyunit->house}}</td>--}}
                                    {{--<td>{{$final->lease->propertyunit->housetype}}</td>--}}
                                    {{--<td>Rent</td>--}}
                                    {{--<td style="text-align: right;">0.00</td>--}}
                                    {{--<th style="text-align: right;">{{$final->amount}}.00</th>--}}
                                    {{--<td>{{$final->created_at->format('d/m/Y')}}</td>--}}

                                    {{--@foreach($finals as $final)--}}
                                    {{--<td>{{$final->amount}}</td>--}}
                                    {{--@endforeach--}}
                                    {{--<td>2,780,387</td>--}}
                                {{--</tr>--}}
                            {{--</tbody>--}}
                            {{--@endforeach--}}
                            {{--<tr>--}}
                                {{--<th>Total</th>--}}
                                {{--<td></td>--}}
                                {{--<td></td>--}}
                                {{--<td></td>--}}
                                {{--<td></td>--}}
                                {{--<th style="text-align: right;"> ${{ number_format($finalReport->amount),2}}</th>--}}
                            {{--</tr>--}}
                            {{--@endforeach--}}

                        </table>


                    </div><!--end of .table-responsive-->
                </div>
                </div>
                </div>
                </div>
            </div>
        </div>

        {{--<p class="p">Demo by George Martsoukos. <a href="http://www.sitepoint.com/responsive-data-tables-comprehensive-list-solutions" target="_blank">See article</a>.</p>--}}
        <style>
            h2 {
                text-align: center;
            }

            table caption {
                padding: .5em 0;
            }

            @media screen and (max-width: 767px) {
                table caption {
                    border-bottom: 1px solid #ddd;
                }
            }

            .p {
                text-align: center;
                padding-top: 140px;
                font-size: 14px;
            }

            .content{
                background-color:#e4e4e4;

            }
        </style>

    <div class="control-sidebar-bg"></div>
@endsection