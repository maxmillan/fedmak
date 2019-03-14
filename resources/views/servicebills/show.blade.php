@extends('back')

@section('content')
    <div class="content-wrapper">

    <section class="content-header">
        <h1>
            Servicebill
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('servicebills.show_fields')
                    <a href="{!! route('servicebills.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
