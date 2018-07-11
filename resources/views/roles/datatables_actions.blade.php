{!! Form::open(['route' => ['roles.destroy', $id], 'method' => 'delete', 'class' =>'form-delete','onsubmit'=>'return confirmDelete(this);']) !!}
<div class='btn-group'>
    <a href="{{ route('roles.show', $id) }}" class='btn btn-default btn-sm'>
        Detail
    </a>
    <a href="{{ route('roles.edit', $id) }}" class='btn btn-default btn-sm'>
        Edit
    </a>
    {!! Form::button('Delete', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-sm'
    ]) !!}
</div>
{!! Form::close() !!}
