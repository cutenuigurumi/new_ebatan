

<html>
<head>
<title>新規投稿</title>
</head>
<body>
<p>
下記の書き込みを<?php echo($action) ?>します。よろしいですか。
</p>
<form action="<?php echo($next_page) ?>" method="post">
<input type="hidden" name="process_type" value="<?php echo($process_type) ?>">
<input type="hidden" name="token" value="<?php echo ($token) ?>">
<input type="hidden" name="id" value="<?php echo ($id) ?>">
<p>
<input type="hidden" name="title" value="<?php echo ($title) ?>">
件名：<?php echo nl2br(htmlspecialchars(($title))); ?>
</p>
<p>
<textarea name="body" style="display:none;" rows="4" cols="40"><?php echo ($body) ?></textarea>
本文：<?php echo nl2br(htmlspecialchars($body)); ?>
</p>
<a href=" <?php echo($_SERVER['HTTP_REFERER']) ?> ">戻る</a> <input type="submit" value="送信">
</form>
</body>
</html>

