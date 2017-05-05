<?php

namespace App\Http\Controllers;

use App\Libraries\CyptoConnect;
use Mockery\Exception;

class Wallet extends Controller
{

	public $wallet;

	public function __construct()
	{
		$this->wallet = new CyptoConnect('http://' . env('WALLET0_RPC_USER') . ':' . env('WALLET0_RPC_PASSWORD') . '@' . env('WALLET0_RPC_IP') . ':' . env('WALLET0_RPC_PORT'));
	}

	function index()
	{
		$data = $this->main();
		return view('wallet', $data);
	}

	function dashboard()
	{
		$data = $this->main();
		return view('layout.design1.dashboard', $data);
	}

	function receive()
	{
		$data['listaddressgroupings'] = [];
		if (isset($this->wallet)) {
			$data['listaddressgroupings'] = $this->listaddressgroupings();
		}
		return view('layout.design1.receive', $data);
	}

	function send()
	{
		$data = $this->main();
		return view('layout.design1.send', $data);
	}

	function transactions()
	{
		$data['listtransactions'] = [];
		if (isset($this->wallet)) {
			$data['listtransactions'] = $this->listtransactions(1000);
		}
		return view('layout.design1.transactions', $data);
	}

	function addresses()
	{
		$data['sendingAddresses'] = [];
		if (isset($this->wallet)) {
//			$data['sendingAddresses'] = $this->listaddressgroupings();
		}
		return view('layout.design1.addresses', $data);
	}

	function masternodes()
	{
		$data['masterNodeList'] = [];
		if (isset($this->wallet)) {
			$data['masterNodeList'] = $this->masternodelist();
		}
		return view('layout.design1.masternodes', $data);
	}

	function main()
	{
		$ret = [];
		if (isset($this->wallet)) {
			$ret['getinfo']              = $this->getinfo();
			$ret['listtransactions']     = $this->listtransactions();
			$ret['getstakinginfo']       = $this->getstakinginfo();
			$ret['listaddressgroupings'] = $this->listaddressgroupings();
		}
		return $ret;
	}

	function listaddressgroupings()
	{
		$ret = [];
		try {
			$ret = $this->wallet->listaddressgroupings();
			$ret = $ret[0];
		}
		catch (Exception $e) {

		}
		return $ret;
	}

	function masternodelist()
	{
		$ret = [];
		$i   = 0;
		try {
			$mnl = $this->wallet->masternodelist('full');
			foreach ($mnl as $each => $value) {
				$all             = explode(' ', preg_replace('/\s+/', ' ', trim($value)));
				$mn['pubkey']    = $all[2];
				$mn['address']   = $all[3];
				$mn['lastseen']  = date('Y-m-d H:i:s e',$all[4]);
				$mn['active']    = $all[0];
				$mn['activesec'] = $this->sectohms($all[5]);
				$ret[$i]         = $mn;
				$i++;
			}
		}
		catch (Exception $e) {

		}
		krsort($ret);
		$ret = array_values($ret);
		return $ret;
	}

	function getstakinginfo()
	{
		$ret = [];
		try {
			$ret = $this->wallet->getstakinginfo();
		}
		catch (Exception $e) {

		}
		return $ret;
	}

	function listtransactions($total = 10)
	{
		$ret = [];
		try {
			$ret = $this->wallet->listtransactions("", $total);
			krsort($ret);
		}
		catch (Exception $e) {

		}
		return $ret;
	}

	function getinfo()
	{
		$ret = [];
		try {
			$ret = $this->wallet->getinfo();
		}
		catch (Exception $e) {

		}
		return $ret;
	}

	public function sectohms($ss)
	{
		$s = $ss % 60;
		$m = floor(($ss % 3600) / 60);
		$h = floor(($ss % 86400) / 3600);
		$d = floor(($ss % 2592000) / 86400);
		$M = floor($ss / 2592000);

		$ms = sprintf("%02d", $m)."m:".sprintf("%02d", $s)."s";
		if ($h > 0) {
			$ms = sprintf("%02d", $h)."h:".$ms;
		}
		if ($d > 0) {
			$ms = $d."d ".$ms;
		}
		return $ms;
	}
}