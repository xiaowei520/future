<?php

namespace Home\Controller;

use Home\Controller\BaseController;
use Think\Cache\Driver\Memcached;
use Think\Cache\Driver\Memcache;
use Think\Cache\Driver\Redis;

class IndexController extends BaseController {
	public function index() {
		
		// 首页图片信息的路径信息问题。由于还未确定应该是什么类型的。所以先人为写数组
		$index_img_list = array (
				0 => array (
						'url' => '2.jpeg',//用户个性头像
						'name' => 'PHP技术总结',//个人宣言
						'desc' => '孙伟个人描述',//个人一些描述
						'href' => '/Blog/index/news_id/1',
                        //用户ID user_id  文章id  news_id 1
				),
				1 => array (
						'url' => '2.jpeg',
						'name' => '待开发',
						'desc' => '待开发' ,
						'href' => '/function/open_rili',
				),
				2 => array (
						'url' => '3.jpeg',
						'name' => '待开发',
						'desc' => '待开发' ,
						'href' => '/function/open_rili',
				),
				3 => array (
						'url' => '3.jpeg',
						'name' => '待开发',
						'desc' => '待开发' ,
						'href' => '/function/open_rili',
				) 
		);
		
		// 分页显示数据
		$count = count ( $index_img_list );
		//var_dump($count);
		
		

		
		
		$Page = new \Think\Page ( $count, 3 );
		$show = $Page->show (); // 分页显示输出
		$this->pages = $show;
		
		$this->index_img_url = array_slice($index_img_list, $Page->firstRow,$Page->listRows );
		
		// 初始化首页静态图片的位置
		// $index_img_url = "";
		
		// S('surplus_number', '11sss');
		
		// var_dump(S('surplus_number'));
		
		// $cache = Cache::getInstance();
		// 实例化 缓存
		$this->display ();
		// $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>[ 您现在访问的是Home模块的Index控制器 ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
	}


	// 入口文件的Controller
	// 我的测试条件。。。
	// 测试memcached
	// 服务端也可以， 不过需要实例化
	public function testMemcached() {
		$test = Memcached::getInstance ();
		
		// $test->set ( 'test', 12354, 30 );
		var_dump ( $test->get ( 'test' ) );
		// 赋值 缓存
		
		// 移除缓存
		// $memcached->rm ( 'test' );
		
		// 清空缓存
		// $memcached->clear ();
	}
	
	// 测试memcache 服务器端是可以的！！！！114.215.146.54
	public function testMemcache() {
		// phpinfo();
		$memcache = new Memcache ();
		// 赋值 缓存
		// $memcache->set ( 'test', 1235554, 30 );
		// 获取缓存
		var_dump ( $memcache->get ( 'test' ) );
		// 移除缓存
		// $memcache->rm ( 'test' );
		
		// 清空缓存
		// $memcache->clear ();
	}
	public function testRedis() {
		// $redis = Redis::getInstance();
		// $redis->set('test',11112);
		// //$redis->clear();
		// var_dump($redis->get('test'));
		
		// $memcache = new Memcache();
		
		// $memcache->set('test',1111);
		// var_dump($memcache->get('test'));
		$redis = new Redis ();
		
		// $result = $redis->connect('127.0.0.1', 6379);
		// var_dump($result); //结果：bool(true)
	}
	public function test1() {
		$paymeny_rmb_coin_model = M ( 'Account' );
		
		$condition ['account_id'] = '15947617098@163.com';
		
		$condition ['account_name'] = array (
				'in',
				'677,676' 
		);
		
		$paymeny_buy_handle_list = $paymeny_rmb_coin_model->where ( $condition )->select ();
		
		if ($paymeny_buy_handle_list) {
			var_dump ( $paymeny_buy_handle_list [0] ['account_name'] );
		}
	}
}