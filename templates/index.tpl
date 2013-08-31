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
				<p><b>{$post.no}</b>　<b>{$post.title}</b>　投稿者：<b>{$post.name}</b>　{$post.time}　<b><a href="single.php?post={$post.no}">返信</a></b></p><br />
				<p>{$post.message|nl2br}</p>
				{foreach $replies.{$post.no} as $reply}
					<article>
						<p><b>{$reply.no}</b>　<b>{$reply.title}</b>　投稿者：<b>{$reply.name}</b>　{$reply.time}</p><br />
						<p>{$reply.message|nl2br}</p>
					</article>
				{/foreach}
			</article>
			{/foreach}
			<div id="page-nav">
				{if $page != 1}
					<a href="index.php?page={$page-1}">&lt; つぎ</a>
				{/if}
				　
				{if $page != $max_page}
					<a href="index.php?page={$page+1}">まえ &gt;</a>
				{/if}
			</div>
			{include 'footer.tpl'}
		</div> <!-- #wrapper -->
	</body>
</html>