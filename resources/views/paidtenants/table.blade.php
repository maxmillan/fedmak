
<div class="table-responsive">
    <table class="table table-bordered table-hover" id="paidtenants-table">
        <thead>
        <tr>
            <th>Tenant Name</th>
            <th>Property</th>
            <th>House No</th>
            <th>House Type</th>
            <th>Status</th>
            <th>Amount</th>
            <th>Balance</th>
            <th>Date</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($paidtenants as $paidtenant)
            <tr>
                <td>{!! $paidtenant->lease->user->name !!} {!! $paidtenant->lease->user->last !!}</td>
                <td>{!! $paidtenant->lease->propertyunit->property->name !!}</td>
                <td>{!! $paidtenant->lease->propertyunit->house !!}</td>
                <td>{!! $paidtenant->lease->propertyunit->housetype !!}</td>
                <td>{!! $paidtenant->transaction_type !!}</td>
                <td>{!! $paidtenant->amount !!}</td>
                @if($paidtenant->balance==0)
                    <td><b>NO BALANCE</b></td>
                    @else
                    <td>{!! $paidtenant->balance !!}</td>

                @endif
                <td>{!! $paidtenant->created_at->format('d/m/Y') !!}</td>
                <td>
                    {!! Form::open(['route' => ['paidtenants.destroy', $paidtenant->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('paidtenants.show', [$paidtenant->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('paidtenants.edit', [$paidtenant->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
