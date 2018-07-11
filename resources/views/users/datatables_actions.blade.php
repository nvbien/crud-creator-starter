{!! Form::open(['route' => ['users.destroy', $id], 'method' => 'delete', 'class' =>'form-delete']) !!}

<div class='btn-group'>
    <a href="{{ route('users.show', $id) }}" class='btn btn-default btn-sm'>
        Detail
    </a>
    @if( has_permission('users.edit'))
    <a href="{{ route('users.edit', $id) }}" class='btn btn-default btn-sm'>
        Edit
    </a>
    @endif
    @if( has_permission('users.delete'))
    {!! Form::button('Delete', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-sm',
        'onclick' => "return confirmDelete(this)"
    ])
    !!}
    @endif
</div>
{!! Form::close() !!}
