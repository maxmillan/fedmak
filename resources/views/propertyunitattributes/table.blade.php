<table class="table table-responsive" id="propertyunitattributes-table">
    <thead>
        <tr>
            <th>Property</th>
            <th>House No</th>
        <th>House Type</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($propertyunitattributes as $propertyunitattribute)
        <tr>
            <td>{!! $propertyunitattribute->propertyunit_id !!}</td>
            <td>{!! $propertyunitattribute->propertyattribute_id !!}</td>
            <td>
                {!! Form::open(['route' => ['propertyunitattributes.destroy', $propertyunitattribute->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('propertyunitattributes.show', [$propertyunitattribute->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('propertyunitattributes.edit', [$propertyunitattribute->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>