<?php
//デバッグ用
error_reporting(E_ALL);
ini_set( 'display_errors', 1 );
session_start();
$message = '';
$submit_result = '';

//DB接続の共通化
require('db_connect.php');

if(isset($_SESSION['submit_result'])){
	$submit_result = $_SESSION['submit_result'];	
}
if($submit_result === 'NG'){
	$message = '失敗しました。<br>';
}
if($submit_result === 'OK'){
	$message = '成功しました。<br>';
}


//SQLを格納
$sql = "SELECT * FROM post";

//クエリの発行
$result = mysql_query($sql, $link);
if(!$result){
	die('<p>クエリの発行に失敗しました。。</p>');
}

$post_list = array();
while($row = mysql_fetch_array($result)) {
	$post_list[] = $row;
}

require('view/list.php');
$_SESSION['submit_result'] = '';

$close_flag = mysql_close($link);

if ($close_flag){
	//print('<p>切断に成功しました。</p>');
}

?>
