<?php
session_start();
include "dbFunctions.php";

$thenewID = $_GET['hotelId'];

$name = $_SESSION['hotelName'];

$querySelect = "SELECT * FROM reviews 
        INNER JOIN hotels ON reviews.hotelId = hotels.hotelId
        INNER JOIN users ON reviews.userId = users.userId
        WHERE hotels.hotelId = $thenewID";

$resultSelect = mysqli_query($link, $querySelect) or die('Error querying databse');

// declare variable false
$checkempty = false;

// while row is selected, varible becomes true 
while ($rowSelect = mysqli_fetch_assoc($resultSelect)) {
    
    $checkempty = true;
    
    $arrResult[] = $rowSelect;
    $name = $rowSelect['hotelName'];
    
 
}

mysqli_close($link);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Hotel Review App</title>
        <link href="stylesheets/style_1.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <style>

            .table-striped{
                font-family: sans-serif;

            }

            thead {
                background-color: #5987aa;
                color: white;
            }

            div{
                font-family: sans-serif;

            }
            table, tr, td{
                border:1;
            }

            button{

                background-color: #3366ff;
                color: white;
                padding: 5px 20px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
        </style>

    </head>
    <body>
        <?php include "navbar.php" ?>
        <div class="container mt-3">
            <h3><?php echo $name ?></h3>

            <?php
            if (isset($_SESSION['username'])) {
                if ($_SESSION['username'] == $_SESSION['username']) {
                    ?>
                    <a href="addreview.php?hotelId=<?php echo $thenewID; ?>"><button>Insert a review</button></a>
                    <?php
                }
            }
            ?>
            <br><br>
            <table class="table table-striped" >
                <thead bgcolor="grey"> 
                    <tr >

                        <th>Review</th> 
                        <th>Rating</th>
                        <th>Date Posted</th>
                        <th>User</th>


                        <?php
                        if (isset($_SESSION['username'])) {
                            if ($_SESSION['username'] == $_SESSION['username']) {
                                ?>
                                <th>Edit</th>
                                <th>Delete</th>
                                <?php
                            }
                        }
                        ?>

                    </tr>
                </thead>

                <?php
                
                // if varible is true echo everything
                if ($checkempty) {
                for ($j = 0; $j < count($arrResult); $j++) {
                    $reviewid = $arrResult[$j]['reviewId'];
                    $review = $arrResult[$j]['review'];
                    $ratings = $arrResult[$j]['rating'];
                    $datePosted = $arrResult[$j]['datePosted'];
                    $hotelId = $arrResult[$j]['hotelId'];
                    $username = $arrResult[$j]['username'];
                    ?>

                    <tr>

                        <td><?php echo $review; ?></td>
                        <td><?php echo $ratings; ?></td>
                        <td><?php echo $datePosted; ?></td>
                        <td><?php echo $username; ?></td>

                        <td>
                            <?php
                            if (isset($_SESSION['username'])) {
                                if ($_SESSION['username'] == "$username") {
                                    ?>
                                    <form method="post" action="edit.php">
                                        <input type="hidden" name="reviewId" value="<?php echo $reviewid; ?>"/>
                                        <input type="submit" value="Edit"/>
                                    </form>
                                    <?php
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($_SESSION['username'] == "$username") {
                                    ?>
                                    <form method="post" action="delete.php">
                                        <input type="hidden" name="deleteId" value="<?php echo $reviewid; ?>"/>
                                        <input type="submit" value="Delete"/>
                                    </form>
                                    <?php
                                }
                                ?>
                            </td>
                        </tr>
                        
                        <?php
                    }
                }
                
                }
                
                //check for review
                else 
                {
                    
                    echo "No existing review" ."<br>"."<br>";
                    
                }
                ?>
                        
            </table>
        </div>
    </body>
</html>