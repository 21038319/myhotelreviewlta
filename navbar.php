<div id="menu">
    <ul>
        <li> <a href="hotellist.php">Home</a></li>

        <?php
        if (isset($_SESSION['userId'])) {
            ?>

            <li> <a href="logout.php">logout</a></li>
            <?php
        } else {
            ?>

            <li> <a href="login.php">login</a></li>
            <?php
        }
        ?>
    </ul>
</div>
<div id="floatright">
<?php
if (isset($_SESSION['userId'])) {
    echo "<i>Welcome " . $_SESSION['username'] . "</i>";
}
?>
</div>