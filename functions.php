<?php

include_once('config.php');

function signups_available() {
	return true;
}

function db_connect() {
  global $db_server;
  global $db_name;
  global $db_user;
  global $db_password;
  $dbhost = 'mysql.csail.mit.edu';
  $dbuser = 'USER';
  $dbpass = 'PASS';
  $conn = mysql_connect($db_server, $db_user, $db_password) or die ('Error connecting to mysql');
  mysql_select_db($db_name) or die("Couldn't connect");
}

db_connect();

function make_seed() {
  list($usec, $sec) = explode(' ', microtime());
  return (float) $sec + ((float) $usec * 100000);
}
srand(make_seed());

function is_beaver() {
    // This is for the IS&T Systems with MIT Certs:
    // if (@$_SERVER['SSL_CLIENT_S_DN_CN']) {
    //          return true;
    // }
    // else {
    //  return false;
    // }
    // This is for the CSAIL systems with CSAIL certs
    if (@$_SERVER['SSL_CLIENT_S_DN_O'] = "MIT Computer Science & Artificial Intelligence Laboratory") {
        return true;
    }
    else {
        return false;
    }
}

function isAdmin() {
    return ((memberEmail() == "eob@CSAIL.MIT.EDU") || (memberEmail() == "eskang@CSAIL.MIT.EDU"));
}

function is_assassin() {
	$sql = "SELECT * FROM assassins WHERE email = '" . memberEmail() . "';";
	$res = mysql_query($sql);
	if ($row = mysql_fetch_assoc($res)) {
	    return true;
	}
	return false;	
}

function memberNick() {
	$sql = "SELECT name FROM assassins WHERE email = '" . memberEmail() . "';";
	$res = mysql_query($sql);
  if ($row = mysql_fetch_assoc($res)) {
      return $row["name"];
	}
	return "Unknown";	
}

function memberName() {
  $name = '';
  $name = $_SERVER['SSL_CLIENT_S_DN_CN'];
  if (sizeof($name) == 0) {
    $name = $_SERVER['REDIRECT_SSL_CLIENT_S_DN_CN'];
  }
  if (sizeof($name) == 0) {
    $name = "Unknown CSAILor";
  }
  return $name;
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
  $e = $_SERVER['REMOTE_USER'];
  if (sizeof($e) == 0) {
    $e = $_SERVER['REDIRECT_SSL_CLIENT_S_DN_Email'];
  }
  if (sizeof($e) == 0) {
    $e = $_SERVER['REDIRECT_REMOTE_USER'];
  }
  return $e;
}

function createAgentId() {
    return rand(1,1000000000000);
}

function add_assassin($name) {
    $sql = "INSERT INTO assassins(name, email, agent_number) VALUES ('" . mysql_real_escape_string($name) . "', '" . memberEmail() . "', " . createAgentId() . ");";
	$res = mysql_query($sql);
}

?>
