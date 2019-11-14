

<?php
//Connecting and selecting a database//

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "bidding";


$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName); 


     $query = "SELECT * FROM Product WHERE ProductStatus = 'No' ";

     $result=mysqli_query($conn,$query);

	while ($row=mysqli_fetch_array($result))
	{
		$datenow = date("Y-m-d");
        
		$duedate = $row['EndDate'];
			
		$prodid = $row['ProductID'];
		if($datenow >= $duedate){


           $buyer=$row['Buyer'];


			if($buyer=="Null")
			{
				$seller=$row['Username'];
				 $ProductName=$row['ProductName'];

				 $message="Sorry Mr.".$seller.", Your Product ".$ProductName." Remain Unsold  No one bid your product";
                 $query1="insert into Notification values('$seller','$message','No')";
                  mysqli_query($conn,$query1);

			}
            else
            {

			$qry="UPDATE Product SET ProductStatus = 'Yes' WHERE ProductID = '$prodid'";
			mysqli_query($conn,$qry);

			$seller=$row['Username'];
			$buyer=$row['Buyer'];
            $ProductName=$row['ProductName'];

			$qry1="select * from users where Username='$seller'";
			$result1=mysqli_query($conn,$qry1);
	        $row1=mysqli_fetch_array($result1);
	        $sname=$row1['Name'];
	        $semail=$row1['Email'];
	        $sphone=$row1['Phone'];

	        $qry2="select * from users where Username='$buyer'";
			$result2=mysqli_query($conn,$qry2);
	        $row2=mysqli_fetch_array($result2);
	        $bname=$row2['Name'];
	        $bemail=$row2['Email'];
	        $bphone=$row2['Phone'];
            
            $message="Congratulation Mr.".$sname.", Your Product ".$ProductName." has been sold and Buyer is ".$bname." You can contact with Buyer by Email:".$bemail." or You can use phone:".$bphone.".";
            $query1="insert into Notification values('$seller','$message','No')";
            mysqli_query($conn,$query1);

            $message="Congratulation Mr.".$bname.", Your are the final and highest bidder of  Product ".$ProductName.". Now This is Your Product. Product Seller is ".$sname.", You can contact with Seller by Email:".$semail." or You can use phone: ".$sphone.".";
            $query2="insert into Notification values('$buyer','$message','No')";
            mysqli_query($conn,$query2);
           }



		}
	}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Buy&Sell Namibia</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="CSS/Home.css">
<link rel="stylesheet" type="text/css" href="CSS/Footerr.css">
  <style>

 body {
  
font-family: Agency FB;
background-color: #E5E9ED;
}
 {
  margin-top: 60px;
  font-size: 14px;
  font-family:Arial, Helvetica, sans-serif;
  background-color: #E5E9ED;
  color: #787677;


</style>

<script type="text/javascript">

function bid(id)
{
  if(confirm('Sure Participate?'))
  {
    alert('You Are Not Sign in, Please Sign In For Bid');
    window.location='BidProduct.php?bid='+id
  }
}
</script>


</head>
<body>


<div>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Buy&Sell Namibia</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="Home.php"><b>&nbsp&nbsp&nbsp&nbspHome</b></a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><b>&nbsp&nbspProducts</b><span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="Electronics.php"><b>Electronics</b></a></li>
          <li><a href="Fashion & Sports.php"><b>Fashion & Sports</b></a></li>
          <li><a href="Home & Garden.php"><b>Home & Garden</b></a></li>
          <li><a href="Automotive.php"><b>Automotive</b></a></li>
          <li><a href="Health & Beauty.php"><b>Health & Beauty</b></a></li>
          <li><a href="Others.php"><b>Others</b></a></li>
        </ul>
         
      </li>
      

      <form class="navbar-form navbar-left" action="Search.php" method="POST">
      <div class="input-group">
        <input type="text" class="form-control" name="search" placeholder="Search" size="40">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
    </ul>
	
	
   <ul class="nav navbar-nav navbar-right">
   <li><a href="About Project.php"><b>About site</b></a></li>
      <li><a href="Contact Us.php"><b>Contact Us</b></a></li>
       <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><b>Login</b><span class="caret"></span></a>
        <ul class="dropdown-menu">
         <li><a href="UserLogin.php"><b>User Login</b></a></li>
          <li><a href="AdminLogin.php"><b>Admin Login</b></a></li>
        </ul>
      </li>
      <li><a href="Registration.php"><span class="glyphicon glyphicon-user"></span> <b>Sign Up</b></a></li>
     
    </ul>


  </div>

</nav>

</div>
<div class="wrapper">
        <div class="page-header clear-filter" filter-color="orange">
            <div class="page-header-image" data-parallax="true" style="background-image: url('Background/teal.png');">
            
                <div class="container">
                    <div class="content-center brand">
                        <img src="Background/pull.png" alt="Circle Image" class="rounded-circle">
                      
                    </div>
                </div>
            </div>
        </div>
  
        <center>
        <div class="main" style="background-color: #E5E9ED">
            <div class="section section-basic">
                <div class="container">
                    <br>
                    <div class="col-md-12">
                        <h2 class="title">Products</h2>
                        <div class="typography-line">
                            <p>
                            Buy&Sell Namibia enables individuals to shop day in and day out, and furthermore compensate us with a 'no pollution' shopping experience. 
                            </p>
                        </div>
                        <br>

                        
                        <center>
                        <label><b>Search Product: &nbsp</b></label>       
                                <form class="navbar-form navbar-center"action="Search.php" method="POST">
                                 <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search" size="20">
                               <div class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                 <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                   </div>
                                  </div>
                                </form>
                        </center>
                    </div>
                    <br><hr color="orange">

  <div class="tab-pane  active" id="">
    <ul class="thumbnails">
</center>
<?php
if (isset($_GET['message'])) {
    print '<script type="text/javascript">alert("' . $_GET['message'] . '");</script>';
}

if (isset($_GET['loginmessage'])) {
    print '<script type="text/javascript">alert("' . $_GET['loginmessage'] . '");</script>';
}


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

  echo "<script> alert('name'); </script>";
}

