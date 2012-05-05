<?php
/**
 * @version $Header$
 *
 * Copyright (c) 2002-2003, Luis Argerich, Garland Foster, Eduardo Polidor, et. al.
 * Copyright (c) 2006, Stephan Borg <wolff_borg@yahoo.com.au>
 * All Rights Reserved. See below for details and a complete list of authors.
 * Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See http://www.gnu.org/copyleft/lesser.html for details.
 *
 * @package polls
 */

/**
 * @package polls
 */
class PollLib extends BitBase {
	function PollLib() {
		parent::__construct();
	}

	// Functions for polls ////
	/*shared*/
	function get_poll($poll_id) {
		$query = "select * from `".BIT_DB_PREFIX."tiki_polls` where `poll_id`=?";
		$result = $this->mDb->query($query,array((int)$poll_id));
		if (!$result->numRows()) return false;
		$res = $result->fetchRow();
		return $res;
	}

	//This should be moved to a poll module (currently in setup.php
	/*shared*/
	function poll_vote($poll_id, $option_id) {
		$query = "update `".BIT_DB_PREFIX."tiki_poll_options` set `votes`=`votes`+1 where `option_id`=?";
		$result = $this->mDb->query($query,array((int)$option_id));
		$query = "update `".BIT_DB_PREFIX."tiki_polls` set `votes`=`votes`+1 where `poll_id`=?";
		$result = $this->mDb->query($query,array((int)$poll_id));
	}

	function list_polls($offset, $maxRecords, $sort_mode, $find) {

		if ($find) {
			$findesc = '%' . $find . '%';

			$mid = " where (`title` like ?)";
			$bindvars=array($findesc);
		} else {
			$mid = "";
			$bindvars=array();
		}

		$query = "select * from `".BIT_DB_PREFIX."tiki_polls` $mid order by ".$this->mDb->convert_sortmode($sort_mode);
		$query_cant = "select count(*) from `".BIT_DB_PREFIX."tiki_polls` $mid";
		$result = $this->mDb->query($query,$bindvars,$maxRecords,$offset);
		$cant = $this->mDb->getOne($query_cant,$bindvars);
		$ret = array();

		while ($res = $result->fetchRow()) {
			$query = "select count(*) from `".BIT_DB_PREFIX."tiki_poll_options` where `poll_id`=?";

			$res["options"] = $this->mDb->getOne($query,array($res["poll_id"]));
			$ret[] = $res;
		}

		$retval = array();
		$retval["data"] = $ret;
		$retval["cant"] = $cant;
		return $retval;
	}

	function list_active_polls($offset, $maxRecords, $sort_mode, $find) {
		$now = date("U");

		if ($find) {
			$findesc = '%' . $find . '%';

			$mid = " where (`is_active`=? or `is_active`=?) and `publish_date`<=? and (`title` like ?)";
			$bindvars=array('a','c',(int) $now,$findesc);
		} else {
			$mid = " where (`is_active`=? or `is_active`=?) and `publish_date`<=? ";
			$bindvars=array('a','c',(int) $now);
		}

		$query = "select * from `".BIT_DB_PREFIX."tiki_polls` $mid order by ".$this->mDb->convert_sortmode($sort_mode);
		$query_cant = "select count(*) from `".BIT_DB_PREFIX."tiki_polls` $mid";
		$result = $this->mDb->query($query,$bindvars,$maxRecords,$offset);
		$cant = $this->mDb->getOne($query_cant,$bindvars);
		$ret = array();

		while ($res = $result->fetchRow()) {
			$ret[] = $res;
		}

		$retval = array();
		$retval["data"] = $ret;
		$retval["cant"] = $cant;
		return $retval;
	}

