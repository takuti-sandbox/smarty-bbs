<?php

require 'vendor/autoload.php';

$smarty = new Smarty();

$smarty->assign('post_action', 'post.php');
$smarty->assign('edit_action', 'index.php');

if(@$_POST['reply_to']) {
	$reply_to = htmlspecialchars($_POST['reply_to']);
	$smarty->assign('reply_to', $reply_to);
	$smarty->assign('post_action', 'reply.php');
	$smarty->assign('edit_action', 'single.php?post='.$reply_to);
}

$smarty->display('confirm.tpl');

?>