?>

<div class="bodysection templete clear" style="background-color: #E5E9ED">

<div class="mainsection templete clear" style="background-color: #E5E9ED">

<form action="" method="POST">

<table>


<?php
   
//Connecting and selecting a database//

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "bidding";


$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName); 

    $query="select * from product where ProductStatus='No'";
    $Result=mysqli_query($conn,$query);
    $break=0;


    while ($row=mysqli_fetch_array($Result)) {

      if($break==2){
        echo "<tr>";
        $break=0;
      }
   
   $datenow = date("Y-m-d");
        
  $sdate = $row['StartDate'];
  if($sdate<=$datenow){
?>

<?php


  $query="select * from product where ProductStatus='No'";
  $Result=mysqli_query($conn,$query);

?>

<div class="container">
  <?php while ($row = mysqli_fetch_assoc($Result)) { ?>
    <div class="card-container">
        <div class="card">
            <div class="front">
                <div class="cover">
          <img src= <?php echo $row['Image']?> width=286px height=165px >
        </div>
        <div class="content">
                    <div class="main">
                        <h3 class="name"><?php echo $row['ProductName'] ?></h3>
                       
                        <div class="first float_left">
                          <span class="icon_mileage"></span><?php echo $row['CatagoryName'] ?>
                        </div>
                        <div class="first">
                          <span class="icon_power"></span><?php echo $row['Description'] ?>
                        </div>
                       
                    </div>
                    <div class="price">
                      N$<?php echo $row['Price'] ?>
                    </div> 

                </div>
            </div> <!-- end front panel -->
            <div class="back">
                
                <p>
                  <label class="title">ProductName</label>
                  <span class="value"><?php echo stripcslashes($row['ProductName']) ?></span>
                </p>
                 <p>
                  <label class="title">CatagoryName</label>
                  <span class="value"><?php echo stripcslashes($row['CatagoryName']) ?></span>
                </p>
                <p>
                  <label class="title">Username</label>
                  <span class="value"><?php echo stripcslashes($row['Username']) ?></span>
                </p>
                <p>
                  <label class="title">Price</label>
                  <span class="value"><?php echo stripcslashes($row['Price']) ?> hp</span>
                </p>
                <p>
                  <label class="title">ProductStatus</label>
                  <span class="value"><?php echo stripcslashes($row['ProductStatus']) ?></span>
                </p>
                
                <p>
                  <label class="title">StartDate</label>
                  <span class="value"><?php echo stripcslashes($row['StartDate']) ?></span>
                </p>
                <p>
                  <label class="title">EndDate</label>
                  <span class="value"><?php echo stripcslashes($row['EndDate']) ?></span>
                </p>
                <p>
                  <label class="title">Description</label>
                  <span class="value" algin="center"><?php echo stripcslashes($row['Description']) ?></span>
                </p>

                <p>
                  <label class="title">Buy Product</label>
                  <span class="value"> <a href="javascript:bid(<?php echo $row[0]; ?>)"> <img src="Image/bidnow.png"  width="50px" height="50px"  alt="Bid" /> <span style="color: green;font-size: 20px"><b>Bid Now</b></span> </a></span>
                </p>
                
                
            </div> <!-- end back panel -->
        </div> <!-- end card -->

    </div> <!-- end card-container -->

  <?php } ?>


</div>


<a href="javascript:bid(<?php echo $row[0]; ?>)"> <img src="Image/bidnow.png"  width="50px" height="50px"  alt="Bid" /> <span style="color: green;font-size: 20px"><b>Bid Now</b></span> </a></span>
<?php 
      $break++;
      echo "<hr>";

echo'</td>';

    }
}
?>

 
</table>
</div>

<div class="sidebar clear"  style="background-color: white">

    <div class="Semisidebar clear"  style="background-color: white">


      <h2>Sold Product Here</h2>

     <?php


    $query="select * from product where ProductStatus='Yes'";
    $Result=mysqli_query($conn,$query);
    $break=0;

    while ($row=mysqli_fetch_array($Result)) {

      if($break==1){
        echo "<tr>";
        $break=0;
      }

    echo'<td>';
    echo"<img src='".$row['Image']."' width='285px' height='220px'><br>";
    echo'</td>';

    echo'<td>';
     
    echo "<h4>";
    echo "<b>";
    echo $row['ProductName'];
    echo "</b>";
    echo "</h4>";
    
    echo $row['Description'];

    echo "<br>";
    echo "<b>";

  
    echo "Sold Price: ";
    echo $row['Price'];
    echo "</b>";


    echo "<br>";
                ?>
     <a href="#"> <img src="Image/sold.png"  width="285px" height="100px"  alt="Bid" /> </a>
<?php 

      $break++;
      echo'</td>';
    echo "<hr>";

    }
  
?>


   </div>
   

 </div>


</form>

</body>
  
</html>
<footer>

        <div class="clear"></div>
      </div>
      <div class="copy-right-grids">
        <div class="copy-left">
            <p class="footer-gd">© 2016 Simple Footer Widget. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">W3layouts</a></p>
        </div>
        <div class="copy-right">
          <ul>
            <li><a href="#">Company Information</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms & Conditions</a></li>
          </ul>
        </div>
        <div class="clear"></div>
      </div>
</footer>
