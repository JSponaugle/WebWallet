<link href="/layouts/design1/css/custom.css?ts={!! strtotime('-1 hour') !!}" rel="stylesheet" type="text/css">
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
        <div class="row" style="background-color: darkgrey">
            <div class="col-xs-2" style="color: #000000; font-size: 1vw;"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</div>
            <div class="col-xs-2" style="color: #000000; font-size: 1vw;"><i class="fa fa-sign-in " aria-hidden="true"></i> Receive</div>
            <div class="col-xs-2" style="color: #000000; font-size: 1vw;"><i class="fa fa-sign-out " aria-hidden="true"></i> Send</div>
            <div class="col-xs-2" style="color: #000000; font-size: 1vw;"><i class="fa fa-credit-card " aria-hidden="true"></i> Transactions</div>
            <div class="col-xs-2" style="color: #000000; font-size: 1vw;"><i class="fa fa-address-book-o " aria-hidden="true"></i> Addresses</div>
            <div class="col-xs-2" style="color: #000000; font-size: 1vw;"><i class="fa fa-server" aria-hidden="true"></i> Masternodes</div>
        </div>
        <div class="row" style="height: 20px; background-color: darkgrey"></div>
        <div class="row" style="background-color: darkgrey">
            <div class="col-xs-5">
                <div class="row">
                    <div class="col-xs-12" style="color: #000000; font-weight: 800;">Balances</div>
                </div>
                <div class="row">
                    <div class="col-xs-3" style="color: #000000">Available</div>
                    <div class="col-xs-9" style="color: #000000; font-weight: 800;">{!! $getinfo['balance'] !!} ION</div>
                </div>
                <div class="row">
                    <div class="col-xs-3" style="color: #000000">Stake</div>
                    <div class="col-xs-9" style="color: #000000; font-weight: 800;">{!! $getinfo['stake'] !!} ION</div>
                </div>
                <div class="row">
                    <div class="col-xs-3" style="color: #000000">Pending</div>
                    <div class="col-xs-9" style="color: #000000; font-weight: 800;">{!! $getinfo['newmint'] !!} ION</div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-3" style="color: #000000">Total</div>
                    <div class="col-xs-9" style="color: #000000; font-weight: 800;">{!! $total = $getinfo['balance'] + $getinfo['stake'] + $getinfo['newmint'] !!} ION</div>
                </div>
            </div>
            <div class="col-xs-7">
                <div class="row">
                    <div class="col-xs-12" style="color: #000000"> Recent Transactions</div>
                </div>
                @foreach ($listtransactions as $oneTrans)
                    <div class="row">
                        <div class="col-xs-2" style="color: #000000"><i class="fa @if ($oneTrans['category'] == "receive")fa-sign-in @elseif($oneTrans['category'] == "send") fa-sign-out @endif fa-4x" aria-hidden="true"></i></div>
                        <div class="col-xs-7" style="color: #000000">
                            <div class="row">
                                {!! date('m/d/Y H:i',$oneTrans['time']) !!}
                            </div>
                            <div class="row">
                                ({!! $oneTrans['address'] !!})
                            </div>
                        </div>
                        <div class="col-xs-3" style="color: @if ($oneTrans['category'] == "receive") #000000 @elseif($oneTrans['category'] == "send") red @endif">@if ($oneTrans['category'] == "receive") + @elseif($oneTrans['category'] == "send") - @endif{!! abs($oneTrans['amount']) !!} ION</div>
                    </div>
                @endforeach
            </div>
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