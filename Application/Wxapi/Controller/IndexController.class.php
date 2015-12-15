<?php

namespace Wxapi\Controller;

use Think\Controller;
use Org\Util\Wechat;

class IndexController extends Controller {
	
	public function _initialize()
	{
		//加载孙伟的应用配置，订阅号
		$options_1 = C('options1');
		$this->wchat_options_1 = $options_1;
	
		$this->wchat_obj = new \Org\Util\Wechat ($this->wchat_options_1);
		
	}
	
	//微信服务器的推送
	public function index() {

		$this->wchat_obj->valid ();
		
		$type = $this->wchat_obj->getRev ()->getRevType ();
		
		switch ($type) {
			case Wechat::MSGTYPE_TEXT :
				
				$this->wchat_obj->text ( "hello, I'm wechat" )->reply ();
				exit ();
				break;
			case Wechat::MSGTYPE_EVENT :
				$event_arr = $this->wchat_obj->getRevEvent();
				//$event_arr['key']
				$this->wchat_obj->text ( $event_arr['key'] )->reply ();
				
				break;
			case Wechat::MSGTYPE_IMAGE :
				
				break;
			default :
				$this->wchat_obj->text ( "help info" )->reply ();
		}
		
	//	$this->show ( '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>[ 您现在访问的是Home模块的Index控制器 ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>', 'utf-8' );
	}
	public function getMenu(){
		$menu = $this->wchat_obj->getMenu();
		var_dump(json_encode($menu,true));
		
	}

	
	// 测试接口
	public function get_access_token_test() {
		I ( 'grant_type' );
		I ( 'appid' );
		I ( 'secret' );
		
		$url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=' . $this->appid . '&secret=' . $this->appsecret;
		
		$test = $this->http_get ( $url );
		return $test;
	}
	
	// 获取微信access_token----get请求
	public function get_access_token() {
		$url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=' . $this->appid . '&secret=' . $this->appsecret;
		
		$test = $this->http_get ( $url );
		
		var_dump ( $test );
	}
	private function http_post($url, $param) {
		$oCurl = curl_init ();
		if (stripos ( $url, "https://" ) !== FALSE) {
			curl_setopt ( $oCurl, CURLOPT_SSL_VERIFYPEER, FALSE );
			curl_setopt ( $oCurl, CURLOPT_SSL_VERIFYHOST, false );
			curl_setopt ( $oCurl, CURLOPT_SSLVERSION, 1 ); // CURL_SSLVERSION_TLSv1
		}
		
		$strPOST = urldecode ( json_encode ( $param ) );
		
		curl_setopt ( $oCurl, CURLOPT_URL, $url );
		curl_setopt ( $oCurl, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt ( $oCurl, CURLOPT_POST, true );
		curl_setopt ( $oCurl, CURLOPT_POSTFIELDS, $strPOST );
		$sContent = curl_exec ( $oCurl );
		$aStatus = curl_getinfo ( $oCurl );
		curl_close ( $oCurl );
		if (intval ( $aStatus ["http_code"] ) == 200) {
			return $sContent;
		} else {
			return false;
		}
	}
	
	/**
	 * GET 请求
	 * 
	 * @param string $url        	
	 */
	private function http_get($url) {
		$oCurl = curl_init ();
		if (stripos ( $url, "https://" ) !== FALSE) {
			curl_setopt ( $oCurl, CURLOPT_SSL_VERIFYPEER, FALSE );
			curl_setopt ( $oCurl, CURLOPT_SSL_VERIFYHOST, FALSE );
			curl_setopt ( $oCurl, CURLOPT_SSLVERSION, 1 ); // CURL_SSLVERSION_TLSv1
		}
		curl_setopt ( $oCurl, CURLOPT_URL, $url );
		curl_setopt ( $oCurl, CURLOPT_RETURNTRANSFER, 1 );
		$sContent = curl_exec ( $oCurl );
		$aStatus = curl_getinfo ( $oCurl );
		curl_close ( $oCurl );
		if (intval ( $aStatus ["http_code"] ) == 200) {
			return $sContent;
		} else {
			return false;
		}
	}
}