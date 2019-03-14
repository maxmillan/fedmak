@extends('back')

@section('content')
    <div class="content">
        <a href="{!! route('leases.index') !!}" class="btn btn-default">Back</a>

    <section class="content-header">
        <h1>
            Tenant Details
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('leases.show_fields')
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
