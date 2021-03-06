@extends('back')

@section('content')
    <div class="content">

    <section class="content-header">
        <h1>
            Bill
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'bills.store']) !!}

                        @include('bills.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    </div>
    <style>
        .content{
            background-color:#e4e4e4;

        }

    </style>
@endsection
