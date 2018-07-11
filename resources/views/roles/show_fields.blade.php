<!-- Name Field -->
<div class="form-group row">
    <div class="col-sm-2 col-title">
        {!! Form::label('name', 'Name:') !!}
    </div>
    <div class=" col-sm-8">
        <p>{!! $role->name !!}</p>
    </div>
</div>

<!-- Code Field -->
<div class="form-group row">
    <div class="col-sm-2 col-title">
        {!! Form::label('code', 'Code:') !!}
    </div>
    <div class=" col-sm-8">
        <p>{!! $role->code !!}</p>
    </div>
</div>

