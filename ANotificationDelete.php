<?php
if(isset($_GET['del']))
{
$email=$_GET['del'];



   $dbServername = "localhost";
   $dbUsername = "root";
   $dbPassword = "";
   $dbName = "bidding";


   $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName); 

   $query="delete from ANotification where Email='$email'";



    mysqli_query($conn,$query);
    header('Location:ANotification.php');
}
?>