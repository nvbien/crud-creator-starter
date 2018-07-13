<!-- Code Field -->
<div class="form-group row">
    <div class="col-sm-2 col-title">
    {!! Form::label('code', 'Code:') !!}
    </div>
    <div class=" col-sm-8">
    <p>{!! $hotel->code !!}</p>
</div>
</div>

<!-- Name Field -->
<div class="form-group row">
    <div class="col-sm-2 col-title">
    {!! Form::label('name', 'Name:') !!}
    </div>
    <div class=" col-sm-8">
    <p>{!! $hotel->name !!}</p>
</div>
</div>

<!-- Address Field -->
<div class="form-group row">
    <div class="col-sm-2 col-title">
    {!! Form::label('address', 'Address:') !!}
    </div>
    <div class=" col-sm-8">
    <p>{!! $hotel->address !!}</p>
</div>
</div>

<!-- Email Field -->
<div class="form-group row">
    <div class="col-sm-2 col-title">
    {!! Form::label('email', 'Email:') !!}
    </div>
    <div class=" col-sm-8">
    <p>{!! $hotel->email !!}</p>
</div>
</div>

<!-- Phone Field -->
<div class="form-group row">
    <div class="col-sm-2 col-title">
    {!! Form::label('phone', 'Phone:') !!}
    </div>
    <div class=" col-sm-8">
    <p>{!! $hotel->phone !!}</p>
</div>
</div>

<!-- Remarks Field -->
<div class="form-group row">
    <div class="col-sm-2 col-title">
    {!! Form::label('remarks', 'Remarks:') !!}
    </div>
    <div class=" col-sm-8">
    <p>{!! $hotel->remarks !!}</p>
</div>
</div>

<!-- Status Field -->
<div class="form-group row">
    <div class="col-sm-2 col-title">
    {!! Form::label('status', 'Status:') !!}
    </div>
    <div class=" col-sm-8">
    <p>{!! $hotel->status !!}</p>
</div>
</div>

<!-- Created At Field -->
<div class="form-group row">
    <div class="col-sm-2 col-title">
    {!! Form::label('created_at', 'Created At:') !!}
    </div>
    <div class=" col-sm-8">
    <p>{!! $hotel->created_at !!}</p>
</div>
</div>

<!-- Updated At Field -->
<div class="form-group row">
    <div class="col-sm-2 col-title">
    {!! Form::label('updated_at', 'Updated At:') !!}
    </div>
    <div class=" col-sm-8">
    <p>{!! $hotel->updated_at !!}</p>
</div></div>


    <!-- Deleted At Field -->
<div class="form-group row">
    <div class="col-sm-2 col-title">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    </div>
    <div class=" col-sm-8">
    <p>{!! $hotel->deleted_at !!}</p>
</div></div>

    <!-- Limit Members Field -->
<div class="form-group row">
    <div class="col-sm-2 col-title">
    {!! Form::label('limit_members', 'Limit Members:') !!}
    </div>
    <div class=" col-sm-8">
    <p>{!! $hotel->limit_members !!}</p>
    </div>
</div>

