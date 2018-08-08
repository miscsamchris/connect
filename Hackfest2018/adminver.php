<html>

<?php
    error_reporting(0);
    $username="root";
    $password="";
    $database="connect";
    $UN=$_POST["usid"];
    $PW=$_POST["pwd"];
    $name="Name";
    $roll="roll_no";
    $mysqli = new mysqli("localhost", $username, $password, $database);
    $query="SELECT * FROM user WHERE email='$UN'";
    $result=$mysqli->query($query);
    if($result->num_rows==0){
                echo '<head><meta http-equiv="refresh" content="1; url=ULI.html" /><h1>Please enter a Correct Email ID</h1></head>';
    }
   while( $row=$result->fetch_assoc()){
    if($PW!=$row["password"]){
        echo '<head><meta http-equiv="refresh" content="1; url=ALI.html" /><h1>Please enter a Correct Password</h1></head>';
    }
    if($row['category']!=3){
         echo '<head><meta http-equiv="refresh" content="1; url=index.html" /><h1>Please Select the correct category</h1></head>';
    }
    if($PW==$row["password"] and $row['category']==3){
        echo '<head><meta http-equiv="refresh" content="1; url=adminresp.php?UN='.$UN.'&N='.$row["$name"].'&R='.$row[$roll].'"/>';

    }
    }
?>

</html>
