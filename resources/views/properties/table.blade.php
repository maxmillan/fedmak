<div class="table-responsive">

<table class="table table-bordered table-hover" id="properties-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Code</th>
        <th>Location</th>
        <th>Houses</th>
        <th>Landlord</th>
        <th>Vacant Houses</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($properties as $property)
        <tr>
            <td>{!! $property->name !!}</td>
            <td>{!! $property->code !!}</td>
            <td>{!! $property->location !!}</td>
            <td>{{\App\Propertyunit::where('property_id',$property->id)->count()}} </td>
            <td>{!! $property->landlord !!}</td>
            <td><a href="{{ url('admin/vacant/'.$property->id)}}" class="btn btn-primary" >{{\App\Models\Propertyunit::where('property_id',$property->id)->where('status',null)->count()}}
                </a></td>
            <td>
                {!! Form::open(['route' => ['properties.destroy', $property->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! url('admin/pUnits/'.$property->id) !!}" class='btn btn-success btn-xs'><i class="">View Property Houses</i></a>
                    <a href="{!! route('properties.edit', [$property->id]) !!}" class='btn btn-default btn-xs'><i class="">Edit Property</i></a>
                    {!! Form::button('<i class="">Delete</i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>