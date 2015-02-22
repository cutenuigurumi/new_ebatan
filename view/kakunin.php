

<html>
<head>
<title>新規投稿</title>
</head>
<body>
<form action="<?php echo($next_page) ?>" method="post">
<p>

<input type="hidden" name="process_type" value="<?php echo($process_type) ?>">
<input type="text" name="token" value="<?php echo ($token) ?>">

<?php echo ('token:'.$token) ?>

<input type="hidden" name="title" value="<?php echo ($title) ?>">
件名：<?php echo ($title); ?>
</p>
<p>
<textarea name="body" style="display:none;" rows="4" cols="40"><?php echo ($body) ?></textarea>
本文：<?php echo ($body); ?>
</p>
<a href=" <?php echo($_SERVER['HTTP_REFERER']) ?> ">戻る</a><input type="submit" value="送信">
</form>
</body>
</html>

