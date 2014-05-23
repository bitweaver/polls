<div class="admin polls">
<div class="header">
<h1 class="title"><a href="{$smarty.const.POLLS_PKG_URL}old_polls.php">{tr}Polls{/tr}</a></h1>
</div>

<div class="body">

<table class="find">
<tr><td>{tr}Find{/tr}</td>
   <td>
   <form method="get" action="{$smarty.const.POLLS_PKG_URL}old_polls.php">
     <input type="text" name="find" value="{$find|escape}" />
     <input type="submit" class="btn btn-default" value="{tr}find{/tr}" name="search" />
     <input type="hidden" name="sort_mode" value="{$sort_mode|escape}" />
   </form>
   </td>
</tr>
</table>

<table class="table data">
<tr>
	<th><a href="{$smarty.const.POLLS_PKG_URL}old_polls.php?offset={$offset}&amp;sort_mode={if $sort_mode eq 'title_desc'}title_asc{else}title_desc{/if}">{tr}Title{/tr}</a></th>
	<th><a href="{$smarty.const.POLLS_PKG_URL}old_polls.php?offset={$offset}&amp;sort_mode={if $sort_mode eq 'publish_date_desc'}publish_date_asc{else}publish_date_desc{/if}">{tr}Published{/tr}</a></th>
	<th><a href="{$smarty.const.POLLS_PKG_URL}old_polls.php?offset={$offset}&amp;sort_mode={if $sort_mode eq 'votes_desc'}votes_asc{else}votes_desc{/if}">{tr}Votes{/tr}</a></th>
	<th>{tr}Action{/tr}</th>
</tr>
{cycle values="even,odd" print=false}
{section name=changes loop=$listpages}
<tr class="{cycle}">
	<td>&nbsp;{$listpages[changes].title}&nbsp;</td>
	<td>&nbsp;{$listpages[changes].publish_date|bit_short_datetime}&nbsp;</td>
	<td>&nbsp;{$listpages[changes].votes}&nbsp;</td>
	<td>
		<a href="{$smarty.const.POLLS_PKG_URL}results.php?poll_id={$listpages[changes].poll_id}">{tr}Results{/tr}</a>
		<a href="{$smarty.const.POLLS_PKG_URL}form.php?poll_id={$listpages[changes].poll_id}">{tr}Vote{/tr}</a>
	</td>
</tr>
{sectionelse}
<tr class="norecords"><td colspan="6">
	{tr}No records found{/tr}
</td></tr>
{/section}
</table>

</div> {* end .body *}

<div class="pagination">
{if $prev_offset >= 0}
[<a href="{$smarty.const.POLLS_PKG_URL}old_polls.php?find={$find}&amp;offset={$prev_offset}&amp;sort_mode={$sort_mode}">{tr}prev{/tr}</a>]&nbsp;
{/if}
{tr}Page{/tr}: {$actual_page}/{$cant_pages}
{if $next_offset >= 0}
&nbsp;[<a href="{$smarty.const.POLLS_PKG_URL}old_polls.php?find={$find}&amp;offset={$next_offset}&amp;sort_mode={$sort_mode}">{tr}next{/tr}</a>]
{/if}
{if $direct_pagination eq 'y'}
<br />
{section loop=$cant_pages name=foo}
{assign var=selector_offset value=$gBitSmarty.section.foo.index|times:$maxRecords}
<a href="{$smarty.const.POLLS_PKG_URL}old_polls.php?find={$find}&amp;offset={$selector_offset}&amp;sort_mode={$sort_mode}">
{$gBitSmarty.section.foo.index_next}</a>&nbsp;
{/section}
{/if}
</div>

</div> {* end .polls *}
