@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Hotel
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('hotels.show_fields')
                    <a href="{!! route('hotels.index') !!}" class="btn btn-default">Back</a>
                </div>
                <hr class="box-header"/>
                <div>
                    <h3>Admin</h3>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        @include('hotels.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection