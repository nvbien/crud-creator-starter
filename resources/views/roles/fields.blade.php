<div class="box">
    <div class="box-body">
        <!-- Name Field -->
        <div class="form-group row">
            <div class="col-sm-2 col-title">
                {!! Form::label('name', 'Name:') !!}
            </div>
            <div class="col-sm-4">
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <!-- Code Field -->
        <div class="form-group row">
            <div class="col-sm-2 col-title">
                {!! Form::label('code', 'Code:') !!}
            </div>
            <div class="col-sm-4">
                {!! Form::text('code', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <hr>

        @include('roles.permissions')

    </div>
</div>

<!-- Submit Field -->
<div class="row">
    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary btn-width-lg']) !!}
        <a href="{!! route('roles.index') !!}" class="btn btn-danger btn-width-lg" style="margin-left: 18px">Cancel</a>
    </div>
</div>
