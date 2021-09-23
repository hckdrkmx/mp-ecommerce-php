<?

$json = file_get_contents("php://input");

$EOL = PHP_EOL;
$EOL .= '======================';
$EOL = PHP_EOL;
$EOL .= date('d/m/Y H:i:s');
$EOL = PHP_EOL;
$EOL .= '======================';
$EOL .= PHP_EOL;


@file_put_contents('webhook.txt', $json.$EOL,FILE_APPEND);

?>