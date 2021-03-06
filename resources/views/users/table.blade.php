<div class="table-responsive">

<table class="table table-bordered table-hover" id="users-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Idno</th>
        <th>Phone</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{!! $user->name !!} {!! $user->last !!}</td>
            <td>{!! $user->idno !!}</td>
            <td>{!! $user->phone !!}</td>
            <td>
                {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! url('admin/TenantReport/'. $user->id) !!}" class='btn btn-success btn-xs'><i class="">VIEW TENANT REPORT</i></a>
                    <a href="{!! route('users.edit', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="">REMOVE TENANT</i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>