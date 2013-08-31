{config_load file="bbs_info.conf"}
<!DOCTYPE HTML>
<html lang="ja">
	<head>
		<meta charset="utf-8" />
		<title>{#title#}</title>
		<link rel="stylesheet" href="style.css" type="text/css" />
	</head>
	<body>
		<div id="wrapper">
			{include 'header.tpl'}
			<form method="post" action="confirm.php">
				<input type="text" name="name" value="{$smarty.post.name|escape:'html'}" placeholder="名前" required /><br />
				<input type="text" name="title" value="{$smarty.post.title|escape:'html'}" placeholder="タイトル" required />　<input type="submit" value="投稿"><br />
				<textarea rows="8" cols="50" name="message" placeholder="メッセージ" required >{$smarty.post.message|escape:'html'}</textarea><br />
			</form>
			{foreach $posts as $post}
			<article>
				<p><b>{$post.no}</b>　<b>{$post.title}</b>　投稿者：<b>{$post.name}</b>　{$post.time}</p><br />
				<p>{$post.message|nl2br}</p>
			</article>
			{/foreach}
			{include 'footer.tpl'}
		</div> <!-- #wrapper -->
	</body>
</html>