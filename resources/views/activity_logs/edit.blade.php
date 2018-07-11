@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Activity Log
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($activityLog, ['route' => ['activityLogs.update', $activityLog->id], 'method' => 'patch']) !!}

                        @include('activity_logs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection