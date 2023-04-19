<?php
session_start();
// include a php file that contains the common database connection codes
include ("dbFunctions.php");

$queryItem = "SELECT * FROM reviews";

$resultItem = mysqli_query($link, $queryItem) or
        die(mysqli_error($link));

$rowItem = mysqli_fetch_array($resultItem);
?>

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

            td
            {
                padding:5px
            }
            div{
                font-family: sans-serif;

            }

            form{
                font-family: sans-serif;
            }
        </style>
    </head>
    <body>
        <?php include "navbar.php" ?>

        <br>
        <div class="column " align="center">

            <h1>Login</h1>
            <form name="frmRegister" method="post" action="dologin.php">



                <table>
                    <tr>
                        <td>
                            <label for="ticketno">
                                Username :
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>

                            <input name="logusername" type="text" required placeholder="Enter Username" value="<?php
                            if (isset($_COOKIE["logusername"])) {
                                echo $_COOKIE["logusername"];
                            }
                            ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="ticketno">
                                Password :
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input name="logpassword" type="password" required placeholder="Enter Password" value="<?php
                            if (isset($_COOKIE["logpassword"])) {
                                echo $_COOKIE["logpassword"];
                            }
                            ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="checkbox">
                            <label for="remember"> Remember Me</label><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" value="Submit" name="login">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="hotelid" value="<?php echo $rowItem['hotelId'] ?>"/>
                            <a href="register.php">Register</a>

                        </td>
                    </tr>
                </table>
            </form>
        </div>
        
    </body>
</html>
