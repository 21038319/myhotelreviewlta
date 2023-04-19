<?php
session_start();
$msg = "";
include "dbFunctions.php";

$hotel = $_POST['hotelid'];

$query = "SELECT * FROM hotels";
$result = mysqli_query($link, $query) or die(mysqlli_error($link));
while ($row = mysqli_fetch_array($result)) {
    $arrContent[] = $row;
}



if (isset($_SESSION['userId'])) {
    $msg = "<br>you are already logged in.";
} else {

    $entered_username = $_POST['logusername'];
    $entered_password = $_POST['logpassword'];


    $query = "SELECT * FROM users 
                  WHERE username='$entered_username' AND 
                  password = SHA1('$entered_password') ";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));


    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $_SESSION['userId'] = $row['userId'];
        $_SESSION['username'] = $row['username'];
        $msg = "<br>Login Successful";
        header("location: hotellist.php");
        

        if (isset($_POST['checkbox'])) {
            setcookie('logusername', $entered_username, time() + 60 * 60 * 24 * 365 * 300);
        } else {
            setcookie("logusername", "");
        }
    } else {
        $msg = "<br>you must enter a valid username 
                    and password to log in";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
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

        <?php include "navbar.php" ?><br>



        <div class="column " align="center" >
            <h1>Logged In</h1>
            <?php echo $msg ?><br><br>

            <a href='hotellist.php'><button>View Hotels</button></a>


        </div>

    </body>
</html>