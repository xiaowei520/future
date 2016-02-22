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
	public function test(){
		echo 1;
 
    error_reporting(E_ALL);  
    set_time_limit(0);  
    ob_implicit_flush();  
    //本地IP  
    $address = 'localhost:4000';  
    //设置用111端口进行通信  
    $port = 111;  
    //创建SOCKET  
    if (($sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) < 0) {  
            echo "socket创建失败原因 " . socket_strerror($sock) . "\n";  
    }  
      
    if (($ret = socket_bind($sock, $address, $port)) < 0) {  
            echo "创建套接字失败原因 " . socket_strerror($ret) . "\n";  
    }  
    //监听  
    if (($ret = socket_listen($sock, 5)) < 0) {  
            echo "监听失败原因 " . socket_strerror($ret) . "\n";  
    }  
    do {  
        //接收命令   
        if (($msgsock = @socket_accept($sock)) < 0) {  
            echo "命令接收失败原因: " . socket_strerror($msgsock) . "\n";  
            break;  
        }  
        $msg = "\nPHP Test Server. \n" ."用quit,shutdown,sun...等命令测试.\n";  
      
        @socket_write($msgsock, $msg, strlen($msg));  
      
        do {  
            if (false === ($buf = @socket_read($msgsock, 2048, PHP_NORMAL_READ))) {  
                    echo "socket_read() failed: reason: " . socket_strerror($ret) . "\n";  
                    break 2;  
            }  
            if (!$buf = trim($buf)) {  
                    continue;  
            }  
            if ($buf == 'quit') {  
                    break;  
            }  
            if ($buf == 'shutdown') {  
                    socket_close($msgsock);  
                    break 2;  
            }  
            if ($buf == 'sun') {  
                    echo'what are you doing?';  
            }  
            $talkback = "Backinformation : '$buf'.\n";  
            socket_write($msgsock, $talkback, strlen($talkback));  
            echo "$buf\n";  
        } while (true);  
      
        socket_close($msgsock);  
      
    } while (true);  
      
    socket_close($sock);  
    
	}
	public function client(){

		error_reporting(E_ALL);
		//端口111
		$service_port = 111;
		//本地
		$address = 'localhost:4000';
		//创建 TCP/IP socket
		$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		if ($socket < 0) {
				echo "socket创建失败原因: " . socket_strerror($socket) . "\n";
		} else {
				echo "OK，HE HE.\n";
		}
		$result = socket_connect($socket, $address, $service_port);
		if ($result < 0) {
				echo "SOCKET连接失败原因: ($result) " . socket_strerror($result) . "\n";
		} else {
				echo "OK.\n";
		}
		//发送命令
		$in = "HEAD / HTTP/1.1\r\n";
		$in .= "Connection: Close\r\n\r\n";
		$out = '';
		echo "Send Command..........";
		$in = "sun\n";
		socket_write($socket, $in, strlen($in));
		echo "OK.\n";
		echo "Reading Backinformatin:\n\n";
		while ($out = socket_read($socket, 2048)) {
				echo $out;
		}
		echo "Close socket........";
		socket_close($socket);
		echo "OK,He He.\n\n";

	}
	
	
	
}
