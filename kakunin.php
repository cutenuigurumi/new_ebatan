<?php
define ('URL', 'http://54.92.3.142/new_ebatan/');
define ('NEW_PAGE', URL.'new.php');
define ('EDIT_PAGE', URL.'edit.php');
define ('LIST_PAGE', URL.'list.php');
define ('NEW_INSERT', 'new_insert.php');
define ('EDIT_UPDATE', 'edit_update.php');
session_start();

require_once('create_token.php');

//入力された内容が正しいかの判定処理。駄目だったら前の画面に戻す
if($_POST['title'] === ''){
	$_SESSION['error_message']['title']['none'] = 1;
} elseif(mb_strlen($_POST['title']) > 64){
	$_SESSION['error_message']['title']['over']  = 1;
}
if($_POST['body'] === ''){
	 $_SESSION['error_message']['body']['none'] = 1;
}

$title = $_POST['title'];
$body = $_POST['body'];
$process_type = $_POST['process_type'];
$ex_page = $_SERVER['HTTP_REFERER'];
$next_page = '';
$call_view = '';
print('kakuninのtoken"'.$token);

//前のページがどこから来たかを判定
if($ex_page === NEW_PAGE){
//	$call_view = NEW_KAKUNIN;
	$next_page .= NEW_INSERT;
}
if($ex_page === EDIT_PAGE){
	$next_page .= EDIT_UODATE;
}
if(empty($ex_page)){
	$next_page .= LIST_PAGE;
}
print('next'.$next_page);
print('<br>');
print('ex'.$ex_page);
print('<br>');
print('hoge'.EDIT_PAGE);

print('<br>');
require('view/kakunin.php');
//上の判定処理に一個でも引っかかったら入力した値をクッキーにセットしてnew.phpにリダイレクトする処理
if(!empty($_SESSION['error_message']['title']['none']) || !empty($_SESSION['error_message']['title']['over']) || !empty($_SESSION['error_message']['body']['none'])){
	header('Location: '.$ex_page);
}


?>
