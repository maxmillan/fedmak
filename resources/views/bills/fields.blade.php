    <!-- Lease Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lease_id', 'House No:') !!}
    <select class="form-control" name="lease_id" id="lease_id">
        <option>Select House No:</option>
        @foreach($leases as $lease )
            <option value='{{$lease->id}}'>{{$lease->propertyunit->house}}</option>
        @endforeach
    </select>
{{--    <input type="hidden" id="propertyunit" name="propertyunit_id">--}}
</div>

<!-- Servicebill Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('servicebill_id', 'Service Bill:') !!}
    <select class="form-control" name="servicebill_id" id="servicebill">
        <option>Select Bill</option>
        @foreach($services as $service)
           <option value='{{$service->id}}'>{{$service->name}}</option>
            @endforeach
    </select>
{{--    <input type="hidden" id="service" name="servicebill_id">--}}
        {{--@foreach($services as $service )--}}
            {{--<option value='{{$service->id}}'>{{$service->name}}</option>--}}
        {{--@endforeach--}}
</div>

<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Amount:') !!}
    <input class="form-control" name="amount" id="amount">
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('bills.index') !!}" class="btn btn-default">Cancel</a>
</div>
<script>
    $('#lease_id').on('change',function () {
        let id = $(this).val();
        if( id !== ''){
            $.ajax({
                type: 'GET',
                dataType: 'json',
                'url': '{{ url('admin/serviceBillDetails') }}'+ '/'+id,
                success: function (data) {
                    $('#servicebill').val(data.servicebill['name']);
                    $('#service').val(data.servicebill['id']);
                    $('#amount').val(data.amount);
                    $('#propertyunit').val(data.propertyunit_id);
                        // $('#property_name').val(data.propertyunit.property['name']);
                    // $('#property').val(data.propertyunit.property['id']);
                }
            })
        }
    })

</script>
