<?php
session_start();
include ("dbFunctions.php");

$hotelId = $_POST['deleteId'];

//echo $hotelId;
// create query to retrieve a single record based on the value of $compID 
$queryItem = "SELECT reviews.reviewId, reviews.hotelId, reviews.userId, 
                 reviews.review, hotels.hotelName, hotels.hotelId
                 
                 FROM reviews
                 
                 INNER JOIN hotels
                 ON reviews.hotelId = hotels.hotelId
                 
                 WHERE reviews.reviewId=$hotelId";

$resultItem = mysqli_query($link, $queryItem) or
        die(mysqli_error($link));


$rowItem = mysqli_fetch_array($resultItem);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="stylesheets/style.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <style>

            form{

                border: 1px solid rgba(0, 0, 0, .1);
                width:700px;
                font-family: sans-serif;
            }

            div{
                font-family: sans-serif;

            }
            

        </style>
    </head>
    <body>
        <?php include "navbar.php" ?>
        <div class="column " align="center">

            <form method="post" action="doDelete.php" style="padding: 20px">
                <h1>Delete Review</h1>
                <label>Hotel:</label>
                <?php echo $rowItem['hotelName'] ?>
                <br/><br/>

                <label>Rating:</label>
                <?php echo $rowItem['userId'] ?>
                <br/><br/>

                <label>description:</label>
                <?php echo $rowItem['review'] ?>
                <br>

                <input type="hidden" name="deleteId" value="<?php echo $rowItem['reviewId'] ?>"/><br>
                <input type="hidden" name="hotelid" value="<?php echo $rowItem['hotelId'] ?>"/>
                
                <input type="submit" value="Delete Item"/>
            </form>
        </div>
    </body>
</html>
