<table class="table table-responsive" id="leases-table">
    <thead>
        <tr>
            <th>Tenant</th>
        <th>Property</th>
        <th>House No</th>
        <th>House Type</th>
        <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($leases as $lease)
        <tr>
            <td>{!! $lease->user->name !!} {!! $lease->user->last !!}</td>
            <td>{!! $lease->propertyunit->property->name !!}</td>
            <td>{!! $lease->propertyunit->house !!}</td>
            <td>{!! $lease->propertyunit->housetype !!}</td>
            <td>{!! $lease->status !!}</td>
            <td>
                {!! Form::open(['route' => ['leases.destroy', $lease->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('leases.show', [$lease->id]) !!}" class='btn btn-success btn-xs'><i class=""></i>TENANT FULL DETAILS</a>
                    <a href="{!! route('leases.edit', [$lease->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>