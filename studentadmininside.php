<?php 
session_start();
include("process.php");


include("process.php");
// if(isset($_POST['usn']))
// {
$usn=$_POST["usn"];

$sl="select * from result where rusn='".$_POST["usn"]."'";
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



?>









