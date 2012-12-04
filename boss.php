<?
require_once("config.php");
require("functions.php");

if (isAdmin()) {
    if ($_POST["action"] == "reshuffle") {
        ?>
        Reshuffled
        <?        
    }
    else {
        
        $sql = "SELECT * FROM assassins;";
        $res = mysql_query($sql);
        ?>
        <h1>Welcome, Boss</h1>
        <h2>Game Controls</h2>

        <form method="POST">
        <input type="hidden" name="action" value="reshuffle" />
        <input type="submt" value="Reshuffle Players" />
        </form>

        <h2>Registered Assassins</h2>
        <table>
            <tr><th>Name</th><th>Email</th><th>Alive?</th><th>Killed By</th><th>Kill Confirmed</th><th>Obituary</th></tr>
        <? while ($row = mysql_fetch_assoc($res)) { ?>
            <tr>
                <td><? echo $row["name"] ?></td>
                <td><? echo $row["email"] ?></td>
                <td><? echo ($row["killed_by"] == 0) ?></td>
                <td></td>
                <tr></td>
                <td></td>
            </tr>
        <? } ?>
        </table>    
        <?
        
    }
    

}
?>
