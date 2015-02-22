<?php
//デバッグ用
error_reporting(E_ALL);
ini_set( 'display_errors', 1 );

//DB接続の共通化
require('db_connect.php');

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

$close_flag = mysql_close($link);

if ($close_flag){
	//print('<p>切断に成功しました。</p>');
}

?>
