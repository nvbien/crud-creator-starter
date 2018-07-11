@extends('layouts.app')
<?php
$_permissions = [];
if ( isset( $role ) ) {
    $_permissions = json_decode( $role->permissions, true );
}
$i = 1;?>
@section('content')
    <ol class="breadcrumb">
        <li><i class="fa fa-home" aria-hidden="true" style="margin-right: 8px"></i><a
                    href="{!! route('home') !!}">Home</a></li>
        <li><a href={!! route('roles.index') !!}>User Groups</a></li>
        <li class="active">Group Detail</li>
    </ol>

    <section class="content-header">
        <h1>
            Role
        </h1>
    </section>
    <div class="content">
        <div class="box">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('roles.show_fields')
                </div>
            </div>
        </div>

        <div class="footer-action">
            @if (has_permission('roles.edit'))
                <a href="{!! route('roles.edit', ['id' => $role->id]) !!}"
                   class="btn btn-primary btn-width-lg">Edit</a>
            @endif
            @if (has_permission('roles.delete'))
                <form method="POST"
                      class="form-delete"
                      action="{{route('roles.destroy', $role->id)}}"
                      accept-charset="UTF-8"><input name="_method" type="hidden"
                                                    value="Delete">
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-danger btn-width-lg"
                            onclick="return confirmDelete(this)" style="margin-left: 20px">Delete
                    </button>
                </form>
            @endif
        </div>
    </div>
@endsection
