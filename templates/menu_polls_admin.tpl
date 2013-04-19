{strip}
{if $packageMenuTitle}<a href="#"> {tr}{$packageMenuTitle|capitalize}{/tr}</a>{/if}
<ul class="{$packageMenuClass}">
	<li><a class="item" href="{$smarty.const.POLLS_PKG_URL}admin/admin_polls.php">{tr}Admin Polls{/tr}</a></li>
	<li><a class="item" href="{$smarty.const.KERNEL_PKG_URL}admin/index.php?page=polls">{tr}Polls{/tr}</a></li>
</ul>
{/strip}
