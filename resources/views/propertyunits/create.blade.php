@extends('back')

@section('content')
    <div class="content">

    <section class="content-header">
        @foreach($creates as $create)
        <h1>
            Add House for <a href="">{{$create->name}}</a>
        </h1>
            @endforeach
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'propertyunits.store']) !!}

                        @include('propertyunits.fields')

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
