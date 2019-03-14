@extends('back')

@section('content')
    <div class="container">

    <section class="content-header">
        <h1>
            User
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'Register.store']) !!}

                        @include('auth.register')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    </div>
    <style>
        .container{
            background-color:blue;

        }

    </style>
@endsection
