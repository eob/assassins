<?php
  include_once('config.php');
  global $game_mode;
require("functions.php");
if (is_beaver()) {
	if (! is_assassin()) {
		if (signups_available()) {
            add_assassin($_POST["name"]);
        // Do signup here

?>
<html>
<head>
<?php
if ($game_mode == "assassins") {
?>
<title>CSAIL Assassins</title>
<?php
  require("assassins/style.php");
} else {
?>
<title>CSAIL Secret Santa</title>
<?php
  require("santa/style.php");
}
?>
</head>
<body>
<?php
if ($game_mode == "assassins") {
  require("assassins/welcome.php");
} else {
  require("santa/welcome.php");
}
?>
</body>
</html>
<?php
}}}
?>
