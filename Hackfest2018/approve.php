<html>
<?php
$username="root";
    $password="";
    $database="connect";
    $b=$_GET["b"];
    $mysqli = new mysqli("localhost", $username, $password, $database);
    $query="update leaveapp set supapp=1 where index1=$b ";
    $result=$mysqli->query($query);
    echo '<head><meta http-equiv="refresh" content="1; url=index.html" />';
?>
</html>