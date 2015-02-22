<?php

//include('../list.php');

?>

<html>
<head>
    <title>ebatan bbs</title>
</head>
<body>
<link href="view/style.css" rel="stylesheet" type="text/css">
<table>
    <tr>
    <td width="150"><a href="new.php">新規書き込み</a></td>
    <td>
    <table border="1">
		<tr>
		<td>投稿No.</td>
		<td>タイトル:</td>
		<td width="300">本文：</td>
		<td>投稿日時：</td>
		<td>変更日時</td>
		<td>編集/削除</td>
		</tr>
<?php
foreach($post_list as $post){ ?>
        <tr>
        <td><?php echo $post['id']; ?></td>
        <td><?php echo htmlspecialchars($post['title']); ?></td>
        <td width="400"><?php echo nl2br(htmlspecialchars($post['body'])); ?></td>
        <td><?php echo $post['created_at'] ?></td>
        <td><?php echo $post['updated_at'] ?></td>
        <td><a href="edit.php?id=<?php echo($post['id']) ?>">編集</a>/<a href="delete.php?id=<?php echo($post['id']) ?>">削除</a></td>
        </tr>
<?php } ?>
        </table>
    </td>
    </tr>
</table>

    </td>
    </tr>
</table>

    </td>
    </tr>
</table>
</body>     
