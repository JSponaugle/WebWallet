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
		$data = $this->main();
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
		$data['listaddressgroupings'] = [];
		if (isset($this->wallet)) {
			$data['listaddressgroupings'] = $this->listaddressgroupings();
		}
		return view('layout.design1.addresses', $data);
	}

	function masternodes()
	{
		$data = $this->main();
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
			$ret = $this->wallet->listtransactions("",$total);
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
}