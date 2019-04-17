@extends('front')
@section('title', 'Pay Rent |')
@section('content')
<div>
    <div class="panel panel-success">
        <div class="panel-heading">HOW TO PAY RENT WITH MPESA</div>
        <div class="panel-body"><P>Go to LIPA NA MPESA</P>
            <P>Select PAYBILL</P>
            <P>Enter BUSINESS NO:66666</P>
            <P>ACCOUNT NO:Your House number</P>
            <P>AMOUNT: Your Rent amount</P>
            <P>Put your PIN to finish</P>
    </div>

</div>
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <a href="{!! url('Dashboard') !!}" class="btn btn-default">BACK</a>
        </div>
    </div>
</div>


@endsection
<style>
    body,html{
        height: 100%;
        background-image:url({{asset('dist/img/houses.jpeg')}});
        font-family: 'Lato', sans-serif;
    }
</style>