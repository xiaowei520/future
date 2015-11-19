<?php
function think_send_mail($to, $name, $subject = '', $body = '', $attachment = null) {
	$config = C ( 'THINK_EMAIL' );
	Vendor ( 'PHPMailer.PHPMailerAutoload' ); // 从PHPMailer目录导class.phpmailer.php类文件
	
	$mail = new PHPMailer (); // PHPMailer对象
	
	$mail->CharSet = 'UTF-8'; // 设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置，否则乱码
	
	$mail->IsSMTP (); // 设定使用SMTP服务
	
	$mail->SMTPDebug = 0; // 关闭SMTP调试功能
	                      
	// 1 = errors and messages
	                      
	// 2 = messages only
	
	$mail->SMTPAuth = true; // 启用 SMTP 验证功能
	
	$mail->SMTPSecure = 'ssl'; // 使用安全协议
	
	$mail->Host = $config ['SMTP_HOST']; // SMTP 服务器
	
	$mail->Port = $config ['SMTP_PORT']; // SMTP服务器的端口号
	
	$mail->Username = $config ['SMTP_USER']; // SMTP服务器用户名
	
	$mail->Password = $config ['SMTP_PASS']; // SMTP服务器密码
	
	$mail->SetFrom ( $config ['FROM_EMAIL'], $config ['FROM_NAME'] );
	
	$replyEmail = $config ['REPLY_EMAIL'] ? $config ['REPLY_EMAIL'] : $config ['FROM_EMAIL'];
	
	$replyName = $config ['REPLY_NAME'] ? $config ['REPLY_NAME'] : $config ['FROM_NAME'];
	
	$mail->AddReplyTo ( $replyEmail, $replyName );
	
	$mail->Subject = $subject;
	
	$mail->AltBody = "为了查看该邮件，请切换到支持 HTML 的邮件客户端";
	
	$mail->MsgHTML ( $body );
	
	$mail->AddAddress ( $to, $name );
	
	if (is_array ( $attachment )) { // 添加附件
		
		foreach ( $attachment as $file ) {
			
			is_file ( $file ) && $mail->AddAttachment ( $file );
		}
	}
	
	return $mail->Send () ? true : $mail->ErrorInfo;
}
/**
 * 
 * @param unknown $address
 * @param unknown $title
 * @param unknown $message
 * @return Ambigous <boolean, string>
 * 
 */
function SendMail($address, $title, $message) {
	Vendor ( 'PHPMailer.PHPMailerAutoload' );
	$mail = new PHPMailer (); // 设置PHPMailer使用SMTP服务器发送Email
	$mail->IsSMTP (); // 设置邮件的字符编码，若不指定，则为'UTF-8'
	$mail->CharSet = 'UTF-8'; // 添加收件人地址，可以多次使用来添加多个收件人
	$mail->AddAddress ( $address ); // 设置邮件正文
	$mail->Body = $message; // 设置邮件头的From字段。
	$mail->From = C ( 'MAIL_ADDRESS' ); // 设置发件人名字
	$mail->FromName = 'Hello World'; // 设置邮件标题
	$mail->Subject = $title; // 设置SMTP服务器。
	$mail->Host = C ( 'MAIL_SMTP' ); // 设置为"需要验证" ThinkPHP 的C方法读取配置文件
	$mail->SMTPAuth = true; // 设置用户名和密码。
	$mail->Username = C ( 'MAIL_LOGINNAME' );
	$mail->Password = C ( 'MAIL_PASSWORD' ); // 发送邮件。
	return ($mail->Send () ? true : $mail->ErrorInfo);
}

/**
 * 
 * @param number $len
 * @param string $keyword
 * @return boolean|Ambigous <string, mixed>
 * @author wei sun
 * ---------------随机码生成------------------
 */
function rand_string($len = 4, $keyword = '') {
    if (strlen($keyword) > $len) {//关键字不能比总长度长
        return false;
    }
    $str = '';
    $chars = 'abcdefghijkmnpqrstuvwxyz23456789ABCDEFGHIJKMNPQRSTUVWXYZ'; //去掉1跟字母l防混淆            
    if ($len > strlen($chars)) {//位数过长重复字符串一定次数
        $chars = str_repeat($chars, ceil($len / strlen($chars)));
    }
    $chars = str_shuffle($chars); //打乱字符串
    $str = substr($chars, 0, $len);
    if (!empty($keyword)) {
        $start = $len - strlen($keyword);
        $str = substr_replace($str, $keyword, mt_rand(0, $start), strlen($keyword)); //从随机位置插入关键字
    }
    return $str;
}
/**
 * 
 * @param unknown $str
 * @return string
 * @author wei sun
 * 
 * --------------md5 加密-------------------------
 */
function xw_md5($str){
	$base_str = 'ajax_xw';
	return md5($str.$base_str);
	
}



?>
