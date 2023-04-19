<?php
session_start();
include "dbFunctions.php";

$hotelID = $_POST['hotelId'];
$review = $_POST['comments'];
$Ratings = $_POST['ratings'];
$userId = $_SESSION['userId'];
$date = date("y/m/d");
$hotel = $_POST['hotelId'];
$message = "";

$query = "INSERT INTO reviews(hotelId, review, rating, userId,datePosted, reviewId)
             VALUES ('$hotelID', '$review', '$Ratings', '$userId','$date','')";

$status = mysqli_query($link, $query) or die(mysql_error($link));

if ($status) {
    $message .= "<b>Review:</b> " . $review . "<br/><br/>";
    $message .= "<b>Ratings:</b> " . $Ratings . "<br/<br/><br/>";
    $message .= "<b>Date:</b> " . $date . "<br/>";
    $message .= "<br>Review added Successfully<br>";
} else {
    $message = "Review add Failed";
}

mysqli_close($link);
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
                width: 100%;
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
        <div class="column " align="center"  style="padding: 20px">
            <h1>Add Review</h1>
            <?php
            echo $message;
            ?><br>
            <a href="hotelreview.php?hotelId=<?php echo $hotel; ?>"><button>Back to reviewlist</button></a>
        </div>
    </body>
</html>