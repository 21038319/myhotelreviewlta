<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
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

            td
            {
                padding:5px
            }
            div{
                font-family: sans-serif;

            }

            form{
                font-family: sans-serif;
            }
        </style>
    </head>
    <body>

        <?php include "navbar.php" ?>
        <br>
<div class="column " align="center">
        <form name="frmRegister" method="post" action="doregister.php">

            <h1>Register</h1>

            <table>
                <tr>
                    <td>
                        <label>
                            Username :

                        </label>
                    </td>
                </tr>
                <tr>
                    <td>

                        <input name="regusername" type="text" required placeholder="Enter Username" >
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>
                            Password :
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input name="regpassword" type="password" required placeholder="Enter Password">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>
                            Name :
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input name="regname" type="text" required placeholder="Enter Name" >
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>
                            Address :
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input name="regaddress" type="text" required placeholder="Enter Address">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>
                            Email :
                        </label>
                    </td>
                </tr>

                <tr>
                    <td>
                        <input name="regemail" type="text" required placeholder="Enter Email">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Submit" >

                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="login.php">Login</a>
                    </td>
                </tr>
            </table>
        </form> 
        </div>
    </body>
</html>
