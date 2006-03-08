<div class="polls">
<div class="header">
<h1 class="title">{$poll_info.title}</h1>
</div>

<div class="body">
<table class="data">
{section name=ix loop=$options}
<tr><td>{$options[ix].title}</td>
	<td>{biticon ipackage="polls" iname="leftbar" height="14"}{biticon ipackage="polls" iname="mainbar" width="`$options[ix].width`" height="14"}{biticon ipackage="polls" iname="rightbar" height="14"}</td>
	<td>{$options[ix].percent}% ({$options[ix].votes})</td>
</tr>
{/section}
</table>
<br />

{tr}Total: {$poll_info.votes} votes{/tr}
<br /><br />

<a href="{$smarty.const.POLLS_PKG_URL}old_polls.php">{tr}Other Polls{/tr}</a>
</div>

{if $gBitSystemPrefs.poll_comments eq 'y'}
{if $tiki_p_read_comments eq 'y'}
<div class="navbar comment">
  <a class="navtab" href="javascript:toggle('comzone');">{$comments_cant} {tr}comments{/tr}</a>
</div>
{include file="bitpackage:kernel/comments.tpl"}
{/if}
{/if}

</div>
