
<?php 


 session_start();

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
<link rel="stylesheet" type="text/css" href="CSS/Bidding.css">
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
}
.container{
  max-width: 980px;
  margin: auto;
}
/* entire container, keeps perspective */
.card-container {
    -webkit-perspective: 800px;
   -moz-perspective: 800px;
     -o-perspective: 800px;
        perspective: 800px;
        margin-bottom: 30px;
}
/* flip the pane when hovered */
.card-container:hover .card, .card-container.hover .card {
  -webkit-transform: rotateY( 180deg );
-moz-transform: rotateY( 180deg );
 -o-transform: rotateY( 180deg );
    transform: rotateY( 180deg );
}

.card-container.static:hover .card, .card-container.static.hover .card {
  -webkit-transform: none;
-moz-transform: none;
 -o-transform: none;
    transform: none;
}
/* flip speed goes here */
.card {
   -webkit-transition: -webkit-transform .5s;
   -moz-transition: -moz-transform .5s;
     -o-transition: -o-transform .5s;
        transition: transform .5s;
-webkit-transform-style: preserve-3d;
   -moz-transform-style: preserve-3d;
     -o-transform-style: preserve-3d;
        transform-style: preserve-3d;
  position: relative;
}

/* hide back of pane during swap */
.front, .back {
  -webkit-backface-visibility: hidden;
   -moz-backface-visibility: hidden;
     -o-backface-visibility: hidden;
        backface-visibility: hidden;
  position: absolute;
  top: 0;
  left: 0;
  background-color: #FFF;
    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.14);
}

/* front pane, placed above back */
.front {
  z-index: 2;
}

/* back, initially hidden pane */
.back {
    -webkit-transform: rotateY( 180deg );
   -moz-transform: rotateY( 180deg );
     -o-transform: rotateY( 180deg );
        transform: rotateY( 180deg );
        z-index: 3;
}

/*        Style       */


.card{
    background: none repeat scroll 0 0 #FFFFFF;
    border-radius: 6px;
    color: #444444;

}

.card .cover {
    border-radius: 6px 6px 0 0;
    height: 165px;
    overflow: hidden;
}

.card-container, .front, .back {
  width: 100%;
  height: 345px;
  border-radius: 6px;

}

.card-container{
  width: 284px;
  height: 345px;
  float: left;
  margin-right: 25px;
}

.card .content{
    background-color: rgba(0, 0, 0, 0);
    box-shadow: none;
}
.card .content .main {
    height: 120px;
    border-bottom: solid 1px #CCCCCC;
}
.card .name {
    font-size: 24px;
    line-height: 28px;
    margin: 15px 0 0;
    text-align: center;
    text-transform: capitalize;
    color: #333333;
}

.card .first{
  display: block;
    overflow: hidden;
    padding-top: 15px;
    padding-left: 20px;
    width: 122px;
}

.card .second{
  display: block;
    overflow: hidden;
    width: 122px;
    padding-left: 20px;
}

.card .float_left{
  float: left;
}
.card .price{
  color: #389992;
  font-weight: bold;
  font-size: 22px;
  text-align: center;
  padding-top: 10px;
}

.card .title{
  display: block;
  float: left;
  padding: 0px 0 0 20px;
  width: 150px;
}

.card .value{
  display: block;
  float: right;
  padding: 0px 20px 0 0px;
  color: #000000;
  font-weight: bold;
}
.card p{
  line-height: 25px;
} 





</style>

<script type="text/javascript">

function bid(id)
{
  if(confirm('Sure Participate ?'))
  {
    window.location='UserBid.php?bid='+id
  }
}
</script>


</head>
<body>



<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Buy&Sell Namibia</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="UserProfile.php"><b>&nbsp&nbsp&nbsp&nbspHome</b></a></li>
  
      <li><a href="UserPost.php"><b>Post</b></a></li>
       <li><a href="MyPost.php"><b>MyPost</b></a></li>
       <li><a href="MyBid.php"><b>MyBid</b></a></li>
        <li><a href="UUpdate.php"><b>Update Profile</b></a></li>
         <li  class="active"><a href="Bidding.php"><b>Bidding</b></a></li>
         <li><a href="UNotification.php"><b>Notification</b></a></li>
    </ul>

   <ul class="nav navbar-nav navbar-right">
      <li><a href="ULogout.php"><span class="glyphicon glyphicon-user"></span> <b>Logout</b></a></li>
     
    </ul>
  </div>
</nav>

  
<div class="bodysection templete clear">

<div class="mainsection templete clear">


<table>


<?php
     $dbServername = "localhost";
     $dbUsername = "root";
     $dbPassword = "";
     $dbName = "bidding";


$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName); 
$uname=$_SESSION['uname'];
  $query="select * from product where ProductStatus='No' and Username!='$uname'";
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
<?php 
      $break++;
echo'</td>';
    }
  }
?>

  
</table>

</div>


 </div>
  


</body>
</html>

