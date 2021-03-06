<?php 
session_start();
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<style>
span{
    border:1px solid black;
    background-color:brown;
}
</style>
<body>
<div class="container text-center">
   <h1>Update Student Attendence</h1>
   <div class="text-right"><a href="admin.php"><i class="fa fa-window-close fa-4x text-danger text-right"  aria-hidden="true"  ></i></a></div>
   <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">Search</span>
  </div>
  <input type="text" class="form-control" name="usn" id="name1" value="4ps" aria-label="Default" aria-describedby="inputGroup-sizing-default">
</div>

<div id="display"></div>
<script>
$(document).ready(function(){
   $('#name1').keyup(function(){
     var text=$(this).val();
       if(text == '')
       {  

       }
     else
     {
         $('#display').html('');
         $.ajax({
               url:"adminattendenceinside.php",
               method:"post",
               data:{usn:text},
               dataType:"text",
               success:function(response){
                   $('#display').html(response);
               }
         });
     }

   });


});




</script>
<!--  <?php
// if(isset($_POST['submit']))
// {
    include("process.php");
$output='';
$sl="select * from attenden where musn='".$_POST["usn"]."'";
$res=mysqli_query($conn,$sl) or die(mysqli_error($conn));
echo " <form action='' method='post'> ";
echo "<table class='table table-sm table-striped table-bordered'>";
echo "<tr><td>Usn</td><td>Code</td><td>Attended</td></tr>";
while($row=mysqli_fetch_array($res))
{  $_SESSION['usn']=$row['musn'];
    ?>
      
      $output.=' <tr><td><?php echo $row['musn']?></td><td><input type="number" name="mcode_<?php echo $row['id'];?>" class="form-control" value="<?php echo $row['mcode'];?>"></td><td><input type="number" class="form-control" name="attend_<?php echo $row['id'];?>" value="<?php echo $row['attend'];?>"></td></tr>';
<?php
} 
echo $output;
echo "<button name='submit2' class='btn btn-primary btn-lg btn-block'>update</button>";
echo "</table>";
echo "</form>";

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
</div> -->

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
if($result)echo "success";
 else echo "failure";
}
?>
</body>
</html>