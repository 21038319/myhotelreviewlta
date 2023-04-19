<?php
session_start();
//$host = "localhost";
//$username = "root";
//$password = "";
//$db = "c203_hotelreviewdb";
//$link = mysqli_connect($host, $username, $password, $db);

include "dbFunctions.php";

$querySelect = "SELECT * FROM hotels";
$resultSelect = mysqli_query($link, $querySelect) or die('Error querying databse');

while ($rowSelect = mysqli_fetch_assoc($resultSelect)) {
    $arrContent[] = $rowSelect;
}

mysqli_close($link);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta http-equiv="Content-Type"content="text/html;charset=UTF-8">

        <link href="stylesheets/style.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <style>

            button {

                /*                border: none;
                                color: white;
                                padding: 5px 5px;
                                text-align: center;
                                background-color: #008CBA;
                                font-size: 16px;
                                border-radius: 4px;*/
                width: 100%;
                background-color: #3366ff;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            div{
                font-family: sans-serif;

            }

        </style>
    </head>
    <body>


        <?php include "navbar.php" ?>
        <div class="container-fluid">
            <div class="row">


                <?php
                for ($j = 0; $j < count($arrContent); $j++) {
                    $hotelId = $arrContent[$j]['hotelId'];
                    $image = $arrContent[$j]['picture'];
                    $name = $arrContent[$j]['hotelName'];
                    $hotelAddress = $arrContent[$j]['hotelAddress'];
                    ?>

                    <div class="col-6 " style="padding: 20px">
                        <div class="card" >
                            <img class="card-img-top"src="images/<?php echo$image; ?>" class="d-block w-100"   height="500"/>
                            <div class="card-body" align="center">

                                <b><a href="hoteldetails.php?hotelId=<?php echo $hotelId; ?>" > <button><h5><?php echo $name; ?></h5></button></a>  </b><br><br> 
                                <h4>
                                    <?php echo$hotelAddress; ?>
                                </h4>
                            </div>
                        </div>
                    </div>

                    <?php
                }
                ?>
            </div>
        </div>
    </body>
</html>
