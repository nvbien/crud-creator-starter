@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Change Password
        </h1>
   </section>
   <div class="content">
       @if(isset($message))
        <div class="alert alert-success">
            {{$message}}
        </div>
       @else
           @include('adminlte-templates::common.errors')
       @endif
       <form method="POST" id="frm_change_password" autocomplete="off" action="{{route('user.password')}}">
           <div class="box">
               <div class="box-body">
                       {{ csrf_field() }}
                       <ul class="alert alert-danger hide" id="err_msg" >
                       </ul>
                       <div class="form-group required">
                           <div class="col-sm-2 col-title">
                                <label for="old_password" class="control-label">Old Password</label>
                               <span class="required">*</span>
                           </div>
                           <div class="col-sm-8">
                                <input type="password" name="old_password" autocomplete="off" id="old_password" class="form-control">
                           </div>
                       </div>
                       <div class="form-group required">
                           <div class="col-sm-2 col-title">
                               <label for="old_password" class="control-label">New Password</label>
                               <span class="required">*</span>
                           </div>
                           <div class="col-sm-8">
                                <input type="password" name="password" autocomplete="off" id="password" class="form-control">
                           </div>
                       </div>
                       <div class="form-group required">
                           <div class="col-sm-2 col-title">
                               <label for="old_password" class="control-label">Confirm Password</label>
                               <span class="required">*</span>
                           </div>
                           <div class="col-sm-8">
                                <input type="password" name="confirm_password" autocomplete="off" id="confirm_password" class="form-control">
                           </div>
                       </div>
               </div>
           </div>
           <div class="row">
               <button type="submit" class="btn btn-primary btn-width-lg">Submit</button>
           </div>
       </form>
   </div>
@endsection