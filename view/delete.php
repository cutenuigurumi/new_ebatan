<html>
<head>
<title>削除</title>
<link href="./style.css" rel="stylesheet" type="text/css">
</head>
<body>
<form action="delete_do.php" method="post">

<p>下記の書き込みを削除してもよろしいですか？</p>
<p>
<input type="hidden" name="id" value="<?php echo ($id) ?>">
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