	function list_current_polls($offset, $maxRecords, $sort_mode, $find) {
		$now = date("U");

		if ($find) {
			$findesc = '%' . $find . '%';

			$mid = " where `is_active`=? and `publish_date`<=? and (`title` like ?)";
			$bindvars=array('c',(int) $now,$findesc);
		} else {
			$mid = " where `is_active`=? and `publish_date`<=? ";
			$bindvars=array('c',(int) $now);
		}

		$query = "select * from `".BIT_DB_PREFIX."tiki_polls` $mid order by ".$this->mDb->convert_sortmode($sort_mode);
		$query_cant = "select count(*) from `".BIT_DB_PREFIX."tiki_polls` $mid";
		$result = $this->mDb->query($query,$bindvars,$maxRecords,$offset);
		$cant = $this->mDb->getOne($query_cant,$bindvars);
		$ret = array();

		while ($res = $result->fetchRow()) {
			$ret[] = $res;
		}

		$retval = array();
		$retval["data"] = $ret;
		$retval["cant"] = $cant;
		return $retval;
	}

	function list_all_polls($offset, $maxRecords, $sort_mode, $find) {
		$now = date("U");

		if ($find) {
			$findesc = '%' . $find . '%';

			$mid = " where `publish_date`<=? and (`title` like ?)";
			$bindvars=array((int) $now,$findesc);
		} else {
			$mid = " where `publish_date`<=? ";
			$bindvars=array((int) $now);
		}

		$query = "select * from `".BIT_DB_PREFIX."tiki_polls` $mid order by ".$this->mDb->convert_sortmode($sort_mode);
		$query_cant = "select count(*) from `".BIT_DB_PREFIX."tiki_polls` $mid";
		$result = $this->mDb->query($query,$bindvars,$maxRecords,$offset);
		$cant = $this->mDb->getOne($query_cant,$bindvars);
		$ret = array();

		while ($res = $result->fetchRow()) {
			$ret[] = $res;
		}

		$retval = array();
		$retval["data"] = $ret;
		$retval["cant"] = $cant;
		return $retval;
	}

	function list_poll_options($poll_id, $offset, $maxRecords, $sort_mode, $find) {

		if ($find) {
			$findesc = '%' . $find . '%';

			$mid = " where `poll_id`=? and (`title` like ?)";
			$bindvars=array((int) $poll_id,$findesc);
		} else {
			$mid = " where `poll_id`=?";
			$bindvars=array((int) $poll_id);
		}

		$query = "select * from `".BIT_DB_PREFIX."tiki_poll_options` $mid order by ".$this->mDb->convert_sortmode($sort_mode);
		$query_cant = "select count(*) from `".BIT_DB_PREFIX."tiki_poll_options` $mid";
		$result = $this->mDb->query($query,$bindvars,$maxRecords,$offset);
		$cant = $this->mDb->getOne($query_cant,$bindvars);
		$ret = array();

		while ($res = $result->fetchRow()) {
			$ret[] = $res;
		}

		$retval = array();
		$retval["data"] = $ret;
		$retval["cant"] = $cant;
		return $retval;
	}

	function remove_poll($poll_id) {
		$query = "delete from `".BIT_DB_PREFIX."tiki_polls` where `poll_id`=?";

		$result = $this->mDb->query($query,array((int) $poll_id));
		$query = "delete from `".BIT_DB_PREFIX."tiki_poll_options` where `poll_id`=?";
		$result = $this->mDb->query($query,array((int) $poll_id));
		$this->remove_object('poll', $poll_id);
		return true;
	}

	function set_last_poll() {
		$now = date("U");

		$query = "select max(`publish_date`) from `".BIT_DB_PREFIX."tiki_polls` where `publish_date`<=?";
		$last = $this->mDb->getOne($query,array((int) $now));
		$query = "update `".BIT_DB_PREFIX."tiki_polls` set `is_active`='c' where `publish_date`=?";
		$result = $this->mDb->query($query,array($last));
	}

	function close_all_polls() {
		$now = date("U");

		$query = "select max(`publish_date`) from `".BIT_DB_PREFIX."tiki_polls` where `publish_date`<=?";
		$last = $this->mDb->getOne($query,array((int) $now));
		$query = "update `".BIT_DB_PREFIX."tiki_polls` set `is_active`='x' where `publish_date`<? and `publish_date`<=?";
		$result = $this->mDb->query($query,array('x',$last,array((int) $now)));
	}

