<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
</head>
<meta name="viewport" content="width=device-width,initial-scale=1">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<style>
table{
    max-width:700px;
    width:100%;
    margin:auto;
}

</style>
<body>
<div class="container text-center">
   <h1>Update Student Results</h1>
   <div class="text-right"><a href="admin.php"><i class="fa fa-window-close fa-4x text-danger text-right"  aria-hidden="true"  ></i></a></div>
<form action="" method="post">
<div class="input-group">
<div class="input-group-prepend"><span class="input-group-text">Search</span></div>

<input type="text" class="form-control" name="usn" id="usn" value="4ps" placeholder="ENTER THE USN"></div>
<!-- <button name="submit" class="btn btn-primary btn-sm">submit</button> -->


</form>
<div id="display"></div>
</div>
<script>
$(document).ready(function(){
   $('#usn').keyup(function(){
     var text=$(this).val();
       if(text == '')
       {  

       }
     else
     {
         $('#display').html('');
         $.ajax({
               url:"studentadmininside.php",
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

<!-- <?php 

include("process.php");
if(isset($_POST['submit']))
{
$usn=$_POST['usn'];

$sl="select * from result where rusn='$usn'";
$res=mysqli_query($conn,$sl) or die(mysqli_error($conn));
echo " <form action='' method='post'> ";
echo "<table class='table table-sm table-striped table-bordered'>";
echo "<tr><td>Usn</td><td>Cie1</td><td>Code</td><td>Cie2</td><td>Code</td><td>See</td><td>Code</td></tr>";
while($row=mysqli_fetch_array($res))
{  $_SESSION['usn']=$row['rusn'];
    ?>
      
       <tr><td><?php echo $row['rusn']?></td><td><input type="number"  name="cie1_<?php echo $row['id'];?>" class="form-control" value="<?php echo $row['cie1'];?>"></td><td><input type="number" class="form-control" name="fcode1_<?php echo $row['id'];?>" value="<?php echo $row['fcode'];?>"></td><td><input class="form-control" name="cie2_<?php echo $row['id'];?>" type="number" value="<?php echo $row['cie2'];?>"></td><td><input class="form-control" name="ccode2_<?php echo $row['id'];?>" type="number" value="<?php echo $row['ccode'];?>"></td><td><input class="form-control" type="number"name="see_<?php echo $row['id'];?>" value="<?php echo $row['see'];?>"></td><td><input class="form-control" type="number" name="scode_<?php echo $row['id'];?>" value="<?php echo $row['scode'];?>"></td></tr>
<?php
} 
echo "<button name='submit2' class='btn btn-primary btn-sm btn-block mt-4'>update</button>";
echo "</table>";
echo "</form>";

$sl="select id from result where rusn='$usn' limit 1";
$resh=mysqli_query($conn,$sl);
$row=mysqli_fetch_array($resh);
$id=$row['id'];
$sl="select id from result where rusn='$usn' order by id desc limit 1";
$resh=mysqli_query($conn,$sl);
$row=mysqli_fetch_array($resh);
$id1=$row['id'];

}
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
        $fcode1=substr($fcode,1,1);
           
          $sl="update result set cie1='$cie',fcode='$fcode' where rusn='$usn' and fcode like '_{$fcode1}' and id={$i}";
          $result=mysqli_query($conn,$sl)
           or die(mysqli_error($conn));
           if($result)
           {
               echo "success";
           }
    }
    // ($_POST["cie2_{$i}"] &&
    if(!empty ($_POST["ccode2_{$i}"]))
    {   $cie2=$_POST["cie2_{$i}"];
        $ccode=$_POST["ccode2_{$i}"];
         $ccode1=substr($ccode,1,1);
      $sl="update result set cie2='$cie2',ccode='$ccode' where rusn='$usn' and ccode like '_{$ccode1}' and id={$i} ";
      $result=mysqli_query($conn,$sl)
       or die(mysqli_error($conn));
       if($result)
       {
           echo "success";
       }
  
     }
    //  $_POST["see_{$i}"] &&
     if(!empty( $_POST["scode_{$i}"]))
     {   $see=$_POST["see_{$i}"];
         $scode=$_POST["scode_{$i}"];
         $scode1=substr($scode,1,1);
      $sl="update result set see='$see',scode='$scode' where rusn='$usn' and scode like '_{$scode1}' and id={$i}";
      $result=mysqli_query($conn,$sl)
       or die(mysqli_error($conn));
       if($result)
       {
           echo "success";
       }
    }
    
  
    $i++;
 }
	}
}



?> -->
<body>
</html>