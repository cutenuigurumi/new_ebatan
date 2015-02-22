<?php
//デバッグ用
error_reporting(E_ALL);
ini_set( 'display_errors', 1 );
session_start();
//前ページから受け取る
$id = $_GET['id'];
$title = $_SESSION['title'];
$body = $_SESSION['body'];

//エスケープ
$title = mysql_real_escape_string($title);
$body = mysql_real_escape_string($body);

/* edit_insert.phpを直接叩く人への処理
* これが無いと連続で空白投稿できてしまう
*/
if(empty($title)||empty($body)){
    $sql = "";
}else{
    //SQLを格納
	$sql = "UPDATE post SET title = '$title', body = '$body', updated_at = now() WHERE id = '$id';";
}


//前ページから受け取る
//list.phpにリダイレクト
header("HTTP/1.1 301 Moved Permanently");
header("Location: http://54.92.3.142/ebatan/list.php");

//db接続の共通化
require('db_connect.php');

//クエリの発行
$result = mysql_query($sql, $link);
if(!$result){
	die('<p>updateクエリの発行に失敗しました。。</p>');
}

print("書き込みました。戻ります<br>");

//セッションの削除
session_unset();

$close_flag = mysql_close($link);

if ($close_flag){
	//print('<p>切断に成功しました。</p>');
}

?>
