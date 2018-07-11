<div class="box">
    <div class="box-body">

        <!-- Name Field -->
        <?php $roles = \App\Models\Role::pluck( 'name', 'id' )?>
        <div class="form-group row">
            <div class="col-sm-2 col-title">
                {!! Form::hidden('id') !!}
                {!! Form::label('name', 'Name:') !!}
            </div>
            <div class="col-sm-4">
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <!-- Email Field -->
        <div class="form-group row">
            <div class="col-sm-2 col-title">
                {!! Form::label('email', 'Email:') !!}
            </div>
            <div class="col-sm-4">
                {!! Form::email('email', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <!-- Password Field -->
        <div class="form-group row">
            <div class="col-sm-2 col-title">
                {!! Form::label('password', 'Password:') !!}
            </div>
            <div class="col-sm-4">
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>
        </div>

        <!-- Role Id Field -->
        <div class="form-group row">
            <div class="col-sm-2 col-title">
                {!! Form::label('role_id', 'Role:') !!}
            </div>
            <div class="col-sm-4">
                {!! Form::select('role_id',$roles, null, ['class' => 'form-control']) !!}
            </div>
        </div>

    @if (!empty($user) && $user['avatar'])
        <!-- Current Avatar Field -->
            <div class='form-group row'>
                <div class='col-sm-2 col-title'>
                    {!! Form::label('current_avatar', 'Current Avatar:') !!}
                </div>
                <div class='col-sm-3'>
                    {!! Form::hidden('current_avatar', $user->avatar) !!}
                    <img src="{{$user->avatar}}" class="img-responsive" style="width: auto; height: auto; max-height: 120px;"/>
                </div>
            </div>
    @endif

    <!-- Avatar Field -->
        <div class='form-group row'>
            <div class='col-sm-2 col-title'>
                {!! Form::label('avatar', 'Avatar:') !!}
            </div>
            <div class='col-sm-4'>
                {!! Form::file('avatar', ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
</div>
</div>

<!-- Submit Field -->
<div class="row">
    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary btn-width-lg']) !!}
        <a href="{!! route('users.index') !!}" class="btn btn-danger btn-width-lg" style="margin-left: 18px">Cancel</a>
    </div>
</div>
