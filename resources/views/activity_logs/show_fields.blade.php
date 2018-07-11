<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $activityLog->id !!}</p>
</div>

<!-- Url Field -->
<div class="form-group">
    {!! Form::label('url', 'Url:') !!}
    <p>{!! $activityLog->url !!}</p>
</div>

<!-- Route Name Field -->
<div class="form-group">
    {!! Form::label('route_name', 'Route Name:') !!}
    <p>{!! $activityLog->route_name !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{!! $activityLog->user_id !!}</p>
</div>

<!-- Post Data Field -->
<div class="form-group">
    {!! Form::label('post_data', 'Post Data:') !!}
    <p>{!! $activityLog->post_data !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $activityLog->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $activityLog->updated_at !!}</p>
</div>

