<?php
session_start();
// if(isset($_POST['submit']))
// {
    include("process.php");
$_SESSION['usn']=$_POST["usn"];
$sl="select * from attenden where musn='".$_POST["usn"]."'";
$res=mysqli_query($conn,$sl) or die(mysqli_error($conn));
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

$sl="select id from attenden where musn='".$_POST['usn']."' limit 1";
$resh=mysqli_query($conn,$sl);
$row=mysqli_fetch_array($resh);
$id=$row['id'];
$sl="select id from attenden where musn='".$_POST['usn']."'order by id desc limit 1";
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
if($result)echo "success";
 else echo "failure";
}
?>
</body>