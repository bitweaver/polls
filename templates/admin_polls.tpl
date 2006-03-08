<div class="admin box">
<div class="boxtitle">{tr}Poll settings{/tr}</div>
  <div class="boxcontent">
    <form method="post" action="{$smarty.const.KERNEL_PKG_URL}admin/index.php?page=polls">
    <table class="panel">
    <tr><th colspan="2">{tr}Poll comments settings{/tr}</th></tr>
    <tr><td>{tr}Comments{/tr}:</td><td><input type="checkbox" name="poll_comments" {if $gBitSystemPrefs.poll_comments eq 'y'}checked="checked"{/if}/></td></tr>
    <tr><td>{tr}Default number of comments per page{/tr}: </td><td><input size="5" type="text" name="poll_comments_per_page" value="{$poll_comments_per_page|escape}" /></td></tr>
    <tr><td>{tr}Comments default ordering{/tr}:
    </td><td>
    <select name="poll_comments_default_ordering">
      <option value="commentDate_desc" {if $poll_comments_default_ordering eq 'commentDate_desc'}selected="selected"{/if}>{tr}Newest first{/tr}</option>
      <option value="commentDate_asc" {if $poll_comments_default_ordering eq 'commentDate_asc'}selected="selected"{/if}>{tr}Oldest first{/tr}</option>
      <option value="points_desc" {if $poll_comments_default_ordering eq 'points_desc'}selected="selected"{/if}>{tr}Points{/tr}</option>
    </select>
    </td></tr>
    <tr class="panelsubmitrow"><td colspan="2"><input type="submit" name="pollprefs" value="{tr}Change preferences{/tr}" /></td></tr>
    </table>
    </form>
    </div>
</div>


