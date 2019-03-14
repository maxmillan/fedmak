@extends('back')

@section('content')
    <div class="content-wrapper">

    <section class="content-header">
        <h1>
            Propertyunitattribute
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('propertyunitattributes.show_fields')
                    <a href="{!! route('propertyunitattributes.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
