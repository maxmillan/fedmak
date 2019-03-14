<!-- Transactiontype Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TransactionType', 'Transactiontype:') !!}
    {!! Form::text('TransactionType', null, ['class' => 'form-control']) !!}
</div>

<!-- Transactionid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TransactionId', 'Transactionid:') !!}
    {!! Form::text('TransactionId', null, ['class' => 'form-control']) !!}
</div>

<!-- Transtime Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TransTime', 'Transtime:') !!}
    {!! Form::text('TransTime', null, ['class' => 'form-control']) !!}
</div>

<!-- Transamount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TransAmount', 'Transamount:') !!}
    {!! Form::text('TransAmount', null, ['class' => 'form-control']) !!}
</div>

<!-- Businessshortcode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('BusinessShortCode', 'Businessshortcode:') !!}
    {!! Form::text('BusinessShortCode', null, ['class' => 'form-control']) !!}
</div>

<!-- Billrefnumber Field -->
<div class="form-group col-sm-6">
    {!! Form::label('BillRefNumber', 'Billrefnumber:') !!}
    {!! Form::text('BillRefNumber', null, ['class' => 'form-control']) !!}
</div>

<!-- Invoicenumber Field -->
<div class="form-group col-sm-6">
    {!! Form::label('InvoiceNumber', 'Invoicenumber:') !!}
    {!! Form::text('InvoiceNumber', null, ['class' => 'form-control']) !!}
</div>

<!-- Orgaccountbalance Field -->
<div class="form-group col-sm-6">
    {!! Form::label('OrgAccountBalance', 'Orgaccountbalance:') !!}
    {!! Form::text('OrgAccountBalance', null, ['class' => 'form-control']) !!}
</div>

<!-- Thirdpartytransid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ThirdPartyTransID', 'Thirdpartytransid:') !!}
    {!! Form::text('ThirdPartyTransID', null, ['class' => 'form-control']) !!}
</div>

<!-- Msisdn Field -->
<div class="form-group col-sm-6">
    {!! Form::label('MSISDN', 'Msisdn:') !!}
    {!! Form::text('MSISDN', null, ['class' => 'form-control']) !!}
</div>

<!-- Firstname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('FirstName', 'Firstname:') !!}
    {!! Form::text('FirstName', null, ['class' => 'form-control']) !!}
</div>

<!-- Middlename Field -->
<div class="form-group col-sm-6">
    {!! Form::label('MiddleName', 'Middlename:') !!}
    {!! Form::text('MiddleName', null, ['class' => 'form-control']) !!}
</div>

<!-- Lastname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('LastName', 'Lastname:') !!}
    {!! Form::text('LastName', null, ['class' => 'form-control']) !!}
</div>

<!-- Paymentmode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('PaymentMode', 'Paymentmode:') !!}
    {!! Form::text('PaymentMode', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('mpesapayments.index') !!}" class="btn btn-default">Cancel</a>
</div>
