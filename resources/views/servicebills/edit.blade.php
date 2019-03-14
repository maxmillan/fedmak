@extends('back')

@section('content')
    <div class="content-wrapper">
    <section class="content-header">
        <h1>
            Servicebill
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($servicebill, ['route' => ['servicebills.update', $servicebill->id], 'method' => 'patch']) !!}

                        @include('servicebills.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
   </div>
@endsection