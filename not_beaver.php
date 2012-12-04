<?php
  include_once('config.php');
  global $game_mode;

  if ($game_mode == 'assassins') {
    require("assassins/not_beaver.php");
  } else {
    require("santa/not_beaver.php");
  }
?>
