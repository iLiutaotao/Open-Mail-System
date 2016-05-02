<?php
$host='';//数据库服务器
$user='';//数据库用户名
$password='';//数据库密码
$database='';//数据库名
$conn=@mysql_connect($host,$user,$password) or die('数据库连接失败！');
@mysql_select_db($database) or die('没有找到数据库！');
if($id == 1){
    $id = "Open-Mail-System";
    $sql="insert into `open-mail`(time,adress,title,content) values ('$time','$to','$title','$content')";
    if(!mysql_query($sql,$conn)){
        die('Error: ' . mysql_error());
        mysql_close($conn);
    }else{
        echo 1;
        exit();
    }
}else{
    $id = "Agent-Mail-System";
    $sql="insert into `agent-mail`(time,host,adress,title,content) values ('$time','$address','$to','$title','$content')";
    if(!mysql_query($sql,$conn)){
        die('Error: ' . mysql_error());
        mysql_close($conn);
    }else{
        echo 1;
        exit();
    }
}
