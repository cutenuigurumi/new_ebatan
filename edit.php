<?php
define("NONE_TITLE", "<p>タイトルがありません</p>");
define("OVER_TITLE", "<p>タイトルは64文字以内で入力してください。</p>");
define("NONE_BODY", "<p>本文がありません</p>");

//デバッグ用
error_reporting(E_ALL);
ini_set( 'display_errors', 1 );
session_start();

//DB接続の共通化
require('db_connect.php');
//変数の宣言
$error_msg = '';
$id = $_GET['id'];

	//SQLを格納
	$sql = "SELECT title,body FROM post WHERE id = $id";

	//クエリの発行
	$result = mysql_query($sql, $link);
	if(!$result){
		die('<p>SELECTクエリの発行に失敗しました。。</p>');
	}
	$post = mysql_fetch_array($result);
	$title = $post['title'];
	$body = $post['body'];

//初回の判定
if(empty($_COOKIE["PHPSESSID"])){
    $_SESSION['error_message']['title']['none'] = '';
    $_SESSION['error_message']['title']['over'] = '';
    $_SESSION['error_message']['body']['none'] = '';
print("初回判定");
}
//edit_kakunin.phpでエラーがあったかの処理
if(isset($_SESSION['error_message']['title']['none']) &&  $_SESSION['error_message']['title']['none'] == 1){
    $error_msg .= NONE_TITLE;
}
if(isset($_SESSION['error_message']['title']['over'] ) && $_SESSION['error_message']['title']['over']  == 1){
    $error_msg .= OVER_TITLE;
}
if(isset($_SESSION['error_message']['body']['none']) &&  $_SESSION['error_message']['body']['none'] == 1){
    $error_msg .= NONE_BODY;
}
if(!empty($_SESSION['id'])){
	$id = $_SESSION['id'];
}
if(!empty($_SESSION['title'])){
    $title = $_SESSION['title'];
}
if(!empty($_SESSION['body'])){
    $body = $_SESSION['body'];
}

require_once('view/edit.php');

$_SESSION['error_message']['title']['none'] = '';
$_SESSION['error_message']['title']['over']  = '';
$_SESSION['error_message']['body']['none'] = '';
$_SESSION['title'] = '';
$_SESSION['body'] = '';


?>
