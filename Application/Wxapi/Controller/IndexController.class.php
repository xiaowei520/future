<?php

namespace Wxapi\Controller;

use Think\Controller;

class IndexController extends Controller {
	public function index() {
		$this->show ( '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>[ 您现在访问的是Home模块的Index控制器 ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>', 'utf-8' );
	}
	protected $appid = 'wx025510256321dd39';
	protected $appsecret = 'd4624c36b6795d1d99dcf0547af5443d';
	
	// 获取微信access_token
	public function get_access_token() {
		$url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=' . $this->appid . '&secret=' . $this->appsecret;
		
		$test = $this->http_post ( $url, $data );
		
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
}