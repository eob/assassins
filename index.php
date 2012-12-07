<?php
  require_once('config.php');
	require_once("functions.php");
  global $game_mode;
?>
<html>
<head>
<?php
if ($game_mode == "assassins") {
?>
<title>CSAIL Assassins</title>
<?php
  require("assassins/head.php");
  require("assassins/style.php");
} else {
?>
<title>CSAIL Secret Santa</title>
<?php
  require("santa/head.php");
  require("santa/style.php");
}
?>
</head>
<body>
<?php
	if (is_beaver()) {
		if (is_assassin()) {
			include("assassin.php");			
		}
		else {
			// Not assassin
			if (signups_available()) {
    			include("signup.php");							
			}
			else {
				// no signups avail
				include("sorry_dude.php");
			}
		}
        include("footer.php");
	}
	else {
		// isn't a csailer
		include("not_beaver.php");
	}
?>
</body>
</html>
