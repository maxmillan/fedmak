@extends('back')

@section('content')
    <div class="content-wrapper">

    <section class="content-header">
        <h1>
            Propertyunit
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('propertyunits.show_fields')
                    <a href="{!! route('propertyunits.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
