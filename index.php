<?php
	require("functions.php");
?>
<html>
<head><title>CSAIL Assassins</title>
<!-- Style from http://svanrog.deviantart.com/art/Terminal-CSS-129493473 -->
<style>
body{
    background-color:#080808;
    color:#5fba3d;
	padding: 50px;
    font-family:monospace, prestige;
}

a{
    color:#5fba3d;
    text-decoration:underline;
}

.h1{
    background-color:#080808;
    color:#5fba3d;
}

h2{
    color:#5fba3d;
    font-family:monospace, prestige;
}

img{
    width:0px;
    height:0px;
}

li{
    background-color:#080808;
}

.a{
    background-color:#080808;
}

.redback{
    background-color:#d5381a;
    color:#080808;
}

.blueback{
    background-color:#0034dc;
    color:#5fba3d;
}

.greenback{
    background-color:#5fba3d;
    color:#080808;
}

.yellowback{
    background-color:#e5df43;
    color:#d5381a;
}

.greyback{
    background-color:#888888;
    color:#ffffff;
}

.border{
    width:auto;
    height:auto;
    border-style:solid;
    border-width:3px;
    border-color:#888888;
}

.image{
    width:auto;
    height:auto;
}
</style>
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