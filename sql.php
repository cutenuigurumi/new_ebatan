<?php
//デバッグ用
error_reporting(E_ALL);
ini_set( 'display_errors', 1 );
session_start();
$error_flag = 0;

//前ページから受け取る
if(!empty($_POST['id'])){
	$id = $_POST['id'];
}
if(!empty($_POST['title'])){
	$title = $_POST['title'];
	//エスケープ
	$title = mysql_real_escape_string($title);
}
if(!empty($_POST['body'])){
	$body = $_POST['body'];
	$body = mysql_real_escape_string($body);
}
if(!empty($_POST['process_type'])){
	$process_type = $_POST['process_type'];
}else{
	$error_flag = 1;
	$process_type = '';
}
if(!empty($_POST['token'])){
	$token = $_POST['token'];
}else{
	$token = '';
	$error_flag = 1;
}
if($error_flag === 1){
	$_SESSION['submit_result'] = 'NG';
	redirect_list();
}


//tokenの判定
if(!strcmp($token,$_SESSION['token'])){
		print("一致しませんでした。。");
		print($_SESSION['token'].'<br>');
		print($token);
		redirect_list();
}

/* new_insert.phpを直接叩く人への処理
* これが無いと連続で空白投稿できてしまう
*/
if(empty($title)||empty($body)){
	redirect_list();
}
switch($process_type){

	case 'new':
		$sql = "INSERT INTO post(title, body, created_at) VALUES ('$title', '$body', now())";
		break;
	case 'delete':
		$sql = "DELETE FROM post WHERE id = '$id';";
print("delete".$sql);
		break;
	case 'edit':
	    $sql = "UPDATE post SET title = '$title', body = '$body', updated_at = now() WHERE id = '$id';";
		break;
	default:
		$sql = "";
		break;
}

//db接続の共通化
require('db_connect.php');

//クエリの発行
$result = mysql_query($sql, $link);
if(!$result){
	die('<p>クエリの発行に失敗しました。。</p>');
}

print("書き込みました。戻ります<br>");
print("デバッグ用<a herf=\"http://54.92.3.142/new_ebatan/list.php\">戻る</a>");
//セッションの削除
$_SESSION['submit_result'] = "";
    $_SESSION['error_message']['title']['none'] = '';
    $_SESSION['error_message']['title']['over']  = '';
    $_SESSION['error_message']['body']['none'] = '';
    $_SESSION['id'] = '';
    $_SESSION['title'] = '';
    $_SESSION['body'] = '';



$close_flag = mysql_close($link);

if ($close_flag){
	$_SESSION['submit_result'] = 'OK';
	//print('<p>切断に成功しました。</p>');
}
redirect_list();

function redirect_list(){
//list.phpにリダイレクト
header("HTTP/1.1 301 Moved Permanently");
header("Location: http://54.92.3.142/new_ebatan/list.php");
}

?>
