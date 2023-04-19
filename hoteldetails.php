<?php
session_start();
include "dbFunctions.php";

$theID = $_GET['hotelId'];

$query = "SELECT * FROM hotels WHERE hotelId= $theID";
$result = mysqli_query($link, $query) or die(mysqlli_error($link));
$row = mysqli_fetch_array($result);

if (!empty($row)) {

    $hotelName = $row['hotelName'];

    // session to retrieve specific hoteId
    $_SESSION['hotelName'] = $row['hotelName'];

    $hotelAddress = $row['hotelAddress'];
    $picture = $row['picture'];
    $contactNo = $row['contactNo'];
    $description = $row['description'];
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">


        <link href="stylesheets/style.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <title></title>

        <style>

            button{

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

            form{

                border: 1px solid rgba(0, 0, 0, .1);
                width:700px;
                font-family: sans-serif;
            }
            
                        .carousel-control-prev-icon,
            .carousel-control-next-icon {
                height: 100px;
                width: 100px;
                outline: black;
                background-size: 100%, 100%;
                filter: invert(100%);
               
            }

            /*            a:link {
                            width: 100%;
                            background-color: #3366ff;
                            color: white;
                            padding: 14px 20px;
                            margin: 8px 0;
                            border: none;
                            border-radius: 4px;
                            cursor: pointer;
                            text-decoration: none;
                        }
            
                        a:visited {
                            width: 100%;
                            background-color: #3366ff;
                            color: white;
                            padding: 14px 20px;
                            margin: 8px 0;
                            border: none;
                            border-radius: 4px;
                            cursor: pointer;
                            text-decoration: none;
            
            
                        }*/

        </style>
    </head>
    <body>
        <?php include "navbar.php" ?>
        <div class="column " align="center">

            <br>
            <form name="frmRegister" method="post" action="hotelreview.php?hotelId=<?php echo $theID; ?>" style="padding: 20px">
                
                
                
                
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>

                </ol>

                <div class="carousel-inner">
                    <div class="item active">
                        <img class="d-block w-100" src="images/<?php echo$picture; ?> ">
                    </div>

                    <div class="item">
                        <img class="d-block w-100" src="images/<?php echo$picture; ?> ">
                    </div>


                </div>      


                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
                


                <h1><?php echo $hotelName ?></h1>
                <p>
                    <?php echo $hotelAddress ?><br>
                    <?php echo $contactNo ?><br></p>

<!--                <img class="card-img-top"src="images/<?php echo$picture; ?>" height=300" /><br>-->

                <br>
                <div class="desc" style="width:600px">
                    <?php echo $description ?><br>
                </div>
                <br>


                <a href="hotellist.php">Back to Hotel List</a>

                <input type="submit" value="view reviews" >


            </form>
        </div>
    </body>
</html>
