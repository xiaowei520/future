<?php

namespace Home\Controller;

use Home\Controller\BaseController;
use Think\Cache\Driver\Memcached;
use Think\Cache\Driver\Memcache;
use Think\Cache\Driver\Redis;
use Think\Log;
use Org\Util\Response;

class BlogController extends BaseController {
	
	

	//构造
	public function __construct(){
		parent::__construct();
		echo 3;
	}
	//析构
	public function __destruct(){
		echo 4;
	}
	public function index() {
		echo 2;
	}
	
	public function ww(){
		
	}
	
	



}