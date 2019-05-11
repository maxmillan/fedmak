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
            @if($lease->status=='TERMINATED')
            <td><button class="btn-danger">{!! $lease->status !!}</button></td>
            @else
                <td><button class="btn-default">{!! $lease->status !!}</button></td>
            @endif
                <td>
                {!! Form::open(['route' => ['leases.destroy', $lease->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('leases.show', [$lease->id]) !!}" class='btn btn-success btn-xs'><i class=""></i>TENANT FULL DETAILS</a>
                    <a href="{!! route('leases.edit', [$lease->id]) !!}" class='btn btn-default btn-xs'><i class="">EDIT</i></a>
                    {!! Form::button('<i class="">TERMINATE    </i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>