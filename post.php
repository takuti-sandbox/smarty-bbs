<?php

$pdo = new PDO("mysql:dbname=bbs", "root", "root");

$name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
$title = htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8');
$message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');

$st = $pdo->prepare("INSERT INTO post(name,title,message) VALUES(?,?,?)");
$st->execute(array($name, $title, $message));

header('Location: index.php');
exit();

?>