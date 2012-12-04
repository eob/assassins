<?php
include_once("config.php");
global $game_mode;

if (is_beaver()) {
	if (! is_assassin()) {
    if (signups_available()) {
      if ($game_mode == 'assassins') {
        require("assassins/signup.php");
      } else {
        require("santa/signup.php");
      }
    }
  }
}
?>
