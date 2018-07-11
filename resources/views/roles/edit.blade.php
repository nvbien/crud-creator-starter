@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li><i class="fa fa-home" aria-hidden="true" style="margin-right: 8px"></i><a
                    href="{!! route('home') !!}">Home</a></li>
        <li><a href={!! route('roles.index') !!}>User Groups</a></li>
        <li class="active">Edit Group</li>
    </ol>

    <section class="content-header">
        <h1>
            User Group
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')

        {!! Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'patch']) !!}
        @include('roles.fields')

        {!! Form::close() !!}
    </div>
@endsection