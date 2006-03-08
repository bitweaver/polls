<strong>{$poll_info.title}</strong><br />
<div class="boxcontent">
{form}
	<input type="hidden" name="polls_poll_id" value="{$poll_info.poll_id|escape}" />

	<div class="row">
		{section name=ix loop=$polls}
			<input type="radio" name="polls_option_id" value="{$polls[ix].option_id|escape}" />{tr}{$polls[ix].title}{/tr}<br />
		{/section}
	</div>

	<div class="row submit">
		<input type="submit" name="pollVote" value="{tr}vote{/tr}" /><br />
		<a href="{$smarty.const.POLLS_PKG_URL}results.php?poll_id={$poll_info.poll_id}">{tr}View Results{/tr}</a><br />
		({tr}Votes:{/tr} {$poll_info.votes})
	</div>
	{if $gBitSystem->isFeatureActive('poll_comments') and $comments}<br />({tr}Comments:{/tr} {$comments}){/if}
{/form}
</div>
