<!-- Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('url', 'Url:') !!}
    {!! Form::text('url', null, ['class' => 'form-control']) !!}
</div>

<!-- Route Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('route_name', 'Route Name:') !!}
    {!! Form::text('route_name', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Post Data Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('post_data', 'Post Data:') !!}
    {!! Form::textarea('post_data', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('activityLogs.index') !!}" class="btn btn-default">Cancel</a>
</div>
