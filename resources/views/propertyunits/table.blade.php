<div class="table-responsive">
<table class="table table-bordered table-hover" id="propertyunits-table">
    <thead>
        <tr>
            <th>House No</th>
        <th>Housetype</th>
        <th>Property</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($propertyunits as $propertyunit)
        <tr>
            <td>{!! $propertyunit->house !!}</td>
            <td>{!! $propertyunit->housetype !!}</td>
            <td>{!! $propertyunit->property->name !!}</td>
            <td>
                {!! Form::open(['route' => ['propertyunits.destroy', $propertyunit->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! url('admin/pUnitServiceBill/'. $propertyunit->id)!!}" class='btn btn-success btn-xs'><i class=""></i>Service bill</a>
                    <a href="{!! route('propertyunits.edit', [$propertyunit->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash">DELETE</i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>