<h2>REPORT REVIEW</h2>

<div class="content-header">
    <div class="row">
        <div class="col-xs-12">
            <div class="table-responsive">
                <table summary="This table shows how to create responsive tables using Bootstrap's default functionality" class="table table-bordered table-hover">
                    {{--<caption class="text-center">An example of a responsive table based on <a href="https://getbootstrap.com/css/#tables-responsive" target="_blank">Bootstrap</a>:</caption>--}}
                    <thead>
                    <tr>
                        {{--<th>Country</th>--}}
                        <th>PROPERTY NAME</th>
                        <th>SUM OF PAID TENANTS(Monthly)</th>
                        {{--<th>BALANCE(Monthly)</th>--}}
                        <th>PAID AND UNPAID TENANTS</th>
                        {{--<th>Area (Km²)</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($props as $prop)
                    <tr>
                        <td>{{$prop->name}}</td>
                        <td>KSH {{\App\Models\Paidtenant::where('property_id',$prop->id)->sum('amount')}}</td>
{{--                        <td>KSH{{\App\Models\Tenantaccount::where('property_id',$prop->id)->sum('amount')}}</td>--}}
                        <td>
                            {!! Form::open(['route' => ['properties.destroy', $prop->id], 'method' => 'delete']) !!}
                            <div class='btn-toolbar'>
                                <a href="{!! url('admin/paidTenants/'.$prop->id) !!}" class='btn btn-success btn-xs'><i class="">PAID TENANTS</i></a>

                                <a href="{!! url('admin/unpaidTenants/'.$prop->id) !!}" class='btn btn-danger btn-xs'><i class="">UNPAID TENANTS</i></a>
                                <a href="{!! url('admin/propertReport/'.$prop->id) !!}" class='btn btn-primary btn-xs'><i class="">PROPERTY REPORT</i></a>
                            </div>
                            {!! Form::close() !!}
                        </td>
                        {{--<td>2,780,387</td>--}}
                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!--end of .table-responsive-->
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
</style>