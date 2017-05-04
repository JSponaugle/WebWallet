<?php

namespace App\Http\Controllers;
use App\Libraries\CyptoConnect;
use Mockery\Exception;

class Wallet extends Controller {

	function index() {
		$data = $this->main();
		return view('wallet',$data);
	}

	function main() {
		$ret = [];
		$wallet = new CyptoConnect('http://' . env('WALLET0_RPC_USER') . ':' . env('WALLET0_RPC_PASSWORD') . '@'. env('WALLET0_RPC_IP') .':' . env('WALLET0_RPC_PORT'));
		if (isset($wallet)) {
			try {
				$ret['getinfo'] = $wallet->getinfo();
			} catch (Exception $e) {

			}
			try {
				$ret['listtransactions'] = $wallet->listtransactions();
				krsort($ret['listtransactions']);
			} catch (Exception $e) {

			}
			try {
				$ret['getstakinginfo'] = $wallet->getstakinginfo();
			} catch (Exception $e) {

			}
		}
		return $ret;
	}
}