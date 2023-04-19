<?php
session_start();
include ("dbFunctions.php");

$hotelId = $_POST['id'];
$updatedDesc = $_POST['details'];
$updatedRating = $_POST['ratingedit'];
$hotel = $_POST['hotelid'];
$msg = "";

$queryUpdate = "UPDATE reviews
                SET review='$updatedDesc', rating='$updatedRating'
                WHERE reviewId = $hotelId";

$resultUpdate = mysqli_query($link, $queryUpdate)
        or die(mysqli_error($link));

if ($resultUpdate) {
    $msg .= "<b>Ratings:</b> " . $updatedRating . "<br/></br>";
    $msg .= "<b>Review:</b> " . $updatedDesc . "<br/></br>";
    $msg .= "record successfully updated";
} else {
    $msg = "record not updated";
}
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
        <div class="column " align="center" style="padding: 20px">
            <h1>Edit</h1>
            <?php
            echo $msg;
            ?><br><br>
            <a href="hotelreview.php?hotelId=<?php echo $hotel; ?>"><button>Back to reviewlist</button></a>
        </div>
    </body>
</html>
