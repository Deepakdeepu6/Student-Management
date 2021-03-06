<?php
session_start();
include("process.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
 <title></title>
</head>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style>
.container{
 border:4px solid black;
max-width:1500px;
width:100%;
 margin:auto;
}
.col-6,.col-12,h1{
  font-size:20px;
  font-weight:300;
  font-family:verdana;
  color:black;
  text-transform:uppercase;
  margin:auto;
}
input [type="text"]{
  text-transform:lowercase;
}
.form-control{
  border:1px solid black;
}

</style>
<body>
<div class="container p-5">
<h1 class="text-center">UPDATE_SYLLABUS_PAGE</h1>
<div class="head text-right fixed">
<a href="admin.php"><i class="fa fa-window-close fa-4x text-danger text-right"  aria-hidden="true"  ></i></a></div>




<!-- update -->

<div class="row">
  <div class="col-12 text-center">
 <b><u>update the schemes</u></b></br>
 </br>
 <form action="" method="post" enctype="multipart/form-data">
 <div class="row text-center">
 
<div class="col-12 col-sm-6  py-3">scheme/year</div><div class="col-12 col-sm-6  py-3 "><input  name="year" class="form-control" list="year1" required >
<datalist id="year1">
<?php
      $se="select * from scheme ";
      $result=mysqli_query($conn,$se) or die(mysqli_error($conn));
      if($result){
      while($row=mysqli_fetch_array($result))
      {
         echo "<option value='".$row['year']."'></option>";
        

      }
      }

     ?>
    
   </datalist>
   </div></div>
    <div class="row text-center">
   
    <div class="col-12 col-sm-6  py-3">sem</div> <div class="col-12 col-sm-6  py-3"><input  name="sem" class="form-control" list="sem1" required>
<datalist id="sem1">
    <option value="Select" disabled selected></option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
   </datalist></div>
   </div>
    <button name="submit1" class='btn btn-info btn-lg'>Visit</button>
 </form>
 <?php
 if(isset($_GET['success']))
 {
echo "Success";}
 ?>
 <?php
 if(isset($_POST['submit1']))
 {
  $year=$_POST['year'];
  $_SESSION['year']=$_POST['year'];
  $sem=$_POST['sem'];
  $_SESSION['sem']=$_POST['sem'];
  $se="select * from scheme_course where scheme_year='$year' and course_sem='$sem'";
  $result=mysqli_query($conn,$se) or die(mysqli_error($conn));
 
    echo "<div class='table-responsive-sm'>";
echo " <form action='' method='post' enctype='multipart/form-data'> ";
echo "<table class='table table-sm table-striped table-bordered'>";
echo "<tr><td>code</td><td>Name</td><td>File</td><td>File Name</td></tr>";
$i=1;
while($row=mysqli_fetch_array($result))
{ 
   
    ?>
      
       <tr><td><input type="text"  name="code_<?php echo $row['id'];?>" class="form-control" value="<?php echo $row['course_code']?>"></td>
       <td><input type="text" class="form-control" name="name1_<?php echo $row['id'];?>" value="<?php echo $row['course_name'];?>"></td>
       <?php
       if($i==1)
       {?>
       <td><input class="form-control" name="files" type="file" value=""></td>
       <td><input class="form-control" name="_<?php echo $row['id'];?>" type="text" value="<?php echo $row['files'];?>"></td>
       <?php
       }
       else
       echo "</tr>";
       ?>
       
<?php
$i++;
} 
echo "<button name='submit3' class='btn btn-primary btn-sm btn-block mt-4'>update</button>";
echo "</table>";
echo "</form>";
echo "</div>";
  

 }
 






?>
 <?php
// update php
if(isset($_POST['submit3']))
{
  $year=$_SESSION['year'];
  $sem=$_SESSION['sem'];

  $sl1="select id,course_code from scheme_course where scheme_year='$year' and course_sem='$sem'";
  $result1=mysqli_query($conn,$sl1) or die(mysqli_error($conn));
while($row=mysqli_fetch_array($result1))
 
{  
  //  if(!empty($_POST["name1_{$row['id']}"]) || !empty($_POST["files_{$row['id']}"]))
  //  {
$code=$_POST["code_{$row['id']}"];
$name=$_POST["name1_{$row['id']}"];
$name=mysqli_real_escape_string($conn,$name);

$target="syllabusfiles/".basename($_FILES["files"]['name']);
$file=$_FILES["files"]['name'];
if(!empty($file) && !empty($name) && !empty($code))
{
$sl="update scheme_course set course_name='$name',files='$file',course_code='$code' where scheme_year='$year' and course_sem='$sem' and id='".$row['id']."' ";
move_uploaded_file($_FILES['files']['tmp_name'],$target);
  $result=mysqli_query($conn,$sl) or die(mysqli_error($conn));
  if($result)
    {
      ?>
      <script>
       $(document).ready(function(){
      swal({
       title:"Status",
       text:"Successfully Updated1",
       icon:"success",
       timer:2000
    
    
      });
       });
    </script>
      <?php
      }

    else
    header("location:updatesyllabus.php?success=Not Updated");

}
else if(empty($file) && !empty($name) && !empty($code))
{
  $sl="update scheme_course set course_name='$name',course_code='$code' where scheme_year='$year' and course_sem='$sem' and id='".$row['id']."'  ";
  $result=mysqli_query($conn,$sl) or die(mysqli_error($conn));
  if($result)
  {
    ?>
    <script>
     $(document).ready(function(){
    swal({
     title:"Status",
     text:"Successfully Updated2",
     icon:"success",
     timer:2000
  
  
    });
     });
  </script>
    <?php
    }

  else
  header("location:updatesyllabus.php?success=Not Updated");


}
else if(!empty($file) && empty($name) && !empty($code))
{
$sl="update scheme_course set files='$file',course_code='$code' where scheme_year='$year' and course_sem='$sem' and id='".$row['id']."'  ";
move_uploaded_file($_FILES['files']['tmp_name'],$target);

  $result=mysqli_query($conn,$sl) or die(mysqli_error($conn));
  if($result)
  {
    ?>
    <script>
     $(document).ready(function(){
    swal({
     title:"Status",
     text:"Successfully Updated3",
     icon:"success",
     timer:2000
  
  
    });
     });
  </script>
    <?php
    }

   else if(empty($file) && empty($name) && !empty($code))
    {
    $sl="update scheme_course set course_code='$code' where scheme_year='$year' and course_sem='$sem' and id='".$row['id']."'  ";
    
      $result=mysqli_query($conn,$sl) or die(mysqli_error($conn));
      if($result)
      {
        ?>
        <script>
         $(document).ready(function(){
        swal({
         title:"Status",
         text:"Successfully Updated4",
         icon:"success",
         timer:2000
      
      
        });
         });
      </script>
        <?php
        }
      }

  else
  header("location:updatesyllabus.php?success=Not Updated");

}
  
  

 
  
  

}
  


}
?>

</div>
</div>
</div>



</body>
</html>