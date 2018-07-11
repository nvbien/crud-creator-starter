@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li><i class="fa fa-home" aria-hidden="true" style="margin-right: 8px"></i><a
                    href="{!! route('home') !!}">Home</a></li>
        <li class="active">Users</li>
    </ol>

    <section class="content-header index">
        <h1 class="pull-left">Users</h1>
        @if(has_permission('users.create'))
            <h1 class="pull-right">
                <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px"
                   href="{!! route('users.create') !!}">Add User</a>
            </h1>
        @endif
    </section>
    <div class="content">
        <div class="clearfix"></div>
        @include('flash::message')
        <div class="clearfix"></div>
        @include('users.table')
        <div class="text-center">

        </div>
    </div>
@endsection

