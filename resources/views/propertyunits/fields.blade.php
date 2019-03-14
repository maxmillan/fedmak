<!-- House Field -->
<div class="form-group col-sm-6">
    {!! Form::label('house', 'House No:') !!}
    {!! Form::text('house', null, ['class' => 'form-control']) !!}
</div>

<!-- Housetype Field -->
<div class="form-group col-sm-6">
    {!! Form::label('housetype', 'Housetype:') !!}
    {!! Form::text('housetype', null, ['class' => 'form-control']) !!}
</div>

{{--<!-- Property Id Field -->--}}
{{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('property_id', 'Property:') !!}--}}
    {!! Form::hidden('property_id', $property_id, ['class' => 'form-control']) !!}
{{--</div>--}}


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! url('admin/pUnits/'.$property_id) !!}" class="btn btn-default">Cancel</a>
</div>
