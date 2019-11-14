<?php  session_start() ?>

<!DOCTYPE html>
<head>
<title>Buy&Sell Namibia</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
body {padding-top:20px;}
</style>

</head>

<body>



<?php 

     $dbServername = "localhost";
     $dbUsername = "root";
     $dbPassword = "";
     $dbName = "bidding";


$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName); 
      
      if (isset($_POST['submit'])) {

      $name=$_GET['reply'];
      //echo $name;

      $msg=$_POST['message'];
      $temp="This is Reply From Admin, ";

      $message=$temp.$msg;
      
     // echo $message;

      $query="insert into Notification ('Username','Message','Seen') values ('$name','$message','No')";
      mysqli_query($conn,$query);

         $qry="delete from ANotification where Name='$name'";
            mysqli_query($conn,$qry);
       header('Location:AdminMagane.php');


    }
?>


<div class="container">
	<div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm">
          <form class="form-horizontal" action="ANotificationReply.php" method="post">
          <fieldset>
           <legend class="text-center">Admin Panel</legend>
    
            <div class="form-group">
              <label class="col-md-3 control-label" for="message"> Your Reply</label>
              <div class="col-md-9">
                <textarea class="form-control" id="message" name="message" placeholder="Please Enter Your Reply Here..." rows="5"></textarea>
              </div>
            </div>
    
            <div class="form-group">
              <div class="col-md-12 text-right"><a href="AdminMagane.php"> <img src="Image/back.jpg"  width="50px" height="50px"  alt="Bid" /> </a>
                <button type="submit" input type="submit" name="submit" value="SUBMIT" class="btn btn-primary btn-lg">Submit</button>
              </div>
            </div>
          </fieldset>
          </form>
        </div>
      </div>
	</div>
</div>
</body>
</html> 