<?php
$permitted_chars = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ@!#$_-';
$newPassRandom=substr(str_shuffle($permitted_chars), 0, 10);
echo json_encode($newPassRandom);