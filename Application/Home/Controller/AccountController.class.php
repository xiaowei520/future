<?php

namespace Home\Controller;

use Home\Controller\BaseController;
use Org\Util\Response;

class AccountController extends BaseController
{
    public function login()
    {
        $account_id = I('em');
        $passwd = I('pw');

        // 账号表
        $account_model = D('Account');
        $data = $account_model->judge_account_login($account_id, $passwd);
        if ($data) {

            //什么鬼?sublime


            // login success
            $user_info ['account_name'] = $data['account_name'];
            $user_info ['account_id'] = $data['account_id'];
            $user_info ['id'] = $data['id'];
            $user_info ['wealth_value'] = $data['wealth_value'];
            $user_info ['notice_num'] = $data['notice_num'];
            session('user_info', $user_info);
            cookie('user_info', $user_info);
            $test = Response::show('200', '登陆成功!');
        } else
            Response::show('-100', '登陆失败!');
    }

    public function register()
    {
        $this->display();
    }

    public function logout()
    {
        if (isset ($_SESSION)) {
            session(null);
            cookie(null);
            // $this->success ( '推出成功', 'index' );
            $this->redirect('/index/', '页面跳转中...');
        } else {
            $this->error('已经退出登陆！');
        }
    }

}