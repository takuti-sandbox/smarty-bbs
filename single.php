<?php

require 'vendor/autoload.php';

$post_no = $_GET['post'];

$pdo = new PDO("mysql:dbname=bbs", "root", "root");
$st = $pdo->prepare("SELECT * FROM post WHERE no = ?");
$st->execute(array($post_no));

$posts = $st->fetchAll();
if(!$posts) {
	header('Location: index.php');
	exit();
}

$st = $pdo->prepare("SELECT * FROM reply WHERE reply_to = ? ORDER BY no DESC");
$st->execute(array($post_no));
$replies = $st->fetchAll();

$smarty = new Smarty();

$smarty->assign('post_no', $post_no);
$smarty->assign('post', $posts[0]);
$smarty->assign('replies', $replies);
$smarty->display('single.tpl');

?>