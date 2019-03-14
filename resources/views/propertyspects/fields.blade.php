<!-- Property Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('property_id', 'Property Id:') !!}
    {!! Form::number('property_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Propertyunit Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('propertyunit_id', 'Propertyunit Id:') !!}
    {!! Form::number('propertyunit_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('propertyspects.index') !!}" class="btn btn-default">Cancel</a>
</div>
