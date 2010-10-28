<?php
function signups_available() {
	return true;
}

function db_connect() {
    $dbhost = 'mysql.csail.mit.edu';
    $dbuser = 'blackcloak';
    $dbpass = 'n1nj4';
    $conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
    $dbname = 'eob_assassins_game';
    mysql_select_db($dbname) or die("Couldn't connect");
}

db_connect();

function make_seed()
{
  list($usec, $sec) = explode(' ', microtime());
  return (float) $sec + ((float) $usec * 100000);
}
srand(make_seed());

function is_beaver() {
	if (@$_SERVER['SSL_CLIENT_S_DN_CN']) {
 		return true;
	}
	else {
		return false;
	}
}

function isAdmin() {
    return ((memberEmail() == "eob@MIT.EDU") || (memberEmail() == "eskang@MIT.EDU"));
}

function is_assassin() {
	$sql = "SELECT * FROM assassins WHERE email = '" . memberEmail() . "';";
	$res = mysql_query($sql);
	if ($row = mysql_fetch_assoc($res)) {
	    return true;
	}
	return false;	
}

function memberName() {
	return $_SERVER['SSL_CLIENT_S_DN_CN'];
}

function killsForAgent($id) {
    $sql = "SELECT count(id) as c FROM assassins WHERE killed_by = $id AND killed_conf = 1;";
    $res = mysql_query($sql);
    $row = mysql_fetch_assoc($res);
    return $row["c"];
}

function targetForId($agent_number) {
    $sql = "SELECT * FROM assassins WHERE agent_number > $agent_number AND (killed_conf != 1 OR killed_by == 0) ORDER BY agent_number LIMIT 1";
    $res = mysql_query($sql);
    if ($row = mysql_fetch_assoc($res)) {
        return $row;
    }
    else {
        $sql = "SELECT * FROM assassins WHERE (killed_conf != 1 OR killed_by == 0) ORDER BY agent_number LIMIT 1";        
        $res = mysql_query($sql);
        return mysql_fetch_assoc($res);
    }
}

function assassinNameForId($id) {
    $sql = "SELECT name FROM assassins WHERE id=$id";
    $res = mysql_query($sql);
    $row = mysql_fetch_assoc($res);
    return $row["name"];
}

function memberEmail() {
	return $_SERVER['SSL_CLIENT_S_DN_Email'];
}

function createAgentId() {
    return rand(1,1000000000000);
}

function add_assassin($name) {
    $sql = "INSERT INTO assassins(name, email, agent_number) VALUES ('" . mysql_real_escape_string($name) . "', '" . memberEmail() . "', " . createAgentId() . ");";
	$res = mysql_query($sql);
}

?>