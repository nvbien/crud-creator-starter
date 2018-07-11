@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li><i class="fa fa-home" aria-hidden="true" style="margin-right: 8px"></i><a
                    href="{!! route('home') !!}">Home</a></li>
        <li><a href={!! route('users.index') !!}>Users</a></li>
        <li class="active">Edit User</li>
    </ol>

    <section class="content-header">
        <h1>
            User
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch', 'files' => 'true']) !!}

        @include('users.fields')

        {!! Form::close() !!}
    </div>
@endsection