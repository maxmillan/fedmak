<table class="table table-responsive" id="propertyspects-table">
    <thead>
    <tr>
        <th>House No</th>
        <th>House Type</th>
        <th colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($propertyspect  as $propertyspects)
        <tr>
            <td>{!! $propertyspect->propertyunit->house !!}</td>
            <td>{!! $propertyspect->propertyunit->housetype !!}</td>
            <td>
                {!! Form::open(['route' => ['propertyspects.destroy', $propertyspect->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('propertyspects.show', [$propertyspect->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('propertyspects.edit', [$propertyspect->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>