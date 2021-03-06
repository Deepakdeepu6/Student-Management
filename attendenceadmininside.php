<?php
header("Cache-Control: no cache,must-revalidate,max-age=0");
session_cache_limiter("private_no_expire");

?>
<!DOCTYPE html>
<html>
<head>

</head>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
.table
{ padding:0px;
    width:80%;
    margin:0px auto;
    
}
.btn
{
    width:70%;
    margin:auto;
}
</style>
<script>
function goback()
{
    window.history.go(-2);
}
</script>
<body>
<center><a href="attendenceadmin.php"><i class="fa fa-home fa-5x"></i></a></br>
<button onclick="goback()" class="btn btn-warning btn-md">Go back after Updating</button></br>
</br>
<?php echo @$_GET['success'];?>
</center>
<?php
session_start();
include("process.php");
$sl="select id from student";
$result=mysqli_query($conn,$sl) or die(mysqli_error($conn));
$row=mysqli_num_rows($result);



for($i=1;$i<=$row;$i++)
{
 if(isset($_POST["submit_{$i}"]))
 {
    $sl="select * from student,result where student.id='$i' and usn=rusn";
    $result=mysqli_query($conn,$sl) or die(mysqli_error($conn));
    while($row=mysqli_fetch_array($result))
     {
         $_SESSION['usn']=$row['usn'];
    
     
    
    }
}
}

?>
<?php

// if(isset($_POST['submit']))
// {
    include("process.php");
// $_SESSION['usn']=$_POST["usn"];
$sl="select * from attenden where musn='".$_SESSION['usn']."'";
$res=mysqli_query($conn,$sl) or die(mysqli_error($conn));
echo "<div class='table-responsive'>";
echo " <form action='' method='post'> ";
echo "<table class='table table-sm table-striped table-bordered'>";
echo "<tr><td>Usn</td><td>Code</td><td>Attended</td></tr>";
while($row=mysqli_fetch_array($res))
{  $_SESSION['usn']=$row['musn'];
    ?>
      
      <tr><td><?php echo $row['musn']?></td><td><input type="text" name="mcode_<?php echo $row['id'];?>" class="form-control" value="<?php echo $row['mcode'];?>"></td><td><input type="number" class="form-control" name="attend_<?php echo $row['id'];?>" value="<?php echo $row['attend'];?>"></td></tr>
<?php
} 

echo "<button name='submit2' class='btn btn-primary btn-lg btn-block'>update</button>";
echo "</table>";
echo "</form>";
echo "</div>";

$sl="select id from attenden where musn='".$_SESSION['usn']."' limit 1";
$resh=mysqli_query($conn,$sl);
$row=mysqli_fetch_array($resh);
$id=$row['id'];
$sl="select id from attenden where musn='".$_SESSION['usn']."'order by id desc limit 1";
$resh=mysqli_query($conn,$sl);
$row=mysqli_fetch_array($resh);
$id1=$row['id'];


// }

?>

<?php  
if(isset($_POST['submit2']))
{  
    $usn=$_SESSION['usn'];
     $sl="select * from attenden";
     $res=mysqli_query($conn,$sl);
     
     $i=$id;
     while($row=mysqli_fetch_array($res))
     {
 while($i<=$id1)
 { 

 $code=$_POST["mcode_{$i}"];
 $c=substr($_POST["mcode_{$i}"],1,1);
  $attend=$_POST["attend_{$i}"];
  
  
 $sl="update attenden set attend='$attend',mcode='$code' where musn='$usn' and mcode like  '_{$c}'";
 $result=mysqli_query($conn,$sl) or die(mysqli_error($conn));
 
 $i++;
 }
 
}
if($result)
{
    ?>
    <script>
     $(document).ready(function(){
    swal({
     title:"Status",
     text:"Successfully Updated",
     icon:"success",
     timer:2000


    });
     });
</script>
    <?php
} 
 else echo "failure";
}
?>
</body>
</html>