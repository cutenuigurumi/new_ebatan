<html>
<head>
<title>編集</title>
<link href="./style.css" rel="stylesheet" type="text/css">
</head>
<body>
<p class = "error"><?php echo($error_msg); ?></p>
<form action="kakunin.php?id=<?php echo($id) ?>" method="post">
<p>
<input type="hidden" name="process_type" value="edit">
<input type="hidden" name="token" value="<?php echo{$token} ?>">
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
