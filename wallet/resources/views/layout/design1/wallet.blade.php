<link href="/layouts/design1/css/custom.css?ts={!! strtotime('-1 hour') !!}" rel="stylesheet" type="text/css">
<script src="/layouts/design1/js/custom.js?ts={!! strtotime('-1 hour') !!}"></script>
<div class="row">
    <div class="col-xs-2"></div>
    <div class="col-xs-8" style="border: 1px solid #ffffff;">
        <div class="row" style="background-color: lightgray">
            <div class="col-xs-2" style="color: #000000"><img src="/layouts/design1/img/ion-128.png" style="height: 20px; width: 20px;"> Ion - Wallet</div>
            <div class="col-xs-8"></div>
            <div class="col-xs-2 pull-right">
                <button class="btn-default pull-right" style="height: 20px; width: 20px;"> -</button>
            </div>
        </div>
        <div class="row" style="background-color: lightgray">
            <div class="col-xs-1" style="color: #000000">File</div>
            <div class="col-xs-1" style="color: #000000">Settings</div>
            <div class="col-xs-1" style="color: #000000">Help</div>
            <div class="col-xs-9"></div>
        </div>
        <div class="row menubar" style="background-color: darkgrey">
            <div class="col-xs-2 menubar-dashboard active" onclick="dashboard()"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</div>
            <div class="col-xs-2 menubar-receive" onclick="receive()"><i class="fa fa-sign-in " aria-hidden="true"></i> Receive</div>
            <div class="col-xs-2 menubar-send" onclick="send()"><i class="fa fa-sign-out " aria-hidden="true"></i> Send</div>
            <div class="col-xs-2 menubar-transactions" onclick="transactions()"><i class="fa fa-credit-card " aria-hidden="true"></i> Transactions</div>
            <div class="col-xs-2 menubar-addresses" onclick="addresses()"><i class="fa fa-address-book-o " aria-hidden="true"></i> Addresses</div>
            <div class="col-xs-2 menubar-masternodes" onclick="masternodes()"><i class="fa fa-server" aria-hidden="true"></i> Masternodes</div>
        </div>
        <div class="row" style="height: 20px; background-color: darkgrey"></div>
        <div id="content">
            @include('layout.design1.dashboard')
        </div>
        <div class="row" style="background-color: darkgrey; bottom:0px;">
            <div class="col-xs-10"></div>
            <div class="col-xs-2 pull-right">
                <div class="pull-right">
                    <img @if($getstakinginfo['enabled'] == true) src="/layouts/design1/img/lock_open.png" @else src="/layouts/design1/img/lock_closed.png" @endif style="height: 20px; width: 20px;">
                    <img @if($getstakinginfo['staking'] == true) src="/layouts/design1/img/staking_on.png" @else src="/layouts/design1/img/staking_off.png" @endif style="height: 20px; width: 20px;">
                    <img @if($getinfo['balance'] > 10)
                         src="/layouts/design1/img/connect4_16.png"
                         @elseif($getinfo['balance'] > 8)
                         src="/layouts/design1/img/connect3_16.png"
                         @elseif($getinfo['balance'] > 5)
                         src="/layouts/design1/img/connect2_16.png"
                         @elseif($getinfo['balance'] > 1)
                         src="/layouts/design1/img/connect1_16.png"
                         @else
                         src="/layouts/design1/img/connect0_16.png"
                         @endif style="height: 20px; width: 20px;">
                    <img src="/layouts/design1/img/notsynced.png" style="display:none;height: 20px; width: 20px;">
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-2"></div>
</div>