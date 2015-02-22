<?php
//デバッグ用
error_reporting(E_ALL);
ini_set( 'display_errors', 1 );

//前ページから受け取る
$id = $_POST['id'];
$title = $_POST['title'];
$body = $_POST['body'];
print('delete_do'.$id);
//list.phpにリダイレクト
header("HTTP/1.1 301 Moved Permanently");
header("Location: http://54.92.3.142/ebatan/list.php");

//db接続の共通化
require('db_connect.php');

//SQLを格納
$sql = "DELETE FROM post WHERE id = '$id';";


//クエリの発行
$result = mysql_query($sql, $link);
if(!$result){
	die('<p>クエリの発行に失敗しました。。</p>');
}

print("書き込みました。戻ります<br>");

//セッションの削除
session_start();
session_unset();

$close_flag = mysql_close($link);

if ($close_flag){
	//print('<p>切断に成功しました。</p>');
}

?>
