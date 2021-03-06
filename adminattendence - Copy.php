<?php 
include("process.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width,initial-scale=1">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>
<style>
</style>
<body>
<div class="container">
<h1>UPDATE ATTENDENCE:</h1>
 <form action="" method="post" >
  <h3>Update for freshers</h3>
    USN:<input type="text" name="usn" class="form-control">
    CODE:<input type="number" name="code" class="form-control">
    ATTENDENCE:<input type="number" name="attend" class="form-control" placeholder="%">
  <button class="btn btn-primary btn-sm" name="submit1">Update</button>

 </form>
<?php 
if(isset($_POST['submit1']))
{  $usn=$_POST['usn'];
 $code=$_POST['code'];
  $attend=$_POST['attend'];
 $sl="update attenden set attend='$attend' where musn='$usn' and mcode='$code'";
 $result=mysqli_query($conn,$sl) or die(mysqli_error($conn));
 if($result)echo "success";


}
?>


</div>
<div class="container">
<form action="" method="post" >
  <h3>Update for seniors</h3>
    USN:<input type="text" name="usn" class="form-control">
    CODE:<input type="number" name="code" class="form-control">
    ATTENDENCE:<input type="number" name="attend" class="form-control" placeholder="%">
  <button class="btn btn-primary btn-sm" name="submit2">Update</button>

 </form>
 <?php
 if(isset($_POST['submit2']))
{  $usn=$_POST['usn'];
 $code=$_POST['code'];
  $attend=$_POST['attend'];
  $code1=$code-10;
 $sl="update attenden set attend='$attend',mcode='$code' where musn='$usn' and mcode='$code1'";
 $result=mysqli_query($conn,$sl) or die(mysqli_error($conn));
 if($result)echo "success";


}
?>


</div>

</body>
</html>