<!-- Interval Field -->
<div class="form-group col-sm-6">
    {!! Form::label('interval', 'Interval:') !!}
    <select class="form-control" name="interval">
            <option value='monthly'>Monthly</option>
            <option value='yearly'>Yearly</option>
            <option value='once'>Once</option>
    </select></div>

<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::text('amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Servicebill Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('servicebill_id', 'Servicebill Id:') !!}
    <select class="form-control" name="servicebill_id">
        @foreach($propertyunitservicebills as $propertyunitservicebill )
            <option value='{{$propertyunitservicebill->id}}'>{{$propertyunitservicebill->name}}</option>
        @endforeach
    </select>
</div>

<!-- Propertyunit Id Field -->
{{--<div class="form-group col-sm-6">--}}
{{--    {!! Form::label('propertyunit_id', 'Propertyunit Id:') !!}--}}
    {!! Form::hidden('propertyunit_id', $propertyunit_id, ['class' => 'form-control']) !!}
{{--    {!! Form::hidden('leas', $lea->id, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! url('admin/pUnitServiceBill/'.$propertyunit_id) !!}" class="btn btn-default">Cancel</a>
</div>
