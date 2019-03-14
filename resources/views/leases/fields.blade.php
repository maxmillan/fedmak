<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'Tenant:') !!}
    <select class="form-control" name="user_id">
        @foreach($users as $user )
            <option value='{{$user->id}}'>{{$user->name}} {{$user->last}}</option>
        @endforeach
    </select>
{{--    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}--}}
</div>

<!-- Propertyunit Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('propertyunit_id', 'House No:') !!}
    <select class="form-control" name="propertyunit_id">
        @foreach($houseNumbers as $houseNumber )
            <option value='{{$houseNumber->id}}'>{{$houseNumber->house}}</option>
        @endforeach
    </select>
{{--    {!! Form::number('propertyunit_id', null, ['class' => 'form-control']) !!}--}}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
{{--    {!! Form::text('status', null, ['class' => 'form-control']) !!}--}}
    <select class="form-control" name="status">
            <option value='active'>Active</option>
    </select>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('leases.index') !!}" class="btn btn-default">Cancel</a>
</div>
