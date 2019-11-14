
<?php
if(isset($_GET['Delete']))
{
     $name=$_GET['Delete'];



   $dbServername = "localhost";
   $dbUsername = "root";
   $dbPassword = "";
   $dbName = "bidding";


 $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName); 

   $query="delete from users where Username='$name'";



    mysqli_query($conn,$query);
    header('Location:ADeleteUser.php');
}
?>