<h2>{tr}Poll:{/tr}</h2>
{$poll_info.title}<br /><br />
<div class="admin box">
<div class="boxtitle">{$poll_info.name}</div>
<div class="boxcontent">
{include file="bitpackage:polls/poll.tpl"}
</div>
</div>
<br />
<a href="{$smarty.const.POLLS_PKG_URL}old_polls.php">{tr}Other Polls{/tr}</a><br /><br />
<br />
