<?

session_start();

$token = md5(mt_rand());
print('a→'.$token);

$_SESSION['token'] = $token;

?>
