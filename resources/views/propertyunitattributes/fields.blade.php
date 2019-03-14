<!-- Propertyunit Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('propertyunit_id', 'Property:') !!}
    {!! Form::number('propertyunit_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Propertyattribute Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('propertyattribute_id', 'Propertyattribute Id:') !!}
    {!! Form::number('propertyattribute_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('propertyunitattributes.index') !!}" class="btn btn-default">Cancel</a>
</div>
