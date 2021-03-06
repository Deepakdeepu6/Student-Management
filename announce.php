<?php 
session_start();
include("process.php");
if(!isset($_SESSION['susername'])){
   
    header('location:student.php');
    exit;
}
else if(!isset($_SERVER['HTTP_REFERER'])){
   
    header('location:student.php');
    exit;
}
?>
<!DOCTYPE html>
<html lan="en">
<head>
<title></title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<meta name="viewport" content="width=device-width">
<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</head>
<style>
*
{
    margin:0px;
    padding:0px;
}
.page-header {
    background-color:#59A1D1 ;
    text-align:center;
    font-family:verdana;
    font-size:30px;
    font-weight:bold;
    letter-spacing:5px;
    color:white;
}
.card 
{
    max-width:800px;
    margin:auto;
}
.card-header 
{
    text-align:center;
    
    font-size:25px;
    font-weight:400;
    color:#388DC5 ;

}
.card-body {
    font-size:20px;
    font-weight:200px;
    font-family:verdana;
    color:
}
</style>

<body>
<?php
$usn=$_SESSION['usn'];
$se="select * from student where usn='$usn'";
$result=mysqli_query($conn,$se) or die(mysqli_error($conn));
$row=mysqli_fetch_array($result);
$section=$row['section'];

?>
<div class="page-header">
   ANNOUNCEMENTS FOR <?php echo $section;?>

</div>
<?php 

  $sl="select * from announce where sendto='$section' order by id desc";
  $res=mysqli_query($conn,$sl)
   or die(mysqli_error($conn));
   echo "<div class='container'>";
   echo "<div class='card'>";
   while($row=mysqli_fetch_array($res))
   {  ?>
   
        <div class="card-header">
       <small> <?php echo "<i>Posted on </i>:".$row['time']."</br>";?></small>
        <?php echo "From:".$row['announcer']."</br>";?>
        
        </div>
        <div class="card-body">
        <?php echo "&rarr;".$row['text']."</br>";?>
        </div>
      
       
    <?php 
 
   }
   echo "</div>";
    echo "</div>";
   
?>

</body>
</html>