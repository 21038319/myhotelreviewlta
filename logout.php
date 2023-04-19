<?php
session_start();
if (isset($_SESSION['userId'])) {
    session_destroy();
    $_SESSION = array();
}
$message = "You have logged out.";
?>
<!DOCTYPE html>
<html>
    <head>
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
    <h1>Log out</h1><br>
        <?php
        echo $message;
        ?><br>
        <br>
        <a href='login.php'><button>Back to login</button></a>
        </div>
    </body>
</html>