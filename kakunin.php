<?php
define ('URL', 'http://54.92.3.142/new_ebatan/');
define ('NEW_PAGE', URL.'new.php');
define ('EDIT_PAGE', URL.'edit.php');
define ('LIST_PAGE', URL.'list.php');
define ('NEW_INSERT', 'new_insert.php');
define ('EDIT_UPDATE', 'edit_update.php');
define ('SQL_PAGE', 'sql.php');
session_start();


$ex_page = $_SERVER['HTTP_REFERER'];
$next_page = '';

if($ex_page === LIST_PAGE){
	$process_type = "delete";
	list($id, $body, $title) = call_delete();
} else{
	//入力された内容が正しいかの判定処理。駄目だったら前の画面に戻す
	if($_POST['title'] === ''){
		$_SESSION['error_message']['title']['none'] = 1;
	} elseif(mb_strlen($_POST['title']) > 64){
		$_SESSION['error_message']['title']['over']  = 1;
	}
	if($_POST['body'] === ''){
		 $_SESSION['error_message']['body']['none'] = 1;
	}
	$id = $_POST['id'];
	$title = $_POST['title'];
	$body = $_POST['body'];
	$process_type = $_POST['process_type'];

	//前のページに戻る場合、値を保持していなければいけない
	$_SESSION['id'] = $id;
	$_SESSION['title'] = $title;
	$_SESSION['body'] = $body;
}
//tokenの作成
$token = md5(mt_rand());
$_SESSION["token"] = $token;

//	print_r($post);

//直接このページを叩いていたらlist.phpにリダイレクトする
if(empty($ex_page)){
	$next_page .= LIST_PAGE;
} else {
	$next_page .= SQL_PAGE;
}
if($process_type === 'new'){
	$action = '投稿';
}
if($process_type === 'edit'){
	$action = '編集';
}
if($process_type === 'delete'){
	$action = '削除';
}

require('view/kakunin.php');


//エラーチェックに一個でも引っかかったら入力した値をセッションにセットして前のページにリダイレクトする処理
if(!empty($_SESSION['error_message']['title']['none']) || !empty($_SESSION['error_message']['title']['over']) || !empty($_SESSION['error_message']['body']['none'])){
	header('Location: '.$ex_page);
}


function call_delete($post){

$delete_id = $_GET['id'];
require('db_connect.php');
$sql = "SELECT title,body FROM post WHERE id =" .$delete_id.";";
//クエリの発行
$result = mysql_query($sql, $link);
if(!$result){
    die('<p>クエリの発行に失敗しました。。</p>');
}

$delete_post = mysql_fetch_array($result);

return array($delete_id, $delete_post['title'], $delete_post['body']);
//print_r($post);
}

?>
