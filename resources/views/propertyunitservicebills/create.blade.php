@extends('back')

@section('content')
    <div class="content">

    <section class="content-header">
        @foreach($props as $prop)
        <h1>
            House Bill for <a href="">{{$prop->house}}</a>
        </h1>
            @endforeach
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'propertyunitservicebills.store']) !!}

                        @include('propertyunitservicebills.fields')

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
