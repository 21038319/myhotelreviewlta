<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta http-equiv="Content-Type"content="text/html;charset=UTF-8">
        <link href="stylesheets/style.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            .column{
                margin: auto;
                width:700px;
                border: 1px solid rgba(0, 0, 0, .1);
                font-family: sans-serif;

            }
            button{
                width: 30%;
                padding: 8px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                background-color: #3366ff;
                color:white;
                text-decoration: none; 
            }

            body{
                font-family: sans-serif;
            }
        </style>
    </head>
    <body>

        <?php include "navbar.php" ?>
        <br>
        <div class="column " align="center" >
            <form name="frmRegister" method="post" >



                <?php
                $myusername = $_POST["regusername"];
                $mypassword = $_POST["regpassword"];
                $myname = $_POST["regname"];
                $myaddress = $_POST["regaddress"];
                $myemail = $_POST["regemail"];

                $message = "";
                include "dbFunctions.php";
// build sql query
                $query = "INSERT INTO users(username,password,name, address, email)
       VALUES('$myusername','$mypassword','$myname','$myaddress', '$myemail'  )";
// execute sql query
                $result = mysqli_query($link, $query)or die('Error querying database');
// process the result
                if ($result) {
                    header("location: login.php");
                    $message = "registered successfully";
                } else {
                    $message = "registered failed";
                }
// close connection
                mysqli_close($link);
                ?>                        
                <h1>Registered</h1>
                <br>
                <?php echo$message; ?> <br><br>




            </form> 
            <a href="login.php"><button>login</button></a>
        </div>
    </body>
</html>
