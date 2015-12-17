<?php

namespace Wxapi\Controller;

use Think\Controller;
use Org\Util\Wechat;
use Think\Cache\Driver\Memcached;
use Think\Cache\Driver\Memcache;
use Think\Cache\Driver\Redis;

class IndexController extends Controller {
	public function _initialize() {
		// 加载孙伟的应用配置，订阅号
		// 再次切换回到测试公众号的 功能，订阅号功能太少了
		$options_1 = C ( 'options' );
		$this->wchat_options_1 = $options_1;
		
		$this->wchat_obj = new \Org\Util\Wechat ( $this->wchat_options_1 );
	}
	
	// 微信服务器的推送
	public function index() {
		$this->wchat_obj->valid ();
		
		$type = $this->wchat_obj->getRev ()->getRevType ();
		
		switch ($type) {
			case Wechat::MSGTYPE_TEXT :
				
				//$this->wchat_obj->text ( "hello, I'm wechat" )->reply ();
				$this ->AutomaticReply();
				exit ();
				break;
			case Wechat::MSGTYPE_EVENT :
				$event_arr = $this->wchat_obj->getRevEvent ();
				// $event_arr['key']
				$this->wchat_obj->text ( $event_arr ['key'] )->reply ();
				
				break;
			case Wechat::MSGTYPE_IMAGE :
				
				break;
			default :
				$this->wchat_obj->text ( "help info" )->reply ();
		}
	}
	// 被动回复内容。 处理机制
	private function AutomaticReply() {
		// $test = $this->wchat_obj->getRevData();
		$rev_content = $this->wchat_obj->getRevContent ();
		// 实例化memcached
		//$memcache = Memcached::getInstance ();
		$memcache = new Memcache ();
		$memcache_key = $this->wchat_obj->getRevFrom ();
		
		//$this->wchat_obj->text ( $rev_content )->reply ();
		
		$relpy_data = $this->set_reply_data ();
		// 缓存不存在或者下一跳是null第一次进入,或者丢失
		if (! $memcache->get ( $memcache_key )) {
			
			foreach ( $relpy_data ['A'] as $key => $value ) {
				if (! strstr ( $rev_content, $value ['key'] )) {
					// 检索到了
					$this->wchat_obj->text ( $value ['value'] )->reply ();
					$memcache->set ( $memcache_key, $value ['next'] );
					exit ();
				}
			}
		} else {
			
			$position = $memcache->get ( $memcache_key );
			
			foreach ( $relpy_data [$position] as $key => $value ) {
				if (! strstr ( $rev_content, $value ['key'] )) {
					// 检索到了
					$this->wchat_obj->text ( $value ['value'] )->reply ();
					$memcache->set ( $memcache_key, $value ['next'] );
					exit ();
				}
			}
		}
		// 一直没找到对应的KEY
		$this->wchat_obj->text ( "自动回复机制,关键词1，2，3，4，5" )->reply ();
	}
	public function test(){
		
		var_dump( C('MEMCACHE_HOST'));
		var_dump ( C ( 'options' ));
		
		$memcache = Memcached::getInstance ();
		//$memcache = new Memcache ();
		$memcache_key = 1;
		$memcache->set ( $memcache_key, '2' );
	var_dump($memcache->get ( $memcache_key ));
		if (! $memcache->get ( $memcache_key )) {
				
// 			foreach ( $relpy_data ['A'] as $key => $value ) {
// 				if (! strstr ( $rev_content, $value ['key'] )) {
// 					// 检索到了
// 					$this->wchat_obj->text ( $value ['value'] )->reply ();
// 					$memcache->set ( $memcache_key, $value ['next'] );
// 					exit ();
// 				}
// 			}
var_dump('sdd');

		} else {
				
			$position = $memcache->get ( $memcache_key );
				
// 			foreach ( $relpy_data [$position] as $key => $value ) {
// 				if (! strstr ( $rev_content, $value ['key'] )) {
// 					// 检索到了
// 					$this->wchat_obj->text ( $value ['value'] )->reply ();
// 					$memcache->set ( $memcache_key, $value ['next'] );
// 					exit ();
// 				}
// 			}

			var_dump('sdd11');
		}
	}
	
	public function set_reply_data() {
		$data = array ();
		$data ['A'] = array (
				array (
						'key' => '1',
						'value' => '您好A1',
						'next' => '' 
				),
				array (
						'key' => '2',
						'value' => '您好A2',
						'next' => '' 
				),
				array (
						'key' => '3',
						'value' => '您好A3',
						'next' => '' 
				),
				array (
						'key' => '4',
						'value' => '您好A4,请回复',
						'next' => 'B' 
				),
				array (
						'key' => '5',
						'value' => '您好A5',
						'next' => '' 
				) 
		);
		$data ['B'] = array (
				array (
						'key' => '1',
						'value' => '您好B1',
						'next' => '' 
				),
				array (
						'key' => '2',
						'value' => '您好B2,请继续回复1得到肯定的答案',
						'next' => 'C' 
				),
				array (
						'key' => '3',
						'value' => '您好B3',
						'next' => '' 
				) 
		);
		$data ['C'] = array (
				array (
						'key' => '1',
						'value' => '您好C1,你真的坚定不移.',
						'next' => '' 
				) 
		)
		;
		return $data;
	}
	public function getMenu() {
		$menu = $this->wchat_obj->getMenu ();
		var_dump ( json_encode ( $menu, true ) );
	}
	public function createMenu() {
		$newmenu = array (
				'button' => array (
						array (
								'type' => 'view',
								'name' => ("qq空间"),
								"url" => 'http://user.qzone.qq.com/547966965/infocenter?ptsig=pqxc6MoLV4UcgNBvh2oXiSe-D8HyHN-S2PNqaCdSv3M_' 
						),
						array (
								'type' => 'view',
								'name' => ('无聊'),
								"url" => 'http://114.215.146.54/function/open_rili' 
						),
						array (
								'name' => ('我的'),
								'sub_button' => array (
										// array(
										// 'type' => 'view',
										// 'name' => urlencode('常见问题'),
										// "url" => 'http://weibo.com/u/5118628430'
										// ),
										array (
												'type' => 'view',
												'name' => ('视频'),
												"url" => 'http://114.215.146.54/function/open_rili' 
										),
										array (
												'type' => 'view',
												'name' => ('视频'),
												"url" => 'http://114.215.146.54/function/open_rili' 
										) 
								) 
						) 
				) 
		);
		
		$result = $this->wchat_obj->createMenu ( $newmenu );
		var_dump ( $result );
	}
}