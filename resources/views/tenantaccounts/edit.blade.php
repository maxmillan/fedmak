@extends('back')

@section('content')
    <div class="content-wrapper">

    <section class="content-header">
        <h1>
            Tenantaccount
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tenantaccount, ['route' => ['tenantaccounts.update', $tenantaccount->id], 'method' => 'patch']) !!}

                        @include('tenantaccounts.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
   </div>
@endsection