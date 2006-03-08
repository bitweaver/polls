<div class="floaticon">{bithelp}</div>

<div class="admin polls">
<div class="header">
<h1 class="title">{tr}Admin Polls{/tr}: {$poll_info.title}</h1>
</div>

<div class="body">

<h2>{tr}Edit or add poll options{/tr}</h2>
<form action="{$smarty.const.POLLS_PKG_URL}admin/admin_poll_options.php" method="post">
<input type="hidden" name="option_id" value="{$option_id|escape}" />
<input type="hidden" name="poll_id" value="{$poll_id|escape}" />
<div class="row">{tr}Option{/tr}:<input type="text" name="title" value="{$title|escape}" size="70" /></div>
<div class="row submit"><input type="submit" name="save" value="{tr}Save{/tr}" /></div>
</form>

<h2>{tr}Poll options{/tr}</h2>
<table class="find">
<tr><td>{tr}Find{/tr}</td>
   <td>
   <form method="get" action="{$smarty.const.POLLS_PKG_URL}admin/admin_poll_options.php">
     <input type="text" name="find" value="{$find|escape}" />
     <input type="submit" value="{tr}find{/tr}" name="search" />
     <input type="hidden" name="sort_mode" value="{$sort_mode|escape}" />
   </form>
   </td>
</tr>
</table>

<table class="data">
<tr>
<th><a href="{$smarty.const.POLLS_PKG_URL}admin/admin_poll_options.php?poll_id={$poll_id}&amp;offset={$offset}&amp;sort_mode={if $sort_mode eq 'title_desc'}title_asc{else}title_desc{/if}">{tr}Title{/tr}</a></th>
<th><a href="{$smarty.const.POLLS_PKG_URL}admin/admin_poll_options.php?poll_id={$poll_id}&amp;offset={$offset}&amp;sort_mode={if $sort_mode eq 'votes_desc'}votes_asc{else}votes_desc{/if}">{tr}Votes{/tr}</a></th>
<th>{tr}action{/tr}</th>
</tr>
{cycle values="even,odd" print=false}
{section name=user loop=$polls}
<tr class="{cycle}">
<td>{$polls[user].title}</td>
<td>{$polls[user].votes}</td>
<td>
   <a href="{$smarty.const.POLLS_PKG_URL}admin/admin_poll_options.php?poll_id={$poll_id}&amp;offset={$offset}&amp;sort_mode={$sort_mode}&amp;remove={$polls[user].option_id}">{tr}remove{/tr}</a>
   <a href="{$smarty.const.POLLS_PKG_URL}admin/admin_poll_options.php?poll_id={$poll_id}&amp;offset={$offset}&amp;sort_mode={$sort_mode}&amp;option_id={$polls[user].option_id}">{tr}edit{/tr}</a>
</td>
</tr>
{sectionelse}
<tr class="norecords"><td colspan="3">{tr}No records found{/tr}</td></tr>
{/section}
</table>

<div class="pagination">
{if $prev_offset >= 0}
[<a href="{$gTikiLoc.POLLS_PKG_URL}edit_poll_options.php?find={$find}&amp;pollId={$pollId}&amp;offset={$prev_offset}&amp;sort_mode={$sort_mode}">{tr}prev{/tr}</a>]&nbsp;
{/if}
{tr}Page{/tr}: {$actual_page}/{$cant_pages}
{if $next_offset >= 0}
&nbsp;[<a href="{$gTikiLoc.POLLS_PKG_URL}edit_poll_options.php?find={$find}&amp;pollId={$pollId}&amp;offset={$next_offset}&amp;sort_mode={$sort_mode}">{tr}next{/tr}</a>]
{/if}
{if $direct_pagination eq 'y'}
<br />
{section loop=$cant_pages name=foo}
{assign var=selector_offset value=$smarty.section.foo.index|times:$maxRecords}
<a href="{$gTikiLoc.POLLS_PKG_URL}edit_poll_options.php?find={$find}&amp;pollId={$pollId}&amp;offset={$selector_offset}&amp;sort_mode={$sort_mode}">
{$smarty.section.foo.index_next}</a>&nbsp;
{/section}
{/if}
</div>

<h2>{tr}Preview poll{/tr}</h2>
<div class="box">
<div class="boxtitle">{$poll_info.name}</div>
<div class="boxcontent">
{include file="bitpackage:polls/poll.tpl"}
</div>
</div>

</div> {* end .body *}

<div class="navbar">
	<a class="navtab" href="{$smarty.const.POLLS_PKG_URL}admin/admin_polls.php" class="navtab">{tr}List polls{/tr}</a>
	<a class="navtab" href="{$smarty.const.POLLS_PKG_URL}admin/admin_polls.php?poll_id={$poll_id}" class="navtab">{tr}Edit this poll{/tr}</a>
</div>

</div> {* end .polls *}
