{strip}

<div class="floaticon">{bithelp}</div>

<div class="admin polls">
	<div class="header">
		<h1>{tr}Admin Polls{/tr}</h1>
	</div>

	<div class="body">
		{form legend="Create a new Poll"}
			<input type="hidden" name="poll_id" value="{$poll_id|escape}" />

			<div class="control-group">
				{formlabel label="Title" for="title"}
				{forminput}
					<input type="text" id="title" name="title" value="{$title|escape}" size="50"/>
					{formhelp note=""}
				{/forminput}
			</div> 

			<div class="control-group">
				{formlabel label="Is Active" for="is_active"}
				{forminput}
					<select id="is_active" name="is_active">
						<option value='a' {if $is_active eq 'a'}selected="selected"{/if}>{tr}active{/tr}</option>
						<option value='c' {if $is_active eq 'c'}selected="selected"{/if}>{tr}current{/tr}</option>
						<option value='x' {if $is_active eq 'x'}selected="selected"{/if}>{tr}closed{/tr}</option>
					</select>
					{formhelp note=""}
				{/forminput}
			</div>

			<div class="control-group">
				{formlabel label="Publish Date" for="publish_date"}
				{forminput}
					{html_select_date time=$publish_date end_year="+1"} {tr}at{/tr} {html_select_time time=$publish_date display_seconds=false}
					{formhelp note=""}
				{/forminput}
			</div>
			
			<div class="control-group submit">
				<input type="submit" class="btn" name="fSubmit" value="{tr}Save{/tr}" />
			</div>
		{/form}

		<table class="table data">
			<caption>{tr}List of Polls{/tr}</caption>
			<tr>
				<th>{smartlink ititle="ID" isort='poll_id' offset=$offset}</th>
				<th>{smartlink ititle="Title" isort='title' offset=$offset}</th>
				<th>{smartlink ititle="Is Active" isort='is_active' offset=$offset}</th>
				<th>{smartlink ititle="Votes" isort='votes' offset=$offset}</th>
				<th>{smartlink ititle="Publish Date" isort='publish_date' offset=$offset}</th>
				<th>{tr}Options{/tr}</th>
				<th>{tr}Action{/tr}</th>
			</tr>

			{foreach from=$polls_data item=output}
				<tr class="{cycle values="even,odd"}">
					<td>{$output.poll_id}</td>
					<td><a class="tablename" href="{$smarty.const.POLLS_PKG_URL}results.php?poll_id={$output.poll_id}">{$output.title}</a></td>
					<td>{$output.is_active}</td>
					<td>{$output.votes}</td>
					<td>{$output.publish_date|bit_short_datetime}</td>
					<td>{$output.options}</td>
					<td>
						<a href="{$smarty.const.POLLS_PKG_URL}admin/admin_polls.php?offset={$offset}&amp;sort_mode={$sort_mode}&amp;poll_id={$output.poll_id}">{biticon ipackage=liberty iname=edit iforce=icon iexplain="Edit Poll"}</a>
						<a href="{$smarty.const.POLLS_PKG_URL}admin/admin_polls.php?offset={$offset}&amp;sort_mode={$sort_mode}&amp;remove={$output.poll_id}">{biticon ipackage=liberty iname=delete iforce=icon iexplain="Remove Poll"}</a>
						<a href="{$smarty.const.POLLS_PKG_URL}admin/admin_poll_options.php?poll_id={$output.poll_id}">{biticon ipackage=liberty iname=config iforce=icon iexplain="Poll Options"}</a>
					</td>
				</tr>
			{foreachelse}
				<tr class="norecords">
					<td colspan="7">{tr}Nor records found{/tr}</td>
				</tr>
			{/foreach}
		</table>
	</div> {* end .body *}

<div class="pagination">
{if $prev_offset >= 0}
[<a href="{$smarty.const.POLLS_PKG_URL}admin/admin_polls.php?find={$find}&amp;offset={$prev_offset}&amp;sort_mode={$sort_mode}">{tr}prev{/tr}</a>]&nbsp;
{/if}
{tr}Page{/tr}: {$actual_page}/{$cant_pages}
{if $next_offset >= 0}
&nbsp;[<a href="{$smarty.const.POLLS_PKG_URL}admin/admin_polls.php?find={$find}&amp;offset={$next_offset}&amp;sort_mode={$sort_mode}">{tr}next{/tr}</a>]
{/if}
{if $direct_pagination eq 'y'}
<br />
{section loop=$cant_pages name=foo}
{assign var=selector_offset value=$smarty.section.foo.index|times:$maxRecords}
<a href="{$smarty.const.POLLS_PKG_URL}admin/admin_polls.php?find={$find}&amp;offset={$selector_offset}&amp;sort_mode={$sort_mode}">
{$smarty.section.foo.index_next}</a>&nbsp;
{/section}
{/if}
</div>

	<div class="navbar">
		<a href="{$smarty.const.POLLS_PKG_URL}admin/admin_polls.php?setlast=1" class="navtab">{tr}Set last poll as current{/tr}</a>
		<a href="{$smarty.const.POLLS_PKG_URL}admin/admin_polls.php?closeall=1" class="navtab">{tr}Close all polls but last{/tr}</a>
		<a href="{$smarty.const.POLLS_PKG_URL}admin/admin_polls.php?activeall=1" class="navtab">{tr}Activate all polls{/tr}</a>
	</div>

</div> {* end .polls *}
{/strip}
