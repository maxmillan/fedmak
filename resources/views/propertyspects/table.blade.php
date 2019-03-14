<table class="table table-responsive" id="propertyspects-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Location</th>
        <th>Code</th>
        <th>Houses</th>
        <th>Landlord</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($propertyspects as $propertyspect)
        <tr>
            <td>{!! $propertyspect->property->name !!}</td>
            <td>{!! $propertyspect->property->location !!}</td>
            <td>{!! $propertyspect->property->code !!}</td>
            <td>{!! $propertyspect->propertyunit->property->units !!}</td>
            <td>{!! $propertyspect->property->landlord !!}</td>
            <td>
                {!! Form::open(['route' => ['propertyspects.destroy', $propertyspect->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('propertyspects.show', [$propertyspect->id]) !!}" class='btn btn-success btn-xs'><i class="">View Houses</i></a>
                    <a href="{!! route('propertyspects.edit', [$propertyspect->id]) !!}" class='btn btn-default btn-xs'><i class="">Edit</i></a>
                    {!! Form::button('<i class="">Delete</i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>