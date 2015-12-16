<?php
return array(
	//'配置项'=>'配置值'
	
	'THINK_EMAIL' => array(
	
			'SMTP_HOST' => 'smtp.163.com', //SMTP服务器
	
			'SMTP_PORT' => '25', //SMTP服务器端口
	
			'SMTP_USER' => '15947617098@163.com', //SMTP服务器用户名
	
			'SMTP_PASS' => '547966965', //SMTP服务器密码
	
			'FROM_EMAIL' => '15947617098@163.com', //发件人EMAIL
	
			'FROM_NAME' => '****', //发件人名称
	
			'REPLY_EMAIL' => '15947617098@163.com', //回复EMAIL（留空则为发件人EMAIL）
	
			'REPLY_NAME' => '*****', //回复名称（留空则为发件人名称）
	
	),
	'MAIL_ADDRESS'=>'15947617098@163.com', // 邮箱地址
	'MAIL_SMTP'=>'smtp.163.com', // 邮箱SMTP服务器
	'MAIL_LOGINNAME'=>'15947617098@163.com', // 邮箱登录帐号
	'MAIL_PASSWORD'=>'547966965', // 邮箱密码
	

	'LOG_RECORD' => true, // 开启日志记录
	'LOG_LEVEL' => 'EMERG,ALERT,CRIT,ERR,WARN,NOTICE,INFO', // 只记录EMERG ALERT CRIT ERR 错误
	'LOG_FILE_SIZE' => 524288000, // 500MB日志文件切分一次
	
		
	'MEMCACHED_HOST' => array('127.0.0.2','127.0.0.2'),
	'MEMCACHED_PORT' => array('11211','11212'),
);