@extends('back')

@section('content')
    <div class="content-wrapper">

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
                   {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch']) !!}

                        @include('users.editfield')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
   </div>
@endsection