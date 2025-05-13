<?php
session_start();

if(isset($_SESSION['username'])) {
    echo "Welcome, ".$_SESSION['username']."!<br>";
    echo "<a href='edit_profile.php'>Edit Profile</a><br>";
    echo "<a href='delete_profile.php'>Delete Profile</a><br>";
    echo "<a href='logout.php'>Logout</a>";
} else {
    echo "Please login first.";
}
?>
