<?php
if (is_beaver()) {
	if (! is_assassin()) {
		if (signups_available()) {
?>
<h1>A note, tucked secretly into your backpack on the way to CSAIL...</h1>
<br />
We have been watching you, <? echo memberName() ?>, and believe you have what it takes to become an assassin. But first you must shed your old identity. <br />
<br />
If you dare undertake this path, enter your new name below.<br />
<br />
<form action="do_signup.php" method="POST">
    My assassin name: <input type="text" name="name" /><br />
    <input value="Join Assassins" type="submit" />
</form>
<?php
}}}
?>