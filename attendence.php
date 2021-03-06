<?php 
session_start();
include("process.php");
if(!isset($_SESSION['susername'])){
    header("location:student.php");
}
if(!isset($_SERVER['HTTP_REFERER'])){
    header("location:student.php");
}?>
<!DOCTYPE html>
<html lang="en">
<head>
<title></title>
<meta name="viewport" content="width=device-width">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<style>
header
{
    text-align:center;
    font-size:30px;
    font-weight:bold;
    font-family:verdana;
    color:white;
    letter-spacing:10px;
    background-color:#4EABE9;
    text-transform:uppercase;
}
body {
    background-image:linear-gradient(to left,#A9CCE3 ,#2980B9  );
}
.container {
   
    margin:150px auto;
   
    text-align:center;
}
table 
{
    text-transform:uppercase;
    border:2px solid black;
    
     font-size:20px;
}
table tr:hover td {
   
   transform: scale(1.1);
}
</style>
<body>
<header>
  <?php echo $_SESSION['susername'];?>-ATTENDENCE </br>
 CURRENT-SEMESTER-<?php echo $_SESSION['section'];?>
</header>

 <div class="container">
   <div class="row">
   <div class="col-md ">
<?php 
$usn=$_SESSION['usn'];
$sl="select section from student where usn='$usn'";
$res=mysqli_query($conn,$sl)
  or die(mysqli_error($res));
  $row=mysqli_fetch_array($res);
  {
      $s=substr($row['section'],0,1);
         
  }
  $sq="select * from attendence,courses where musn='$usn' and code=mcode";
   $result=mysqli_query($conn,$sq)
    or die(mysqli_error($conn));
    echo "<table class='table table-md  table-striped bg-light'>";
   echo " <tr><th scope='1'>SUBJECT</th><th>COURSE CODE</th><th>IN %</th></tr>";
    while($rows=mysqli_fetch_array($result))
    {  if($rows['attend']<85)
        {
        ?>
       <tr style="color:red;"><td> <?php echo $rows['course'];?></td><td><?php echo $rows['code'];?></td><td><?php echo $rows['attend'];?></td></tr>
     <?php 
        }
     else
     {
     ?>
         
     <tr style="color:green;"><td> <?php echo $rows['course'];?></td><td><?php echo $rows['code'];?></td><td><?php echo $rows['attend'];?></td></tr>
   
   
   <?php 
     }

    }
   echo "</table>";
?>
  </div>
</div>

</div>
</body>
</html>