<?php
  include_once('config.php');
  global $game_mode;

if (is_beaver()) {
  if (is_assassin()) {
    if ($game_mode == 'assassins') {
      require("assassins/game.php");
    } else {
      require("santa/game.php");
    }
  }
}
?>
