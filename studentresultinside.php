<?php 
header("Cache-Control: no cache,must-revalidate,max-age=0");
session_cache_limiter("private_no_expire");?>

<!DOCTYPE html>
<html>
    <head> 
</head>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<body>
<center><a href="attendenceadmin.php"><i class="fa fa-home fa-5x"></i></a></br>
<button onclick="goback()" class="btn btn-warning btn-md">Go back after Updating</button></br>
</br>
<?php echo @$_GET['success'];?>
</center>
<script>
function goback(){
    window.history.go(-2);
}
</script>
<?php
session_start();
ob_start();
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

// if(isset($_POST['usn']))
// {
$usn=$_SESSION["usn"];

$sl="select * from result where rusn='".$_SESSION["usn"]."'";
$res=mysqli_query($conn,$sl) or die(mysqli_error($conn));
echo "<div class='table-responsive-sm'>";
echo " <form action='' method='post'> ";
echo "<table class='table table-sm table-striped table-bordered'>";
echo "<tr><td>Usn</td><td>Cie1</td><td>Code</td><td>Cie2</td><td>Code</td><td>See</td><td>Code</td></tr>";
while($row=mysqli_fetch_array($res))
{  $_SESSION['usn']=$row['rusn'];
    ?>
      
       <tr><td><?php echo $row['rusn']?></td><td><input type="number"  name="cie1_<?php echo $row['id'];?>" class="form-control" value="<?php echo $row['cie1'];?>"></td><td><input type="text" class="form-control" name="fcode1_<?php echo $row['id'];?>" value="<?php echo $row['fcode'];?>"></td><td><input class="form-control" name="cie2_<?php echo $row['id'];?>" type="number" value="<?php echo $row['cie2'];?>"></td><td><input class="form-control" name="ccode2_<?php echo $row['id'];?>" type="text" value="<?php echo $row['ccode'];?>"></td><td><input class="form-control" type="number"name="see_<?php echo $row['id'];?>" value="<?php echo $row['see'];?>"></td><td><input class="form-control" type="text" name="scode_<?php echo $row['id'];?>" value="<?php echo $row['scode'];?>"></td></tr>
<?php
} 
echo "<button name='submit2' class='btn btn-primary btn-sm btn-block mt-4'>update</button>";
echo "</table>";
echo "</form>";
echo "</div>";
$sl="select id from result where rusn='$usn' limit 1";
$resh=mysqli_query($conn,$sl);
$row=mysqli_fetch_array($resh);
$id=$row['id'];
$sl="select id from result where rusn='$usn' order by id desc limit 1";
$resh=mysqli_query($conn,$sl);
$row=mysqli_fetch_array($resh);
$id1=$row['id'];


?>
<?php
if(isset($_POST['submit2']))
{
    $sl="select id from result where rusn='".$_SESSION['usn']."' limit 1";
    $resh=mysqli_query($conn,$sl);
    $row=mysqli_fetch_array($resh);
    $id=$row['id'];
    $sl="select id from result where rusn='".$_SESSION['usn']."' order by id desc limit 1";
    $resh=mysqli_query($conn,$sl);
    $row=mysqli_fetch_array($resh);
    $id1=$row['id'];
 

   $usn=$_SESSION['usn'];
    $sl="select * from result";
	$res=mysqli_query($conn,$sl);
	
	$i=$id;
	while($row=mysqli_fetch_array($res))
	{
while($i<=$id1)
{ 
    // $_POST["cie1_{$i}"] &&  
    if(!empty( $_POST["fcode1_{$i}"]))
    {   $cie=$_POST["cie1_{$i}"];
        $fcode=$_POST["fcode1_{$i}"];
           
          $sl="update result set cie1='$cie',fcode='$fcode' where rusn='$usn' and id={$i}";
          $result=mysqli_query($conn,$sl)
           or die(mysqli_error($conn));
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
    }
    // ($_POST["cie2_{$i}"] &&
    if(!empty ($_POST["ccode2_{$i}"]))
    {   $cie2=$_POST["cie2_{$i}"];
        $ccode=$_POST["ccode2_{$i}"];
      $sl="update result set cie2='$cie2',ccode='$ccode' where rusn='$usn'  and id={$i} ";
      $result=mysqli_query($conn,$sl)
       or die(mysqli_error($conn));
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
  
     }
    //  $_POST["see_{$i}"] &&
     if(!empty( $_POST["scode_{$i}"]))
     {   $see=$_POST["see_{$i}"];
         $scode=$_POST["scode_{$i}"];
      $sl="update result set see='$see',scode='$scode' where rusn='$usn'  and id={$i}";
      $result=mysqli_query($conn,$sl)
       or die(mysqli_error($conn));
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
    }
    
  
    $i++;
 }
	}
 }



?>
</body>
</html>






