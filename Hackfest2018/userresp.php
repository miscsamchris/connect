<html>

<head>
    <title>User Portal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="icon" type="image/png" href="favicon.png" />

    <style>
        html,
        body {
            background: lightgray;
            font-family: 'Roboto', sans-serif;
        }

        .logo {
            height: 70px;
            /*border-right: 2px solid #6A8B3B;*/
        }

        .title {
            padding-top: 4vh;
        }

        .body1 {
            background: white;
            box-shadow: 0 0 2px rgba(0, 0, 0, 0.06);
            font-family: 'Roboto', sans-serif;
            line-height: 1.5;
            margin: 0 auto;
            color: black;
            max-width: 85%;
            padding: 2em 2em 4em;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: #000000;
            line-height: 1.3;
        }

        h2 {
            margin-top: 1.3em;
        }

        b,
        strong {
            font-weight: 600;
        }

        .navbar-default {
            background: #3f51b5;
            max-width: 100%;
            margin: 0 auto;

        }

        input[type=submit] {
            background-color: skyblue;
            /* Green */
            border: none;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;

        }

        .Mid {}

        input[type=email],
        input[type=password] {
            width: 50%;

        }

        #Applyleave {
            display: inline;
        }

        #status {
            display: none;
        }

        input[type=radio] {
            margin-left: 10%
        }

        #enterec {
            font-size: 30px;
            margin: 0 auto;
            color: #2b2b2b;
        }

        tr,
        .head {
            border-bottom: lightgray 1px solid;
            padding: 0 20px;
            text-align: center;
        }

    </style>
</head>

<body>
    <nav class="navbar navbar-default container-fluid" style="width: 100%;">
        <div class="container-fluid" style="width: 100%;">
            <div class="navbar-header">
                <a href="index.html"><img src="logo.png" class="navbar-brand logo"></a>
                <p class="navbar-brand title " style="color: aliceblue; font-weight: bold;">Connect - Use Portal</p>
            </div>
        </div>
    </nav>
    <div class="body1 container" style="padding-top: 100px;">
        <div class="row" style="text-align: center; margin-right: 70%">
            <button onclick="change1();" class="col-md-4">Apply Leave</button>
            <button onclick="change2();" class="col-md-4" style="padding-left: 30px;padding-right: 32px;">Status</button>
        </div>
        <div class="Mid col-md-12" style="width: 80%; margin-left: 8.5%">
            <div id="Applyleave">
                <form action="applyleave.php" style="font-size: 20px;" method="POST">
                    <div>
                        <fieldset style="text-align: center;">
                            <h1>Apply Leave / OD</h1>

                            <input type="radio" name="option" value=0 required> <label>Leave</label>
                            <input type="radio" name="option" value=1 required> <label>OD</label>
                            <br>
                            <hr style="width: 40%;">
                            <label>Reason : </label>
                            <input type="text" name="reason" required><br>
                            <hr style="width: 40%;">
                            <label style="margin-right: 30.5%">Dates</label><br>
                            <label style="margin-right: 10px;">From </label>
                            <input type="date" name="frmdate" required><br><label style="margin-right: 0%;">No of days: </label>
                            <input type="number" name="todate" required><br>
                            <hr style="width: 40%;">
                            <label> Category : </label> 
                            <input type="text" name="cat"><br>
                            <hr>
                            <label id="namedisp">Name :<?php echo $_GET['N'];?></label><br><input type="hidden" name="name" id="y" value="<?php echo $_GET['N']; ?>">
                            <label id="rolldisp">Roll No. :<?php echo $_GET['R'];?> </label><br><input type="hidden" name="roll" id="z" value=" <?php echo $_GET[ 'R']; ?>">
                            <label id="loginiddisp">Login ID :<?php echo $_GET['UN'];?> </label><input type="hidden" name="usid" id="x" value="<?php echo $_GET['UN'];?>">
                            <br>
                            <input type="submit" value="Submit">
                        </fieldset>
                    </div>
                </form>

            </div>
            <div id="status">
                <?php
                    $username="root";
                    $password="";
                    $database="connect";
                    $UN=$_GET["UN"];
                    $mysqli = new mysqli("localhost", $username, $password, $database);
                    $query="SELECT * FROM leaveapp WHERE userid='$UN'";
                    $result=$mysqli->query($query);
                echo '<table id="enterec"><tr>
                        <th class="head"> INDEX</th>
                        <th class="head"> No. of Days</th>
                        <th class="head"> Status</th>
                    </tr>';
                while($row=$result->fetch_assoc()){
                    $i="waiting";
                    if((($row["supapp"] + $row["hodapp"])==2) or($row["supapp"]==0 and $row["hodapp"]==1) ){
                        $i="Approved";
                    }
                    if(($row["supapp"] + $row["hodapp"])>=3){
                        $i="Denied";
                    }
                    echo '<tr><td>'.$row["index1"].'</td><td>'.$row["count"].'</td><td>'.$i.'</td></tr>';
                }
                echo '</table>';
                ?>

            </div>
        </div>
        <script>
            function change1() {
                document.getElementById("Applyleave").style.display = "inline";
                document.getElementById("status").style.display = "none";
            }

            function change2() {
                document.getElementById("Applyleave").style.display = "none";
                document.getElementById("status").style.display = "inline";
            }

        </script>
    </div>


</body>

</html>
