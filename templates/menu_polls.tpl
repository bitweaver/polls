{sortlinks}

{if $gTikiSystemPrefs.feature_debug_console eq 'y'}
{if $packageMenuTitle}<a class="menuoption" href="javascript:toggle('debugconsole');">{tr}Debugger console{/tr}</a>{/if}
{/if}{if $gTikiSystemPrefs.feature_live_support eq 'y' and ($tiki_p_live_support_admin eq 'y' or $user_is_operator eq 'y')}
{if $packageMenuTitle}<a class="menuoption" href="{$gTikiLoc.LIVE_SUPPORT_PKG_URL}admin/index.php">{tr}Live support{/tr}</a>{/if}
{/if}{if $gTikiSystemPrefs.feature_banning eq 'y' and ($tiki_p_admin_banning eq 'y')}
{if $packageMenuTitle}<a class="menuoption" href="{$gTikiLoc.KERNEL_PKG_URL}admin/admin_banning.php">{tr}Banning{/tr}</a>{/if}
{/if}{if $gTikiSystemPrefs.feature_calendar eq 'y' and ($tiki_p_admin_calendar eq 'y')}
{if $packageMenuTitle}<a class="menuoption" href="{$gTikiLoc.CALENDAR_PKG_URL}admin/index.php">{tr}Calendar{/tr}</a>{/if}
{/if}{if $tiki_p_admin eq 'y'}
{if $packageMenuTitle}<a class="menuoption" href="{$gTikiLoc.KERNEL_PKG_URL}admin/index.php">{tr}Administer Packages{/tr}</a>{/if}
{if $packageMenuTitle}<a class="menuoption" href="{$gTikiLoc.WIKI_PKG_URL}admin/import_phpwiki.php">{tr}Import PHPWiki{/tr}</a>{/if}
{if $packageMenuTitle}<a class="menuoption" href="{$gTikiLoc.KERNEL_PKG_URL}admin/phpinfo.php">{tr}phpinfo{/tr}</a>{/if}
{if $packageMenuTitle}<a class="menuoption" href="{$gTikiLoc.KERNEL_PKG_URL}admin/db_performance.php">{tr}Database Performance{/tr}</a>{/if}
{if $packageMenuTitle}<a class="menuoption" href="{$gTikiLoc.KERNEL_PKG_URL}admin/admin_dsn.php">{tr}DSN{/tr}</a>{/if}
{if $packageMenuTitle}<a class="menuoption" href="{$gTikiLoc.WIKI_PKG_URL}admin/admin_external_wikis.php">{tr}External Wiki{/tr}</a>{/if}
{if $packageMenuTitle}<a class="menuoption" href="{$gTikiLoc.KERNEL_PKG_URL}admin/admin_system.php">{tr}System{/tr}</a>{/if}
{if $packageMenuTitle}<a class="menuoption" href="{$gTikiLoc.KERNEL_PKG_URL}admin/backup.php">{tr}Backups{/tr}</a>{/if}
{if $packageMenuTitle}<a class="menuoption" href="{$gTikiLoc.KERNEL_PKG_URL}list_cache.php">{tr}Link Cache{/tr}</a>{/if}
{if $packageMenuTitle}<a class="menuoption" href="{$gTikiLoc.USERS_PKG_URL}admin/admin_groups.php">{tr}Groups{/tr}</a>{/if}
{if $packageMenuTitle}<a class="menuoption" href="{$gTikiLoc.USERS_PKG_URL}admin/index.php">{tr}Users{/tr}</a>{/if}
{if $packageMenuTitle}<a class="menuoption" href="{$gTikiLoc.KERNEL_PKG_URL}admin/admin_menus.php">{tr}Menus{/tr}</a>{/if}
{if $packageMenuTitle}<a class="menuoption" href="{$gTikiLoc.KERNEL_PKG_URL}admin/admin_modules.php">{tr}Modules{/tr}</a>{/if}
{if $packageMenuTitle}<a class="menuoption" href="{$gTikiLoc.KERNEL_PKG_URL}admin/admin_notifications.php">{tr}Notification{/tr}</a>{/if}
{if $packageMenuTitle}<a class="menuoption" href="{$gTikiLoc.RSS_PKG_URL}admin/index.php">{tr}RSS modules{/tr}</a>{/if}
{if $packageMenuTitle}<a class="menuoption" href="{$gTikiLoc.QUICKTAGS_PKG_URL}admin/index.php">{tr}QuickTags{/tr}</a>{/if}
	{if $gTikiSystemPrefs.feature_featuredLinks eq 'y'}
		<a class="menuoption" href="{$gTikiLoc.FEATURED_LINKS_PKG_URL}admin/index.php">{tr}Links{/tr}</a>
	{/if}{if $gTikiSystemPrefs.feature_hotwords eq 'y'}
		<a class="menuoption" href="{$gTikiLoc.HOTWORDS_PKG_URL}admin/index.php">{tr}Hotwords{/tr}</a>
	{/if}{if $gTikiSystemPrefs.feature_polls eq 'y'}
		<a class="menuoption" href="{$gTikiLoc.POLLS_PKG_URL}edit.php">{tr}Polls{/tr}</a>
	{/if}{if $gTikiSystemPrefs.feature_search_stats eq 'y'}
		<a class="menuoption" href="{$gTikiLoc.SEARCH_PKG_URL}stats.php">{tr}Search stats{/tr}</a>
	{/if}{if $gTikiSystemPrefs.feature_theme_control eq 'y'}
		<a class="menuoption" href="{$gTikiLoc.THEMES_PKG_URL}theme_control.php">{tr}Theme control{/tr}</a>
	{/if}
{/if}{if $gTikiSystemPrefs.feature_chat eq 'y' and $tiki_p_admin_chat eq 'y'}
{if $packageMenuTitle}<a class="menuoption" href="{$gTikiLoc.CHAT_PKG_URL}admin/index.php">{tr}Chat{/tr}</a>{/if}
{/if}{if $gTikiSystemPrefs.feature_categories eq 'y' and $tiki_p_admin_categories eq 'y'}
{if $packageMenuTitle}<a class="menuoption" href="{$gTikiLoc.CATEGORIES_PKG_URL}admin/index.php">{tr}Categories{/tr}</a>{/if}
{/if}{if $gTikiSystemPrefs.feature_banners eq 'y' and $tiki_p_admin_banners eq 'y'}
{if $packageMenuTitle}<a class="menuoption" href="{$gTikiLoc.BANNERS_PKG_URL}admin/index.php">{tr}Banners{/tr}</a>{/if}
{/if}{if $gTikiSystemPrefs.feature_edit_templates eq 'y' and $tiki_p_edit_templates eq 'y'}
{if $packageMenuTitle}<a class="menuoption" href="{$gTikiLoc.THEMES_PKG_URL}edit_templates.php">{tr}Templates{/tr}</a>{/if}
{/if}{if $gTikiSystemPrefs.feature_drawings eq 'y' and $tiki_p_admin_drawings eq 'y'}
{if $packageMenuTitle}<a class="menuoption" href="{$gTikiLoc.DRAWINGS_PKG_URL}admin/index.php">{tr}Drawings{/tr}</a>{/if}
{/if}{if $gTikiSystemPrefs.feature_dynamic_content eq 'y' and $tiki_p_admin_dynamic eq 'y'}
{if $packageMenuTitle}<a class="menuoption" href="{$gTikiLoc.DCS_PKG_URL}index.php">{tr}Dynamic content{/tr}</a>{/if}
{/if}{if $tiki_p_edit_cookies eq 'y'}
{if $packageMenuTitle}<a class="menuoption" href="{$gTikiLoc.KERNEL_PKG_URL}admin/admin_cookies.php">{tr}Cookies{/tr}</a>{/if}
{/if}{if $gTikiSystemPrefs.feature_webmail eq 'y' and $tiki_p_admin_mailin eq 'y'}
{if $packageMenuTitle}<a class="menuoption" href="{$gTikiLoc.WEBMAIL_PKG_URL}admin/admin_mailin.php">{tr}Mail-in{/tr}</a>{/if}
{/if}{if $tiki_p_edit_content_templates eq 'y'}
{if $packageMenuTitle}<a class="menuoption" href="{$gTikiLoc.THEMES_PKG_URL}admin/admin_content_templates.php">{tr}Content templates{/tr}</a>{/if}
{/if}{if $gTikiSystemPrefs.feature_html_pages eq 'y' and $tiki_p_edit_html_pages eq 'y'}
{if $packageMenuTitle}<a class="menuoption" href="{$gTikiLoc.HTML_PKG_URL}admin/admin_html_pages.php">{tr}HTML pages{/tr}</a>{/if}
{/if}{if $gTikiSystemPrefs.feature_shoutbox eq 'y' and $tiki_p_admin_shoutbox eq 'y'}
{if $packageMenuTitle}<a class="menuoption" href="{$gTikiLoc.SHOUTBOX_PKG_URL}index.php">{tr}Shoutbox{/tr}</a>{/if}
{/if}{if $gTikiSystemPrefs.feature_referer_stats eq 'y' and $tiki_p_view_referer_stats eq 'y'}
{if $packageMenuTitle}<a class="menuoption" href="{$gTikiLoc.STATS_PKG_URL}referer_stats.php">{tr}Referer stats{/tr}</a>{/if}
{/if}{if $tiki_p_edit_languages eq 'y' && $lang_use_db eq 'y'}
{if $packageMenuTitle}<a class="menuoption" href="{$gTikiLoc.LANGUAGES_PKG_URL}edit_languages.php">{tr}Languages{/tr}</a>{/if}
{/if}{if $gTikiSystemPrefs.feature_integrator eq 'y' and $tiki_p_admin_integrator eq 'y'}
{if $packageMenuTitle}<a class="menuoption" href="{$gTikiLoc.INTEGRATOR_PKG_URL}admin/index.php">{tr}Integrator{/tr}</a>{/if}
{/if}
{/sortlinks}
