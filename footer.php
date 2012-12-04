<?php
  include_once('config.php');
	require_once("functions.php");
  global $game_mode;
  if (isAdmin()) {
?>
<br />    <br /> <br /><hr /><br />
<?php
  if ($game_mode == "assassins") {
?>
<i>Pssst! Mob boss. Here is the <a href="boss.php">admin panel</a>.</i>
<?
  } else {
?>
<i>Pssst! Santa. Here is the <a href="boss.php">admin panel</a>.</i>
<?php
  }
?>
