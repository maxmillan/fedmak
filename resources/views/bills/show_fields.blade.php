<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $bill->id !!}</p>
</div>

<!-- Lease Id Field -->
<div class="form-group">
    {!! Form::label('lease_id', 'Lease Id:') !!}
    <p>{!! $bill->lease_id !!}</p>
</div>

<!-- Servicebill Id Field -->
<div class="form-group">
    {!! Form::label('servicebill_id', 'Servicebill Id:') !!}
    <p>{!! $bill->servicebill_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $bill->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $bill->updated_at !!}</p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{!! $bill->amount !!}</p>
</div>

