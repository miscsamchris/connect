<html>
<?php
$username="root";
    $password="";
    $database="connect";
    $b=$_GET["a"];
    $mysqli = new mysqli("localhost", $username, $password, $database);
    $query="update leaveapp set supapp=3 where index1=$b ";
    $result=$mysqli->query($query);
    echo '<head><meta http-equiv="refresh" content="1; url=index.html" />';
?>
</html>