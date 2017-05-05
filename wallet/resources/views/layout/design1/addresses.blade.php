<div class="row contentrow" id="addresses" style="background-color: darkgrey">
    <div class="col-xs-12">
        <table id="addressesList" class="display table table-hover">
            <thead>
            <tr>
                <th>Label</th>
                <th>Address</th>
                <th>Amount</th>
            </tr>
            </thead>
            @if (count($sendingAddresses) > 0)
                @foreach ($sendingAddresses as $eachAddress)
                    <tr>
                        <td>@if (isset($eachAddress[2]) and strlen($eachAddress[2]) > 0) {!! $eachAddress[2] !!} @else No Label @endif </td>
                        <td>{!! $eachAddress[0] !!}</td>
                        <td>{!! $eachAddress[1] !!} {!! env('WALLET0_TYPE') !!}</td>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>
    <div class="col-xs-12">
        <button>New Address</button>
        <button>Copy Address</button>
        <button>Verify Address</button>
        <button>Delete</button>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#addressesList').DataTable();
    });
</script>