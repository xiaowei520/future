<?php
namespace Home\Controller;

use Home\Controller\BaseController;

class UserHomeController extends BaseController{
	
	//用户 个人中心
	public function index(){
		
		
	//	$
		$this->user_info =  session('user_info');
		
		
		$this->display();
	}
	
	//测试签名
	public function test(){
		
		$str = 'Act=&AppId=ckxtxdh&ThirdAppId=&Uin=&ConsumeStreamId=49ee7cb7-1458-4e92-b696-6f80438cea59&TradeNo=123931381766162&Subject=&Amount=1.0&ChargeAmount=0.0&ChargeAmountIncVAT=0.0&ChargeAmountExclVAT=0.0&Country=&Currency=&Note=%E8%B4%AD%E4%B9%B0100G %E5%B8%81%28%E8%B5%A025%29&TradeStatus=completed&CreateTime=&Share=0.0&IsTest=false&';
		$s = md5($str);
		
		$size = strlen($s);
		var_dump($size);
		
		var_dump($s);
		
// 		for ($i = 0; $i < $size; $i++)
// 		{
// 			$result.=	
// 			result.append(Integer.toHexString((MESSAGEID_0X000000FF & s[i])
// 			| MESSAGEID_0XFFFFFF00).substring(6));
// 		}

	}
}