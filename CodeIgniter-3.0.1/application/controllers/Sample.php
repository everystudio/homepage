<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sample extends CI_Controller {

	public function index()
	{
		echo "testaaa¥n";

		/*
		$redis = new Redis();
		$redis->connect("127.0.0.1",6379);
		 
		//set(key, value)
		$redis->set("dog","baw-baw");
		 
		//get(key)
		$res = $redis->get("dog");
		echo $res;
		*/

	}
}
