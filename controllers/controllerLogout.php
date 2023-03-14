<?php
$objLogout=new Classes\ClassSessions();
$objLogout->destructSessions();
header("location: ".DIRPAGE."login");