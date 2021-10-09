<?php


define('host','http://'. $_SERVER['HTTP_HOST']);
define("admin_view","view/admin/");
define("view_font","view/font-end/");
define('name_project','vanstore/');

$param = str_replace("/".name_project,"",$_SERVER['REQUEST_URI']);
define('param',$param);