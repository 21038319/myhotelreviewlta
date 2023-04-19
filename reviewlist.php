<?php
include "dbFunctions.php";

$thenewID = $_GET['hotelId'];

$querySelect = "SELECT reviewId, reviews.hotelId, userId, 
                 review, hotels.hotelName, hotels.hotelId
                 
                 FROM reviews
                 
                 INNER JOIN hotels
                 ON reviews.hotelId = hotels.hotelId
                 WHERE r.hotelId = $thenewID";

$resultSelect = mysqli_query($link, $querySelect) or die('Error querying databse');

while ($rowSelect = mysqli_fetch_assoc($resultSelect)) {
    $arrResult[] = $rowSelect;
}

mysqli_close($link);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta http-equiv="Content-Type"content="text/html;charset=UTF-8">
        <style>
            td 
            {
                padding:5px
            }
        </style>
    </head>
    <body>

        <H3>Hotel Review | <a href="index.php">Home</a></H3>
        <hr>

        <table border="1">
            
                <tr>
                    <td>reviewId:</td>
                    <td>hotelId:</td>
                    <td>hotelName:</td>
                    
                    <td>review:</td>
                </tr>
            
            <?php
            for ($j = 0; $j < count($arrResult); $j++) {
                ?>
                <tr>
                    <td><?php echo$arrResult[$j]['reviewId']; ?></td>
                    <td><?php echo$arrResult[$j]['hotelId']; ?></td>
                    <td><?php echo$arrResult[$j]['hotelName']; ?></td>
                    
                    <td><?php echo$arrResult[$j]['review']; ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
