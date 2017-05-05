<div class="row contentrow" id="transactions" style="background-color: darkgrey">
    <div class="col-xs-12">
        <table id="transactionsList" class="display table table-hover">
            <thead>
            <tr>
                <th></th>
                <th>Date</th>
                <th>Type</th>
                <th>Address</th>
                <th>Amount {!! env('WALLET0_TYPE') !!}</th>
            </tr>
            </thead>
            @foreach ($listtransactions as $each)
                <tr>
                    <th></th>
                    <th>{!! date('m/d/Y H:i',$each['time']) !!}</th>
                    <th>@if ($each['category'] == "receive") Received with @elseif($each['category'] == "send") Sent to @endif</th>
                    <th>({!! $each['address'] !!})</th>
                    <th style="color: @if ($each['category'] == "receive") #0f7c01 @elseif($each['category'] == "send") #a00303 @endif">@if ($each['category'] == "receive") + @elseif($each['category'] == "send") - @endif{!! abs($each['amount']) !!}</th>
                </tr>
            @endforeach
        </table>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#transactionsList').DataTable();
    });
</script>