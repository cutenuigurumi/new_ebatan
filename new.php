<?php
define("NONE_TITLE", "<p>タイトルがありません</p>");
define("OVER_TITLE", "<p>タイトルは64文字以内で入力してください。</p>");
define("NONE_BODY", "<p>本文がありません</p>");
define("EX_PAGE", "http://54.92.3.142/new_ebatan/kakunin.php");

//デバッグ用
error_reporting(E_ALL);
ini_set( 'display_errors', 1 );
session_start();

$error_msg = '';
$ex_page = EX_PAGE;
$title = '';
$body = '';

//初回の判定
if(empty($_COOKIE["PHPSESSID"])){
	$_SESSION['error_message']['title']['none'] = '';
	$_SESSION['error_message']['title']['over'] = '';
	$_SESSION['error_message']['body']['none'] = '';
}
//new_kakunin.phpでエラーがあったかの処理
if(isset($_SESSION['error_message']['title']['none']) &&  $_SESSION['error_message']['title']['none'] == 1){
	$error_msg .= NONE_TITLE;
print("none_title");
}
if(isset($_SESSION['error_message']['title']['over'] ) && $_SESSION['error_message']['title']['over']  == 1){
	$error_msg .= OVER_TITLE;
print("over_title");
}
if(isset($_SESSION['error_message']['body']['none']) &&  $_SESSION['error_message']['body']['none'] == 1){
	$error_msg .= NONE_BODY;
print("none_body");
}
if(!empty($_SESSION['title'])){
	$title = $_SESSION['title'];
}
if(!empty($_SESSION['body'])){
	$body = $_SESSION['body'];
}


require_once('view/new.php');

	$_SESSION['error_message']['title']['none'] = '';
	$_SESSION['error_message']['title']['over']  = '';
	$_SESSION['error_message']['body']['none'] = '';
	$_SESSION['title'] = '';
	$_SESSION['body'] = '';



?>
