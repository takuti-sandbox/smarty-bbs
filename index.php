<?php

require 'vendor/autoload.php';

$pdo = new PDO("mysql:dbname=bbs", "root", "root");
$st = $pdo->query("SELECT * FROM post ORDER BY no DESC");
$posts = $st->fetchAll();

// 該当ページの投稿だけにしたい
$max_page = ceil(count($posts)/5);
if(preg_match('/^[0-9]+$/',$_GET['page'])){
	$page = intval($_GET['page']);
	if($page > $max_page){
		$page = 1;
	}
} else {
	$page = 1;
}
$posts = array_slice($posts, ($page-1)*5, 5);

$smarty = new Smarty();

$smarty->assign('page', $page);
$smarty->assign('max_page', $max_page);
$smarty->assign('posts', $posts);
$smarty->display('index.tpl');

?>