<?php


define('host','http://'. $_SERVER['HTTP_HOST']);
define("admin_view","view/admin/");
define('name_project','vancoder/');

$param = str_replace("/".name_project,"",$_SERVER['REQUEST_URI']);
define('param',$param);