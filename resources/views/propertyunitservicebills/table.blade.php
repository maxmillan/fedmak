<table class="table table-responsive" id="propertyunitservicebills-table">
    <thead>
        <tr>
        <th>Servicebill</th>
        <th> Amount</th>
            <th>Interval</th>

            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($propertyunitservicebills as $propertyunitservicebill)
        <tr>
            <td>{!! $propertyunitservicebill->servicebill->name !!}</td>
            <td>{!! $propertyunitservicebill->amount !!}</td>
            <td>{!! $propertyunitservicebill->interval !!}</td>
{{--            <td>{!! $propertyunitservicebill->propertyunit_id !!}</td>--}}
            <td>
                {!! Form::open(['route' => ['propertyunitservicebills.destroy', $propertyunitservicebill->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('propertyunitservicebills.show', [$propertyunitservicebill->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('propertyunitservicebills.edit', [$propertyunitservicebill->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>