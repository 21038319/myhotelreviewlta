<?php
session_start();
include "dbfunctions.php";

$thenewID = $_GET['hotelId'];

$query = "SELECT *
    
            FROM reviews 
            INNER JOIN hotels 
            ON reviews.hotelId = hotels.hotelId 
            
            INNER JOIN users 
            ON reviews.userId = users.userId
            WHERE hotels.hotelId = $thenewID";

$result = mysqli_query($link, $query);

$row = mysqli_fetch_array($result);

// close connection
mysqli_close($link);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type"content="text/html;charset=UTF-8">
        <link href="stylesheets/style.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <title></title>

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
        <form method="post" action="doAddReview.php">
            <h1>Add Review</h1>
            <table>
                <tr>
                    <td>
                        <label>
                            Username:<input type="text" name="username" value="<?php echo $_SESSION['username'] ?>" readonly/>
                        </label>
                    </td>
                </tr>

                <tr>
                    <td>

                        <label>        
                            Review:<textarea rows="5" cols="30" 
                                             name="comments">
                            </textarea> 

                        </label>
                    </td>
                </tr>

                <tr>
                    <td>

                        <label> Ratings:</label><select id="ratings" name="ratings">

                            <?php
                            for ($x = 1; $x <= 5; $x++) {
                                echo "<option value=$x>$x</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="hotelId" value="<?php echo $thenewID ?>"/>
                        <input type="hidden" name="hotelid" value="<?php echo $row['hotelId'] ?>"/>
                        <input id="Submit" type="submit" value="Submit" href="doAddReview.php"/>
                    </td>
                </tr>
            </table>
        </form>
        </div>
    </body>
</html>