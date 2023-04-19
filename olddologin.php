
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

        <form name="frmRegister" method="post" action="dologin.php">



            <table>

            </table>
        </form>

        <?php
        $uname = $_POST['logusername'];
        $upassword = $_POST['logpassword'];

        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "c203_hotelreviewdb";

// open connection
        $link = mysqli_connect($host, $username, $password, $database);

// build sql query
        $query = "select * from users where username='$uname'AND password= '$upassword'";

// execute sql query
        $result = mysqli_query($link, $query);


        $row = mysqli_num_rows($result);

// process the result
        if (isset($_POST['logusername'])) {

            $uname = $_POST['logusername'];
            $password = $_POST['logpassword'];

            if ($row) {
                if (isset($_POST['checkbox'])) {
                    setcookie('logusername', $uname, time() + 86400);
                    setcookie('logpassword', $upassword, time() + 86400);
                } else {
                    setcookie('logusername', '');
                    setcookie('logpassword', '');
                }
                echo " Welcome $uname you Have Successfully Logged in";
                echo nl2br(" \n\n Username: $uname ");
                echo nl2br(" \n\n Password: $upassword "); ?>
                
                <p><a href="login.php"> Go Page </a> </p>
              <?php  
            } else {
                echo " You Have Entered Incorrect details";
            }
        }



// close connection
        mysqli_close($link);
        ?>

        <p><a href="login.php"> Go to Login Page </a> </p>

    <hr>        
</body>
</html>