<?php
session_start();
include ("dbFunctions.php");

$theID = $_POST['deleteId'];
$hotel = $_POST['hotelid'];

//echo $theID;
//build a query to delete a specific record based on id
$queryDelte = "DELETE FROM reviews WHERE reviewId=$theID";
$status = mysqli_query($link, $queryDelte)or die('Error querying database');

//if statement to check whether the delete is successful
if ($status) {
    $message = "Item has been deleted";
} else {
    $message = "Item not deleted";
}


mysqli_close($link);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
            <h1>Delete</h1>
            <?php
            echo $message;
            ?><br><br>
            <a href="hotelreview.php?hotelId=<?php echo $hotel; ?>"><button>Back to reviewlist</button></a>
        </div>
    </body>
</html>
