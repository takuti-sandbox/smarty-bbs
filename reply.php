<?php

$pdo = new PDO("mysql:dbname=bbs", "root", "root");

$name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
$title = htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8');
$message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');
$reply_to = $_POST['reply_to'];

$st = $pdo->prepare("INSERT INTO reply(name,title,message,reply_to) VALUES(?,?,?,?)");
$st->execute(array($name, $title, $message, $reply_to));

header('Location: single.php?post='.$reply_to);
exit();

?>