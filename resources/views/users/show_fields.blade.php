<!-- Name Field -->
<div class="form-group row">
    <div class="col-sm-2 col-title">
        {!! Form::label('name', 'Name:') !!}
    </div>
    <div class=" col-sm-8">
        <p>{!! $user->name !!}</p>
    </div>
</div>

<!-- Email Field -->
<div class="form-group row">
    <div class="col-sm-2 col-title">
        {!! Form::label('email', 'Email:') !!}
    </div>
    <div class=" col-sm-8">
        <p>{!! $user->email !!}</p>
    </div>
</div>

<!-- Role Id Field -->
<div class="form-group row">
    <div class="col-sm-2 col-title">
        {!! Form::label('role', 'Role:') !!}
    </div>
    <div class=" col-sm-8">
        <p>{!! $user->role !!}</p>
    </div>
</div>

<!-- Avatar Field -->
<div class="form-group row">
    <div class="col-sm-2 col-title">
        {!! Form::label('avatar', 'Avatar:') !!}
    </div>
    <div class=" col-sm-3">
        <img src="{{$user->avatar}}" class="img-responsive" style="width: auto; height: auto; max-height: 120px;"/>
    </div>
</div>

