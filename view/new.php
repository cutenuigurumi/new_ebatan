<?php
	// 読み込み

?>
<html>
<head>
<title>新規投稿</title>
<link href="view/style.css" rel="stylesheet" type="text/css">
</head>
<body>

<form action="kakunin.php" method="post">

<input type="hidden" name="process_type" value="new">

<p class = "error"><?php echo($error_msg); ?></p>
<p>
件名：<input type="text" name="title" value="<?php echo($title); ?>">
</p>
<p>
本文：<textarea name="body" rows="4" cols="40"><?php echo($body); ?></textarea>
</p>
<p>
<input type="submit" value="送信">
</p>
</form>

</body>
</html>
