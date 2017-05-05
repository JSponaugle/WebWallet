<div class="row contentrow" id="dashboard" style="background-color: darkgrey">
    <div class="col-xs-3">
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
    <div class="col-xs-9">
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
                <div class="col-xs-3" style="color: @if ($oneTrans['category'] == "receive") #0f7c01 @elseif($oneTrans['category'] == "send") #a00303 @endif">@if ($oneTrans['category'] == "receive") + @elseif($oneTrans['category'] == "send") - @endif{!! abs($oneTrans['amount']) !!} ION</div>
            </div>
        @endforeach
    </div>
</div>