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
			<article>
				{if $reply_to}
					<b>返信先記事No.</b> {$reply_to}<br /><br />
				{/if}
				<b>名前</b>　{$smarty.post.name|escape:'html'}<br />
				<b>タイトル</b>　{$smarty.post.title|escape:'html'}<br /><br />
				<b>メッセージ</b><br />{$smarty.post.message|escape:'html'|nl2br}
			</article><br />
			この内容で投稿しますか？
			<form method="post" action="{$post_action}">
				{if $reply_to}
					<input type="hidden" name="reply_to" value="{$reply_to}" />
				{/if}
				<input type="hidden" name="name" value="{$smarty.post.name|escape:'html'}" />
				<input type="hidden" name="title" value="{$smarty.post.title|escape:'html'}" />
				<input type="hidden" name="message" value="{$smarty.post.message|escape:'html'}" />
				<input type="submit" value="投稿" />
			</form>
			<form method="post" action="{$edit_action}">
				<input type="hidden" name="name" value="{$smarty.post.name|escape:'html'}" />
				<input type="hidden" name="title" value="{$smarty.post.title|escape:'html'}" />
				<input type="hidden" name="message" value="{$smarty.post.message|escape:'html'}" />
				<input type="submit" value="修正" />
			</form>
			{include 'footer.tpl'}
		</div>
	</body>
</html>