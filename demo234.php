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

<body>
<div class="container text-center">
<form action="" method="post">
<input type="text" class="form-control" name="usn"  placeholder="ENTER THE USN">
<button name="submit" class="btn btn-primary btn-sm">submit</button>


</form>
</div>


<?php 

include("process.php");
if(isset($_POST['submit']))
{$sl="select id from result where rusn='".$_SESSION['usn']."'order by id desc limit 1";
    $resh=mysqli_query($conn,$sl);
    $row=mysqli_fetch_array($resh);
    $id1=$row['id'];
    echo $id1;
$usn=$_POST['usn'];

$sl="select * from result where rusn='$usn'";
$res=mysqli_query($conn,$sl) or die(mysqli_error($conn));
echo " <form action='' method='post'> ";
echo "<table>";
while($row=mysqli_fetch_array($res))
{  $_SESSION['usn']=$row['rusn'];
    ?>
      <tr><td>usn</td><td>cie1</td><td>code</td><td>cie2</td><td>code</td><td>see</td><td>code</td></tr>
       <tr><td><?php echo $row['rusn']?></td><td><input type="number" name="cie1_<?php echo $row['id'];?>" class="form-control" value="<?php echo $row['cie1'];?>"></td><td><input type="number" class="form-control" name="fcode1_<?php echo $row['id'];?>" value="<?php echo $row['fcode'];?>"></td><td><input class="form-control" name="cie2_<?php echo $row['id'];?>" type="number" value="<?php echo $row['cie2'];?>"></td><td><input class="form-control" name="ccode2_<?php echo $row['id'];?>" type="number" value="<?php echo $row['ccode'];?>"></td><td><input class="form-control" type="number"name="see_<?php echo $row['id'];?>" value="<?php echo $row['see'];?>"></td><td><input class="form-control" type="number" name="scode_<?php echo $row['id'];?>" value="<?php echo $row['scode'];?>"></td></tr>
<?php
} 
echo "<button name='submit2' class='btn btn-primary btn-sm'>update</button>";
echo "</table>";
echo "</form>";
}
$sl="select id from result where rusn='".$_SESSION['usn']."' limit 1";
$resh=mysqli_query($conn,$sl);
$row=mysqli_fetch_array($resh);
$id=$row['id'];
$sl="select id from result where rusn='".$_SESSION['usn']."'order by id desc limit 1";
$resh=mysqli_query($conn,$sl);
$row=mysqli_fetch_array($resh);
$id1=$row['id'];


?>
<?php
if(isset($_POST['submit2']))
{
   
 

   $usn=$_SESSION['usn'];
    $sl="select * from result";
	$res=mysqli_query($conn,$sl);
	
	$i=$id;
	while($row=mysqli_fetch_array($res))
	{
while($i<=$id1)
{ 
      	if(!empty($_POST["cie1_{$i}"] && $_POST["fcode1_{$i}"]))
    {   $cie=$_POST["cie1_{$i}"];
        $fcode=$_POST["fcode1_{$i}"];
         
        
        $tcode=$fcode;
         $fcode=$fcode-10;
  
          $sl="update result set cie1='$cie',fcode='$tcode' where rusn='$usn' and scode='$fcode' and id={$i}";
          $result=mysqli_query($conn,$sl)
           or die(mysqli_error($conn));
  
    }
    
    if(!empty($_POST["cie2_{$i}"] && $_POST["ccode2_{$i}"]))
    {   $cie2=$_POST["cie2_{$i}"];
        $ccode=$_POST["ccode2_{$i}"];
         
      $sl="update result set cie2='$cie2',ccode='$ccode' where rusn='$usn' and fcode='$ccode' and id={$i} ";
      $result=mysqli_query($conn,$sl)
       or die(mysqli_error($conn));
       if($result)
       {
           echo "success";
       }
  
     }
     if(!empty($_POST["see_{$i}"] && $_POST["scode_{$i}"]))
     {   $see=$_POST["see_{$i}"];
         $scode=$_POST["scode_{$i}"];
          
      $sl="update result set see='$see',scode='$scode' where rusn='$usn' and fcode='$scode' and id={$i}";
      $result=mysqli_query($conn,$sl)
       or die(mysqli_error($conn));
  
    }
    
  
    $i++;
 }
	}
}



?>
<body>
</html>