	function active_all_polls() {
		$now = date("U");

		$query = "update `".BIT_DB_PREFIX."tiki_polls` set `is_active`=? where `publish_date`<=?";
		$result = $this->mDb->query($query,array('a',(int) $now));
	}

	function remove_poll_option($option_id) {
		$query = "delete from `".BIT_DB_PREFIX."tiki_poll_options` where `option_id`=?";

		$result = $this->mDb->query($query,array($option_id));
		return true;
	}

	function get_poll_option($option_id) {
		$query = "select * from `".BIT_DB_PREFIX."tiki_poll_options` where `option_id`=?";

		$result = $this->mDb->query($query,array($option_id));

		if (!$result->numRows())
			return false;

		$res = $result->fetchRow();
		return $res;
	}

	function replace_poll($poll_id, $title, $is_active, $publish_date) {

		// Check the name
		if ($poll_id) {
			$query = "update `".BIT_DB_PREFIX."tiki_polls` set `title`=?,`is_active`=?,`publish_date`=? where `poll_id`=?";

			$result = $this->mDb->query($query,array($title,$is_active,$publish_date,$poll_id));
		} else {
			// was a replace into ... nobody knows why 
			$query = "insert into tiki_polls(`title`,`is_active`,`publish_date`,`votes`)
                values(?,?,?,?)";

			$result = $this->mDb->query($query,array($title,$is_active,$publish_date,0));
			$poll_id = $this->mDb->getOne("select max(`poll_id`) from `".BIT_DB_PREFIX."tiki_polls` where `title`=? and `publish_date`=?",array($title,$publish_date));
		}

		return $poll_id;
	}

	function replace_poll_option($poll_id, $option_id, $title) {
		// Check the name
		if ($option_id) {
			$query = "update `".BIT_DB_PREFIX."tiki_poll_options` set `title`=? where `option_id`=?";
			$result = $this->mDb->query($query,array($title,$option_id));
		} else {
			// was a replace into ... why?
			$query = "insert into `".BIT_DB_PREFIX."tiki_poll_options`(`poll_id`,`title`,`votes`)
                values(?,?,?)";
			$result = $this->mDb->query($query,array($poll_id,$title,0));
		}

		return true;
	}

	function get_random_active_poll() {
		// Get pollid from polls where is_active = 'y' and publish_date is less than now
		$res = $this->list_current_polls(0, -1, 'title_desc', '');

		$data = $res["data"];
		$bid = rand(0, count($data) - 1);
		$poll_id = $data[$bid]["poll_id"];
		return $poll_id;
	}

	// User voting system ////
	// Used to vote everything (polls,comments,files,submissions,etc) ////
	// Checks if a user has voted
	/*shared*/
	function user_has_voted($user_id, $id) {
		$ret = false;
		// If user is not logged in then check the session
		if ($user_id != ANONYMOUS_USER_ID)  {
			$query = "select count(*) from `".BIT_DB_PREFIX."tiki_user_votings` where `user_id`=? and `id`=?";
			$result = $this->mDb->getOne($query,array($user_id,(string) $id));
			if ($result) {
				$ret = true;
			}
		} else {
			$votes = isset($_COOKIE["votes"]) ? $_COOKIE["votes"] : array();

			if (in_array($id, $votes)) {
				$ret = true;
			}
		}

		return $ret;
	}

	// Registers a user vote
	/*shared*/
	function register_user_vote($user_id, $id) {
		// If user is not logged in then register in the session
		setcookie( 'votes[]', $id, time() + 30758400, BIT_ROOT_URL);
		if ($user_id != ANONYMOUS_USER_ID) {
			$query = "delete from `".BIT_DB_PREFIX."tiki_user_votings` where `user_id`=? and `id`=?";
			$result = $this->mDb->query($query,array($user_id,(string) $id));
			$query = "insert into `".BIT_DB_PREFIX."tiki_user_votings`(`user_id`,`id`) values(?,?)";
			$result = $this->mDb->query($query,array($user_id,(string) $id));
		}
	}

}

$polllib = new PollLib();

?>
