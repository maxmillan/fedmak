@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Mpesapayment
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'mpesapayments.store']) !!}

                        @include('mpesapayments.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
