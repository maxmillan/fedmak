@extends('back')

@section('content')
    <div class="content-wrapper">

    <section class="content-header">
        <h1>
            Propertyunitattribute
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($propertyunitattribute, ['route' => ['propertyunitattributes.update', $propertyunitattribute->id], 'method' => 'patch']) !!}

                        @include('propertyunitattributes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
   </div>
@endsection