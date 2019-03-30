<div class="table-responsive">
<table class="table table-bordered table-hover" id="tenantaccounts-table">
    <thead>
        <tr>
            <th>Tenant Name</th>
        <th>Propert</th>
        <th>House No</th>
        <th>House Type</th>
        <th>Bill</th>
        <th>Amount</th>
        <th>Status</th>
        <th>Date</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($tenantaccounts as $tenantaccount)
        <tr>
            <td>{!! $tenantaccount->lease->user->name !!} {!! $tenantaccount->lease->user->last !!}</td>
            <td>{!! $tenantaccount->lease->propertyunit->property->name !!}</td>
            <td>{!! $tenantaccount->lease->propertyunit->house !!}</td>
            <td>{!! $tenantaccount->lease->propertyunit->housetype !!}</td>
            <td>Rent+Water</td>
            <td>{!! $tenantaccount->amount!!}</td>
            <td>{!! $tenantaccount->transaction_type!!}</td>
            <td>{!! $tenantaccount->created_at->format('d/m/Y')!!}</td>
            <td>
                {!! Form::open(['route' => ['tenantaccounts.destroy', $tenantaccount->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tenantaccounts.show', [$tenantaccount->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('tenantaccounts.edit', [$tenantaccount->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
