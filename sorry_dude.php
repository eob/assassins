<?php
  include_once('config.php');
  global $game_mode;

  if ($game_mode == 'assassins') {
    require("assassins/signups_closed.php");
  } else {
    require("santa/signups_closed.php");
  }
?>
