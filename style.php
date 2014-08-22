<?php

if (isset($_SERVER['HTTP_ACCEPT_ENCODING']) && substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) {
	ob_start("ob_gzhandler");
}
else {
	ob_start();
}

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
$output = str_replace("\n", '', $output);
$output = str_replace("	", '', $output);
$output = str_replace(": ", ':', $output);
$output = str_replace(", ", ',', $output);
$output = str_replace(" {", '{', $output);
ob_end_clean ();

header("Content-type: text/css; charset=utf-8");
echo $output;

?>