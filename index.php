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

// 返信をすべて取得して、返信先の投稿番号がキーになるように整形
$st = $pdo->query("SELECT * FROM reply ORDER BY no DESC");
$replies = $st->fetchAll();

$arranged_replies = array();
foreach($replies as $reply){
	$arranged_replies[$reply['reply_to']][] = array('no'=>$reply['no'], 'name'=>$reply['name'], 'title'=>$reply['title'], 'message'=>$reply['message'], 'time'=>$reply['time']);
}

$smarty = new Smarty();

$smarty->assign('page', $page);
$smarty->assign('max_page', $max_page);
$smarty->assign('posts', $posts);
$smarty->assign('replies', $arranged_replies);
$smarty->display('index.tpl');

?>