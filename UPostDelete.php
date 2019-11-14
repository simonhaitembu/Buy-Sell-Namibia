<?php
if(isset($_GET['bid']))
{
$id=$_GET['bid'];


$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "bidding";


$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName); 

   $query="delete from product where ProductID='$id'";



    mysqli_query($conn,$query);
    header('Location:MyPost.php');
}
?>