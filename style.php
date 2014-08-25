<?php
ini_set('zlib.output_compression','On');
include 'lib/lessphp.php';
$less = new lessc;
try {
	$output = $less->compileFile('application/view/css/main.less');
}
catch (exception $e) {
	die('fatal error: ' . $e->getMessage());
}
$output = preg_replace('/\s+/', ' ',$output);
$output = str_replace("\n", '', $output);
$output = str_replace('	', '', $output);
$output = str_replace(': ', ':', $output);
$output = str_replace('; ', ';', $output);
$output = str_replace(', ', ',', $output);
$output = str_replace(' {', '{', $output);
$output = str_replace('{ ', '{', $output);
$output = str_replace('} ', '}', $output);
header('Expires: '.gmdate('D, d M Y H:i:s', time() + 315360000).' GMT');
header('Cache-Control: max-age=315360000');
header('Content-type: text/css');

echo $output;

?>