<?php 
// connect to database
$conn = mysqli_connect("localhost","abdo", "abdo380", "ninja pizza");

// check the connection
if(!$conn){
    echo "connection error:" . mysqli_connect_error();
}
?>

<!DOCTYPE html>
<html lang="en">

 <?php include("header.php"); ?>

 <?php include("footer.php"); ?>

</html>
