@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li><i class="fa fa-home" aria-hidden="true" style="margin-right: 8px"></i><a
                    href="{!! route('home') !!}">Home</a></li>
        <li><a href={!! route('roles.index') !!}>User Groups</a></li>
        <li class="active">Create Group</li>
    </ol>

    <section class="content-header">
        <h1>
            Role
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        {!! Form::open(['route' => 'roles.store']) !!}
        @include('roles.fields')
        {!! Form::close() !!}
    </div>
@endsection
