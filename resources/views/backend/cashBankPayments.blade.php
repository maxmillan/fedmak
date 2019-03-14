@extends('back')
@section('title', 'Payment Report |')
@section('content')
    <div class="content">

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">

            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <a href="{!! url('admin/payments&billing') !!}" class="btn btn-default">BACK</a>
            </div>
        </div>
        <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="#myModal" data-toggle="modal">CASH & BANK PAYMENTS</a>

        <div class="inbox-body">
            <!-- Modal -->
            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                            <h4 class="modal-title">PAYMENT</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group" id="newModal">
                                {!! Form::open(array('route' => 'cashBank.store')) !!}

                                {{Form::label('lease_id', 'House No:')}}
                                <select class="form-control" name="lease_id" id="lease_id">
                                    <option value="">Select House No:</option>
                                    @foreach($tenants as $tenant)
                                        <option value={{$tenant->id}}>{{$tenant->propertyunit->house}}</option>
                                    @endforeach
                                </select>

                                {{Form::label('user_id', 'Tenant Name:')}}
                                <input class="form-control"  id="user_name" >
                                <input type="hidden" id="user" name="user_id">
                                    {{--@foreach($users as $user)--}}
                                    {{--<option value={{$user->id}}>{{$user->name}} {{$user->last}}</option>--}}
                                    {{--@endforeach--}}
                                </input>

                                {{Form::label('bill', 'Service Bill:')}}
                                <select class="form-control" name="bill">
                                    <option value=Rent>RENT</option>
                                    <option value=Deposit>DEPOSIT</option>
                                    <option value=Repair>REPAIR</option>

                                </select>
                                {{Form::label('amount', 'Amount:')}}
                                {{Form::text('amount', null, array('class'=>'form-control'))}}

                                {{Form::label('property_id', 'Property Name:')}}
                                <input class="form-control" id="property_name">
                                <input type="hidden" id="property" name="property_id">


                                {{Form::label('payment_mode', 'Payment Mode:')}}
                                {{--{{Form::text('user', null, array('class'=>'form-control'))}}--}}
                                <label>
                                    <select class="form-control" name="payment_mode">
    {{--                                    @foreach($data as $msg)--}}
                                            <option value=Cash>CASH</option>
                                            <option value=Bank>BANK</option>
                                        {{--@endforeach--}}
                                    </select>
                                </label>


                                <br>
                                <br>
                                <br>
                                {{Form::submit('Process Payment', array('class'=>'btn btn-success btn-lg btn-block'))}}
                                {!! Form::close() !!}

                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>


        <h2>CASH AND BANK PAYMENTS </h2>

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
                                <th>Service Bill</th>
                                {{--<th>BALANCE(Monthly)</th>--}}
                                <th>Amount</th>
                                <th>Payment Mode</th>
                                <th>Date</th>
                                {{--<th>Area (Km²)</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($paidTenants as $paidTenant)
                                <tr>
                                    <td>{{$paidTenant->user->name}} {{$paidTenant->user->last}}</td>
                                    <td>{{$paidTenant->lease->propertyunit->property->name}}</td>
                                    <td>{{$paidTenant->lease->propertyunit->house}}</td>
                                    <td>{{$paidTenant->lease->propertyunit->housetype}}</td>
                                    <td>{{$paidTenant->bill}}</td>
                                    <td>{{$paidTenant->amount}}</td>
                                    <td>{{$paidTenant->payment_mode}}</td>
                                    <td>{{$paidTenant->created_at->format('d/m/y')}}</td>
                                    @endforeach
                                    {{--@foreach($finals as $final)--}}
                                    {{--<td>{{$final->amount}}</td>--}}
                                    {{--@endforeach--}}
                                    {{--<td>2,780,387</td>--}}
                                </tr>
                            </tbody>
                            {{--@endforeach--}}
                            {{--<tr>--}}
                                {{--<th>Total</th>--}}
                                {{--<td></td>--}}
                                {{--<td></td>--}}
                                {{--<td></td>--}}
                                {{--<th style="text-align: right;"> ${{ number_format(\App\Finalreport::where('transaction_type','credit')->sum('amount')),2}}0.00</th>--}}
                            {{--</tr>--}}
                            {{--<caption class="text-center">An example of a responsive table based on <a href="https://getbootstrap.com/css/#tables-responsive" target="_blank">Bootstrap</a>:</caption>--}}

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
    <script>
        $('#lease_id').on('change',function () {
            let id = $(this).val();
            if( id !== ''){
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    'url': '{{ url('admin/lDetails') }}'+ '/'+id,
                    success: function (data) {
                        $('#user_name').val(data.user['name'] +' ' +data.user['last']);
                        $('#user').val(data.user['id']);
                        $('#property_name').val(data.propertyunit.property['name']);
                        $('#property').val(data.propertyunit.property['id']);
                    }
                })
            }
        })

    </script>
@endsection