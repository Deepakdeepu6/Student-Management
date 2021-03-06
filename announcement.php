<?php
session_start();
include("process.php");
if(!isset($_SESSION['username']))
{
	header("location:second.php");
	
}
else if(!isset($_SERVER['HTTP_REFERER'])){
   
    header('location:second.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>
      
	  
	  </title>
	  </head>
	 

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<meta name="viewport" content="width=device-width">
<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>

form {
    width:100%;
}
.form-control {
    font-size:25px;
}
.first {
    margin:200px auto;
}
.area {
 padding:20px;
}
.card-header 
{
    font-size:25px;
    font-weight:100px;
    color:#4A235A ;
}
.card-body {
    background-color:#AED6F1;
}
  </style>
  <body>
  <div class="container">
    <div class="row first">
           <div class="col-sm-7 column" style="margin:auto;">
                 <div class="card"> 
                 <div class="card-header text-center "><a href="submit.php"><i class="fa fa-home"></i></a>
                 <?php echo "<font color=green>".@$_GET['success']."</font>"?></div>
                    <div class="card-header text-center ">
                   MAKE YOUR  ANNOUNCEMENTS HERE
                    </div>
                     <div class="card-body">
                         <form action="" method="post">
                              <input type="text" placeholder="Send To" name="to" class="form-control"></br>
                              <textarea name="text" placeholder="Type Here" class="form-control area" required></textarea></br>
                              <center><button name="submit" class="btn btn-success btn-lg">submit</button></center>
                         </form>
                      </div>
                 </div>
          </div>
     </div>
 </div>
<?php 
if(isset($_POST['submit']))
{
   $to=$_POST['to'];
   $text=$_POST['text'];
   $announcer=$_SESSION['username'];
   $email=$_SESSION['email'];
   $to=strtoupper($to);
   $so="insert into announce(sendto,announcer,text,email) values('$to','$announcer','$text','$email')";
   if(mysqli_query($conn,$so))
   {
      header("location:announcement.php?success=SUCCESSFULLY SENT ");
   }
else
echo mysqli_error($conn);
}
?>
  </body>
  </html>