<html>

<head>
    <title>Admin Portal</title>
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
            background: white;
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

        input[type=email],
        input[type=password] {
            width: 50%;

        }

        .enterec {
            font-size: 20px;
            margin: 0 auto;
            margin-left: 20%;
            color: #2b2b2b;
        }

        tr,
        .head {
            border-bottom: lightgray 1px solid;
            padding: 0 20px;
            text-align: center;
        }
        #report{
            display:none;
        }

    </style>

</head>

<body>
    <nav class="navbar navbar-default container-fluid" style="width: 100%;">
        <div class="container-fluid" style="width: 100%;">
            <div class="navbar-header">
                <a href="index.html"><img src="logo.png" class="navbar-brand logo"></a>
                <p class="navbar-brand title " style="color: aliceblue; font-weight: bold;">Connect - Admin Portal</p>
            </div>
        </div>
    </nav>


    <div class="body1 container" style="padding-top: 100px;">

        <div style="text-align: center; margin-top: 80px;">
            <div class="container col-md-4 " id="rec">
                <button onclick="change1()"> Report</button>

                <table class="enterec">
                    <tr>
                        <th class="head">Index</th>
                        <th class="head">Roll No.</th>
                        <th class="head">Name</th>
                        <th class="head">Reason</th>
                        <th class="head">Category</th>
                        <th class="head">OD/Leave</th>
                        <th class="head">From Date</th>
                        <th class="head">No. Of Days</th>
                        <th class="head">Approve</th>
                        <th class="head">Deny</th>
                        <?php
                         error_reporting(0);
                    $username="root";
                    $password="";
                    $database="connect";
                    $UN=$_GET["UN"];
                    $mysqli = new mysqli("localhost", $username, $password, $database);
                    $query1="SELECT * FROM user WHERE email='$UN'";
                    $result = $mysqli->query($query1);
                    $row=$result->fetch_assoc();
                    $m=$row["dept"];
                        $Q="select * from Leaveapp where (category='URGENT' and hodapp=0) or ( supapp=1 and hodapp=0);";
                    $r=$mysqli->query($Q);
                    while($ro=$r->fetch_assoc()){
                        
                         echo '<tr><td>'.$ro["index1"].'</td><td>'.$ro["roll_no"].'</td><td>'.$ro["name"].'</td><td>'.$ro["reason"].'</td><td>'.$ro["category"].'</td><td>'.$ro["Leavecat"].'</td><td>'.$ro["date"].'</td><td>'.$ro["count"].'</td><td>'.'<form action="approve2.php" method="GET"><input type="hidden" name=b value='.$ro["index1"].'><input type="submit" value="Approve"></form>'.'</td><td>'.'<form action="deny2.php" method="GET"><input type="hidden"  name=a value='.$ro["index1"].'><input type="submit" value="Deny"></form>'.'</td></tr>';
                    }
                    
                ?>
                    </tr>
                </table>
                
                <div class=" container" id="report">
                    <h1 style='margin-right:30%;'>Report</h1>
                    <div style="text-align:center;">
                        <?php
                 $username="root";
                 $password="";
                $database="connect";
                 $MM = new mysqli("localhost", $username, $password, $database);
                    $Q1="SELECT sum(total) as classtotal ,total/subjectno as classaverage FROM permon;";
                        $res=$MM->query($Q1);
                    while($ROO=$res->fetch_assoc()){
                        echo"<h3 style='margin-right:30%;'>The batch total is".$ROO['classtotal']."</h3><br>";
                        echo"<h4 style='margin-right:30%;'>The batch average is".$ROO['classaverage']."</h4><br>";
                    }
                        echo"<table class='enterec' ><tr><th>Name</th><th>Subjectaverage</th></tr>";
                        $Q2="SELECT name ,total/subjectno as studeavg FROM permon;";
                        $re2=$MM->query($Q2);
                        while($RO2=$re2->fetch_assoc()){
                        echo"<tr><td>".$RO2['name']."</td><td>".$RO2['studeavg']."</td></tr>";
                    }
                        echo"</table>";
                        
             ?>
                        <script>
                        function change1() {
                document.getElementById("report").style.display = "table";
            }
                        
                        </script>
                    </div>
                </div>
                
                
            </div>

        </div>
    </div>

</body>

</html>
