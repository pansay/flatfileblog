<?php
include 'config/config.php';
include 'lib/parsedown.php';
include 'system/helper/arrays.php';
include 'system/helper/csv.php';
include 'system/helper/string.php';
include 'system/engine/renderer.php';
include 'application/model/files.php';
include 'application/model/pagination.php';
include 'application/controller/main.php';

$main = new Main();
$main->dispatch();

?>