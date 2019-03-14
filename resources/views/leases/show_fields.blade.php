<!-- Id Field -->
{{--<div class="form-group">--}}
    {{--{!! Form::label('id', 'Id:') !!}--}}
    {{--<p>{!! $lease->id !!}</p>--}}
{{--</div>--}}

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'Name:') !!}
    <p>{!! $lease->user->name !!} {!! $lease->user->last !!}</p>
</div>

<div class="form-group">
    {!! Form::label('user_id', 'Id No:') !!}
    <p>{!! $lease->user->idno !!}</p>
</div>

<div class="form-group">
    {!! Form::label('user_id', 'Phone No:') !!}
    <p>{!! $lease->user->phone !!}</p>
</div>

<!-- Propertyunit Id Field -->
<div class="form-group">
    {!! Form::label('propertyunit_id', 'Property Name:') !!}
    <p>{!! $lease->propertyunit->property->name !!}</p>
</div>

<div class="form-group">
    {!! Form::label('propertyunit_id', 'House No:') !!}
    <p>{!! $lease->propertyunit->house !!}</p>
</div>

<div class="form-group">
    {!! Form::label('propertyunit_id', 'House Type:') !!}
    <p>{!! $lease->propertyunit->housetype !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $lease->status !!}</p>
</div>

<!-- Created At Field -->
{{--<div class="form-group">--}}
    {{--{!! Form::label('created_at', 'Created At:') !!}--}}
    {{--<p>{!! $lease->created_at !!}</p>--}}
{{--</div>--}}

{{--<!-- Updated At Field -->--}}
{{--<div class="form-group">--}}
    {{--{!! Form::label('updated_at', 'Updated At:') !!}--}}
    {{--<p>{!! $lease->updated_at !!}</p>--}}
{{--</div>--}}

