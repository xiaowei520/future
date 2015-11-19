<?php

namespace Home\Model;

use Think\Model;

class AccountModel extends Model {
	// public function get
	
	// 检测用户登陆通过 账号和密码
	public function judge_account_login($account_id, $passwd) {
		$condition ['account_id'] = $account_id;
		//$condition ['password'] = $this->passwd ( $passwd );
		$condition ['password'] =  xw_md5( $passwd );
		// $condition['_logic'] = 'OR';
		// 把查询条件传入查询方法
		$data = $this->where ( $condition )->find ();
		if ($data)
			return $data;
		return false;
	}
	//判断账号是否已经被注册过
	public function judge_account_id_isset($account_id){
		$condition ['account_id'] = $account_id;
		$data = $this->where ( $condition )->find ();
		if ($data)
			return $data;
		return false;
	}
	//插入新用户
	public function add_account($data){
		return $this->add($data);
	}
}