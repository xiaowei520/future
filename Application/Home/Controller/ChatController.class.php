<?php

namespace Home\Controller;

use Home\Controller\BaseController;
use Org\Util\Response;


vendor('WebSocket.W.Socket');

class ChatController extends BaseController {
	public function index() {
		$ws = new \WScoket('127.0.0.1:4000', 4000);
		
		echo 'sss';
	}
	
	
	
}
