<div class="row contentrow" id="addresses" style="background-color: darkgrey">
    <div class="col-xs-12">
        <ul class="nav nav-tabs">
            <li class="network active" onclick=""><a>{!! env('WALLET0_TYPE') !!} Network</a></li>
            <li class="mynodes" onclick=""><a>My Master Nodes</a></li>
        </ul>
        <div class="ionNetwork">
        <table id="receiveList" class="display table table-hover">
            <thead>
            <tr>
                <th></th>
                <th>Address</th>
                <th>Active</th>
                <th>Active (secs)</th>
                <th>Last Seen</th>
                <th>Pubkey</th>
            </tr>
            </thead>
            @if (count($masterNodeList) > 0)
                <script>console.log({!! json_encode($masterNodeList) !!})</script>
                @foreach ($masterNodeList as $key=>$eachMN)
                    <tr>
                        <td>{!! ++$key !!}</td>
                        <td>{!! $eachMN['address'] !!}</td>
                        <td>{!! $eachMN['active'] !!}</td>
                        <td>{!! $eachMN['activesec'] !!}</td>
                        <td>{!! $eachMN['lastseen'] !!}</td>
                        <td>{!! $eachMN['pubkey'] !!}</td>
                    </tr>
                @endforeach
            @endif
        </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#receiveList').DataTable();
    });
</script>