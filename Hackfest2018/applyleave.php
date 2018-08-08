<html>

<?php
    error_reporting(0);
    $username="root";
    $password="";
    $database="connect";
    $UN=$_POST["usid"];
    $op=$_POST["option"];
     $rs=$_POST["reason"];
     $fd=$_POST["frmdate"];
     $td=$_POST["todate"];
     $ca=$_POST["cat"];
    $roll=$_POST["roll"];
    $name=$_POST["name"];
    $mysqli = new mysqli("localhost", $username, $password, $database);
    $query2="INSERT INTO `leaveapp`( `userid`, `roll_no`, `Leavecat`, `reason`, `name`, `category`,`date`, `count`) VALUES ('$UN','$roll',$op,'$rs','$name','$ca','$fd','$td' )";
    $result2=$mysqli->query($query2);
    if($result2==TRUE){
        echo '<head><meta http-equiv="refresh" content="1; url=ULI.html" />';
    }
?>

</html>
