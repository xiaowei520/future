<?php

namespace Org\Util;
class Response
{
	const JSON = 'json';  //定义一个常亮
	
	/**
	 * @author wei sun 
	 * @param $code 状态码   200 成功    400 失败 $message 提示信息 $data 数据
	 * @see 返回给web前端 的数据组合  json 形式 按综合通信方式输出数据
	 *  
	 */
	public static function show($code, $message = '', $data = array(), $type = self::JSON){
		if (!is_numeric($code)) {
			return '';
		}
		$type = isset($_REQUEST['format']) ? $_REQUEST['format'] : self::JSON;
		$result = array(
				'code' => $code,
				'message' => $message,
				'data' => $data
		);
		if ($type == 'json') {
			self::json($code, $message, $data);
			exit;
		} elseif ($type == 'xml') {
			self::xmlEncode($code, $message, $data);
			exit;
		} else {
			echo "抱歉，暂时未提供此种数据格式";
			//扩展对象或其他方式等
		}
	}
	
	public static function return_data($code, $message = '', $data = array())
	{
		if (!is_numeric($code)) {
			return '';
		}
		$result = array(
			'code' => $code,
			'message' => $message,
			'data' => $data
		);
		return $result;

	}

	/**
	 * 按json格式封装数据
	 * $code 状态码
	 * $message 提示信息
	 * $data 数据
	 */
	public static function json($code, $message = '', $data = array())
	{
		if (!is_numeric($code)) {
			return '';
		}
		$result = array(
			'code' => $code,
			'message' => urlencode($message),
			'data' => $data
		);
		//echo json_encode($result);
		echo urldecode(json_encode($result));
		exit;
	}

	/**
	 * 按xml格式封装数据
	 * $code 状态码
	 * $message 提示信息
	 * $data 数据
	 */
	public static function xmlEncode($code, $message, $data)
	{
		if (!is_numeric($code)) {
			return '';
		}
		$result = array(
			'code' => $code,
			'message' => $message,
			'data' => $data
		);
		header("Content-Type:text/xml");
		$xml = "<?xml version='1.0' encoding='UTF-8'?>\n";
		$xml .= "<root>\n";
		$xml .= self::xmlToEncode($result);
		$xml .= "</root>";
		echo $xml;
	}

	//解析xmlEncode()方法里的$result数组，拼装成xml格式
	public static function xmlToEncode($data)
	{
		$xml = $attr = "";
		foreach ($data as $key => $value) {
			//因为xml节点不能为数字，如果$key是数字的话，就重新定义一个节点名，把该数字作为新节点的id名称
			if (is_numeric($key)) {
				$attr = " id='{$key}'";
				$key = "item";
			}
			$xml .= "<{$key}{$attr}>\n";
			//递归方法处理$value数组，如果是数组继续解析，如果不是数组，就直接给值
			$xml .= is_array($value) ? self::xmlToEncode($value) : $value;
			$xml .= "</{$key}>";
		}
		return $xml;
	}
}

?>