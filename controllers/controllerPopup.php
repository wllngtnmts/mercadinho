<?php
$json=json_decode(file_get_contents('php://input'));
$objRet=new \Classes\ClassRETS();
echo json_encode($objRet->getRetById($json->id));