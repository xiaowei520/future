<?php

namespace Home\Controller;

use Home\Controller\BaseController;
use Think\Cache\Driver\Memcached;
use Think\Cache\Driver\Memcache;
use Think\Cache\Driver\Redis;
use Think\Log;
use Org\Util\Response;

class AjaxController extends BaseController {
	
	/**
	 * Ajax 验证 控制器
	 */
	public function index() {
	}
	public function add() {
		// if (think_send_mail($_POST['mail'], $_POST['title'], $subject = '一起来欢乐!',$_POST['content'], $attachment = null)) {
		// $this->success('发送成功！','/index');
		// } else {
		// $this->error('发送失败');
		// }
		if (think_send_mail ( '15947617098@163.com', 'sss', $subject = '一起来欢乐!', 'ssss', $attachment = null )) {
			$this->success ( '发送成功！', '/index' );
		} else {
			$this->error ( '发送失败' );
		}
	}
	public function send() {
		$email = '生生世世生生世世三三三三三三三@163.com';
		$title = '1'; // 标题
		$content = '1'; // 邮件内容
		
		if (SendMail ( $email, $title, $content ) === true) {
			// $this->success('发送成功！','/index');
		} else {
			// $this->error('发送失败','/account');
		}
	}
	
	// 用户注册界面，ajax 校验 邮箱是否注册过，
	public function j_email() {
		// 如果
		if (isset ( $_POST ['em'] )) {
			$email = $_POST ['em'];
			$account_model = D ( 'Account' );
			// 证明已经注册过
			if ($account_model->judge_account_id_isset ( $email )) {
				Response::show ( '-101', '该邮箱已经被注册!' );
			} 			// 未注册过 可以发送验证码去校验
			else {
				// 发送给用户的信息
				$rand_string = strtolower(rand_string ());
				$title = '欢迎您注册！么么哒。';
				$content = '您好,您的注册验证码是 : ' . $rand_string . '   !, 如果不是本人操作，请忽略！';
				
				$Memcached = Memcached::getInstance ();
				// 暂时不加密了。
				$Memcached->set ( $email, $rand_string );
				
				if (SendMail ( $email, $title, $content ) === true) {
					Response::show ( '200', '已经发送验证码，请注意查收!' );
				} else {
					Log::write ( '发送验证码失败,to [--' . $email . '--]', 'WARN' );
					Response::show ( '-102', '邮件发送失败，未知原因!' );
				}
			}
		}
		
		Response::show ( '-103', '数据丢失!' );
	}
	// 验证码 验证
	public function j_checkcode() {
	}
	
	// 注册信息提交
	public function j_register() {
		if (! isset ( $_POST ['mem'] ) && ! isset ( $_POST ['myh'] ) && ! isset ( $_POST ['myz'] ) && ! isset ( $_POST ['mp1'] ) && ! isset ( $_POST ['mp2'] )) {
			Response::show ( '-100', '注册信息丢失!' );
		}
		// 验证码
		$checkcode = strtolower($_POST ['myz']);
		// 用户的邮箱
		$email = $_POST ['mem'];
		
		$Memcached = Memcached::getInstance ();
		// 暂时不加密了。
		
		if ($Memcached->get ( $email ) == $checkcode) {
			// 验证码正确
			// 注册用户信息封装
			$account_info = null;
			$account_info ['account_id'] = $_POST ['mem'];
			$account_info ['account_name'] = $_POST ['myh'];
			$account_info ['password'] = xw_md5 ( $_POST ['mp1'] );
			
			$model = M ();
			$model->startTrans ();
			
			$account_model = D ( 'Account' );
			
			if ($account_model->find ( $account_info ['account_id'] )) {
				Response::show ( '-100', '用户已经存在！' );
			}
			if ($account_model->add_account ( $account_info )) {
				$model->commit ();
				Response::show ( '200', '注册成功!' );
			} else {
				$model->rollback ();
				Response::show ( '-100', '注册失败！' );
			}
		} else {
			Response::show ( '-100', '验证码不正确!' );
		}
	}
}