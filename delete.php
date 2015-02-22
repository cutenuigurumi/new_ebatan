<?php

//デバッグ用
error_reporting(E_ALL);
ini_set( 'display_errors', 1 );
session_start();

//DB接続の共通化
require('db_connect.php');

$id = $_GET['id'];

//SQLを格納
$sql = "SELECT title,body FROM post WHERE id = $id";

//クエリの発行
$result = mysql_query($sql, $link);
if(!$result){
    die('<p>クエリの発行に失敗しました。。</p>');
}

$post = mysql_fetch_array($result);
$title = $post['title'];
$body = $post['body'];

require_once('view/delete.php');


?>

