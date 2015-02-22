<?php

//データベースに接続
$link = mysql_connect('localhost', 'user_b', 'ned5725');
if (!$link) {
    die('接続失敗です。'.mysql_error());
}

//print('<p>接続に成功しました。</p>');

//データベースの選択
$db_selected = mysql_select_db('bbs', $link);
if(!$db_selected){
    die("データベースの選択失敗です".mysql_error());
}
//print('<p>データベースの選択に成功しました</p>');

?>
