<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Property Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', 'Property Code:') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<!-- Location Field -->
<div class="form-group col-sm-6">
    {!! Form::label('location', 'Property Location:') !!}
    {!! Form::text('location', null, ['class' => 'form-control']) !!}
</div>

<!-- Units Field -->
<div class="form-group col-sm-6">
    {!! Form::label('units', 'Property House Number:') !!}
    {!! Form::text('units', null, ['class' => 'form-control']) !!}
</div>

<!-- Landlord Field -->
<div class="form-group col-sm-6">
    {!! Form::label('landlord', 'Landlord:') !!}
    {!! Form::text('landlord', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('properties.index') !!}" class="btn btn-default">Cancel</a>
</div>
