<div class="row contentrow" id="addresses" style="background-color: darkgrey">
    <div class="col-xs-12">
        These are your {!! env('WALLET0_TYPE') !!} addresses for receiving payments. You may want to give a different one to each sender so you can keep track of who is paying you.
    </div>
    <div class="col-xs-12">
        <hr>
        <table id="receiveList" class="display table table-hover">
            <thead>
            <tr>
                <th>Label</th>
                <th>Address</th>
                <th>Amount</th>
            </tr>
            </thead>
            @if (count($listaddressgroupings) > 0)
                @foreach ($listaddressgroupings as $eachAddress)
                    <tr>
                        <td>@if (isset($eachAddress[2]) and strlen($eachAddress[2]) > 0) {!! $eachAddress[2] !!} @else No Label @endif </td>
                        <td>{!! $eachAddress[0] !!}</td>
                        <td>{!! $eachAddress[1] !!} {!! env('WALLET0_TYPE') !!}</td>
                    </tr>
                @endforeach
            @endif
        </table>
        <hr>
    </div>
    <div class="col-xs-12">
        <button>New Address</button>
        <button>Copy Address</button>
        <button>Verify Address</button>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#receiveList').DataTable();
    });
</script>