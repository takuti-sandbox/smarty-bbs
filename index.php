<?php

require 'vendor/autoload.php';

$pdo = new PDO("mysql:dbname=bbs", "root", "root");
$st = $pdo->query("SELECT * FROM post ORDER BY no DESC");
$posts = $st->fetchAll();

$smarty = new Smarty();

$smarty->assign('posts', $posts);
$smarty->display('index.tpl');

?>