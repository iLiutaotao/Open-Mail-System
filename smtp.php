<?php
/** API文件 **/
/** 按下列注释修改 **/
if (!empty($_POST))
{
	$to = $_POST['to'];
	$title = $_POST['title'];
	$content = $_POST['content'];
	if(empty($_POST['host'])){
		$id = 1; //这是由服务器代理发件（发件人地址会固定）的设置内容
		$host = ""; //smtp服务器地址
		$address = ""; //smtp发件人地址
		$user = ""; //smtp发件人
		$pass = ""; //smtp发件人密码
		$fromname = "Open-Mail-System"; //发信人名字
	}else{
		$id = 2;
		$host = $_POST['host'];
		$address = $_POST['address'];
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$fromname = $_POST['fromname'];
	}
	require(dirname(__FILE__)."/mail/class.phpmailer.php");
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->Host = $host;
	$mail->SMTPAuth = true;
	$mail->Username = $user;
	$mail->Password = $pass;
	$mail->From = $address;
	$mail->FromName = $fromname;
	$mail->AddAddress($to);
	$mail->IsHTML(true);
	$mail->Encoding = "Base64";
	$mail->CharSet = 'utf-8';
	$mail->Subject = '=?UTF-8?B?'.base64_encode($title).'?=';
	$mail->Body = ($content);
	if(!$mail->Send()){
		$array = array
			(
				'err_no'=>1,
				'err_info'=>$mail-ErrorInfo,
			);
		echo json_encode($array);
		exit;
	}
	$array = array
		(
			'err_no'=>0,
		);
	echo json_encode($array);
	include_once('sql.php');
	exit();
	}else{
		echo "<h1><center>Hello!</center></h1>";
	}
?>
