<?php

namespace Home\Controller;

use Home\Controller\BaseController;
use Think\Cache\Driver\Memcached;
use Think\Cache\Driver\Memcache;
use Think\Cache\Driver\Redis;
use Think\Log;
use Org\Util\Response;

class BlogController extends BaseController
{
    //构造
    public function __construct()
    {
        parent::__construct();

    }

    //析构
    public function __destruct()
    {
//		echo 4;
//		var_dump($a);
    }
    //用户推特 某文章ID
    public function index()
    {
       // $user_id = I('user_id');//用户ID下面对应所有分类
        //获取某用户的文章列表
        $id = I('news_id');
        $contentModel =D('Content');
        $info = $contentModel->where(array('id' => $id)) ->find();
        $this -> content = htmlspecialchars_decode($info['content']);

        if(empty($info)){
            $this->error('未找到该文章!');
        }

        $this->display();

    }
    /**
     * 编辑文章
     */
    public function editNews(){
        $id = I('news_id');
        $contentModel =D('Content');
        //判断是否是作者本人
        $news_info = $contentModel->where(array('id' => $id)) ->find();

        if(empty($news_info)){
            $this->error('未找到该文章!');
        }
        if($news_info['uid'] != $id){
            $this->error('无权限.请勿改动url!');
        }
        else{
            if(isset($_POST['save'])){//点击保存
                $content = I('content');
                $data['uid'] = $this->USERINFO['id'];
                $data['update_time'] = time();
                $data['content'] = $content;
                $res = $contentModel ->where(array('id' => $id)) -> save($data);
                if($res === false){
                    //失败
                    $this->error('修改失败');
                }
                else{//成功
                    $this->success('修改成功');
                }
            }
            else{//进入预览
                $this->content = $news_info['content'];
                $this -> news_id = $id;
                $this->display();
            }
        }

    }
    /**
     * 新增
     */
    public function addNews(){
        //保存一下吧
        //or新增
        if(empty($this->USERINFO['id'])){
            $this->error('登陆超时。请登录!');
        }
        $content = I('content');
        //文章model
        $contentModel =D('Content');
        $data['uid'] = $this->USERINFO['id'];
        $data['update_time'] = time();
        $data['create_time'] = time();
        $data['content'] = $content;

        $res = $contentModel ->add($data);
        if($res === false){
            //失败
            $this->error('增加失败');
        }
        else{//成功
            $this->success('增加成功');
        }
    }


}