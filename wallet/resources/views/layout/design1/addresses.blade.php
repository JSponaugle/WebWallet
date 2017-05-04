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
            @foreach ($listaddressgroupings as $eachAddress)
                <tr>
                    <td>@if (isset($eachAddress[2]) and strlen($eachAddress[2]) > 0) {!! $eachAddress[2] !!} @else No Label @endif </td>
                    <td>{!! $eachAddress[0] !!}</td>
                    <td>{!! $eachAddress[1] !!} ION</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#addressesList').DataTable();
    });
</script>