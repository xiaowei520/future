<?php

namespace Wxapi\Controller;

use Think\Controller;
use Org\Util\Wechat;

class IndexController extends Controller {
	
	public function _initialize()
	{
		//加载孙伟的应用配置，订阅号
		//再次切换回到测试公众号的  功能，订阅号功能太少了
		$options_1 = C('options');
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
	public function createMenu(){

		$newmenu = array (
				'button' => array (
						array (
								'type' => 'view',
								'name' => urlencode("qq空间"),
								"url" => 'http://user.qzone.qq.com/547966965/infocenter?ptsig=pqxc6MoLV4UcgNBvh2oXiSe-D8HyHN-S2PNqaCdSv3M_' 
						),
						array (
								'type' => 'view',
								'name' => urlencode('无聊'),
								"url" => 'http://114.215.146.54/function/open_rili' 
						),
						array (
								'name' => urlencode('我的'),
								'sub_button' => array (
// 										array(
// 											'type' => 'view',
// 											'name' => urlencode('常见问题'),
// 											"url" => 'http://weibo.com/u/5118628430' 
// 										),
										array (
												'type' => 'view',
												'name' => urlencode('视频'),
												"url" => 'http://114.215.146.54/function/open_rili'
										),
										array (
												'type' => 'view',
												'name' => urlencode('视频'),
												"url" => 'http://114.215.146.54/function/open_rili'
										),
								),
								
						) 
				) 
		);
		$result = $this->wchat_obj->createMenu($newmenu);
		var_dump($result);
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