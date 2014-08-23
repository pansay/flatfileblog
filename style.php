<?php
error_reporting(E_ALL);

ini_set('zlib.output_compression','On');
ob_start();

// less
include 'lib/lessphp.php';
$less = new lessc;
try {
	echo $less->compileFile("application/view/css/main.less");
}
catch (exception $e) {
	die("fatal error: " . $e->getMessage());
}

// css
//include 'application/view/css/main.css';

$output = ob_get_contents();
$output = preg_replace('/\s+/', ' ',$output);
$output = str_replace("\n", '', $output);
$output = str_replace("	", '', $output);
$output = str_replace(": ", ':', $output);
$output = str_replace("; ", ';', $output);
$output = str_replace(", ", ',', $output);
$output = str_replace(" {", '{', $output);
$output = str_replace("{ ", '{', $output);
$output = str_replace("} ", '}', $output);
ob_end_clean ();

header("Expires: ".gmdate("D, d M Y H:i:s", time()+315360000)." GMT");
header("Cache-Control: max-age=315360000");
header("Content-type: text/css");
echo $output;

?>