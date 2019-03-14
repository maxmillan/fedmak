<div class="table-responsive">
<table class="table table-bordered table-hover" id="mpesapayments-table">
    <thead>
        <tr>
            <th>Transactiontype</th>
        {{--<th>Transactionid</th>--}}
        {{--<th>Transtime</th>--}}
        <th>Transamount</th>
        <th>Businessshortcode</th>
        <th>Billrefnumber</th>
        {{--<th>Invoicenumber</th>--}}
        {{--<th>Orgaccountbalance</th>--}}
        {{--<th>Thirdpartytransid</th>--}}
        <th>Phone no:</th>
        <th>Firstname</th>
        {{--<th>Middlename</th>--}}
        <th>Lastname</th>
        <th>Paymentmode</th>
        <th>Date</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($mpesapayments as $mpesapayment)
        <tr>
            <td>{!! $mpesapayment->TransactionType !!}</td>
            {{--<td>{!! $mpesapayment->TransactionId !!}</td>--}}
            {{--<td>{!! $mpesapayment->TransTime !!}</td>--}}
            <td>{!! $mpesapayment->TransAmount !!}</td>
            <td>{!! $mpesapayment->BusinessShortCode !!}</td>
            <td>{!! $mpesapayment->BillRefNumber !!}</td>
            {{--<td>{!! $mpesapayment->InvoiceNumber !!}</td>--}}
            {{--<td>{!! $mpesapayment->OrgAccountBalance !!}</td>--}}
            {{--<td>{!! $mpesapayment->ThirdPartyTransID !!}</td>--}}
            <td>{!! $mpesapayment->MSISDN !!}</td>
            <td>{!! $mpesapayment->FirstName !!}</td>
            {{--<td>{!! $mpesapayment->MiddleName !!}</td>--}}
            <td>{!! $mpesapayment->LastName !!}</td>
            <td>{!! $mpesapayment->PaymentMode !!}</td>
            <td>{!! $mpesapayment->created_at->format('d/m/Y') !!}</td>
            <td>
                {!! Form::open(['route' => ['mpesapayments.destroy', $mpesapayment->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('mpesapayments.show', [$mpesapayment->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('mpesapayments.edit', [$mpesapayment->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>