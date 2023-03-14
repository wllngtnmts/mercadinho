<?php
date_default_timezone_set("America/Sao_Paulo");
header("Content-Type: text/html; charset=utf-8");
include("config/config.php");
$getUrl = (isset($_GET['url'])) ? $_GET['url'] : '';
if (SSL == true && !$_SERVER['HTTPS']) {
    echo "<script>window.location='" . DIRPAGE . "$getUrl';</script>";
    exit();
}
include(DIRREQ . "lib/vendor/autoload.php");
include(DIRREQ . "helpers/variables.php");

$dispatch = new Classes\ClassDispatch();
include($dispatch->getInclusao());
