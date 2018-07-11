@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li><i class="fa fa-home" aria-hidden="true" style="margin-right: 8px"></i><a
                    href="{!! route('home') !!}">Home</a></li>
        <li><a href={!! route('users.index') !!}>Users</a></li>
        <li class="active">User Detail</li>
    </ol>

    <section class="content-header">
        <h1>
            User
        </h1>
    </section>
    <div class="content">
        <div class="box">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('users.show_fields')
                </div>
            </div>
        </div>
        <div class="footer-action">
            @if (has_permission('users.edit'))
                <a href="{!! route('users.edit', ['id' => $user->id]) !!}"
                   class="btn btn-primary btn-width-lg">Edit</a>
            @endif

            @if (has_permission('users.delete'))
                <form method="POST"
                      class="form-delete"
                      action="{{route('users.destroy', $user->id)}}"
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
