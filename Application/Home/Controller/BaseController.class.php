<?php

namespace Home\Controller;

use Think\Controller;

class BaseController extends Controller
{
	public function _initialize()
	{
		//入口
		header("Content-Type:text/html; charset=utf-8");
		//header("Access-Control-Allow-Origin：*");
		
		//header("Location: /404.html");
		
		
		
		//检查用户是否自动登录
		$user_info = session("user_info");
		if (!$user_info) {
			//如果当前没有登录，查看cookie中是否存在自动登录标识
			$user_flag = cookie("user_flag");
			$user_token = cookie("user_token");
			if ($user_flag) {
				$device_model = D("Device");
				$device_info = $device_model->get_info_by_uuid($user_flag);
				if ($device_info) {
					if ($device_info['login_token'] == $user_token) {
						//获取用户信息
						$account_model = D("Account");
						$account_info = $account_model->get_info_by_id($device_info['bind_account']);
						if ($account_info) {
							$account_info['device_info'] = $device_info;
							session("user_info", $account_info);
						}
					}
				}
			}
		}
		//增加cdn_url变量
		$this->static_url = C("CDN_URL") . "/Public/default";


	}
	
	function   _empty(){
	
		header( " HTTP/1.0  404  Not Found" );
		
		$this->display( 'Public:404' );
	
	}
	
}