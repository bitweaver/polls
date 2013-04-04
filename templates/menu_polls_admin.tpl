{strip}
<li class="dropdown-submenu">
    <a href="#" onclick="return(false);" tabindex="-1" class="sub-menu-root">{tr}{$smarty.const.POLLS_PKG_DIR|capitalize}{/tr}</a>
	<ul class="dropdown-menu sub-menu">
		<li><a class="item" href="{$smarty.const.POLLS_PKG_URL}admin/admin_polls.php">{tr}Admin Polls{/tr}</a></li>
		<li><a class="item" href="{$smarty.const.KERNEL_PKG_URL}admin/index.php?page=polls">{tr}Polls Settings{/tr}</a></li>
	</ul>
</li>
{/strip}
