<?php
session_start();
include("process.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
 <title></title>
</head>
<meta name="viewport" content="width=device-width,initial-scale=1">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<style>
.container{
  border:1px solid black;
  max-width:500px;
}
.col-6,.col-12,center{
  font-size:20px;
  font-weight:300;
  font-family:verdana;
  color:black;
  text-transform:uppercase;
}
input [type="text"]{
  text-transform:lowercase;
}
.form-control{
  border:1px solid black;
}
</style>
<body>
<center style="font-size:20px;letter-spacing:10px;">SYLLABUS_PAGE</center>
<div class="head text-right fixed">
<a href="admin.php"><i class="fa fa-window-close fa-4x text-danger text-right"  aria-hidden="true"  ></i></a></div>
<!-- View Syllabus -->
<div class="container p-5">
<div class="row">
  <div class="col-12 text-center">
  <b><u>View Syllabus</u></b></br>
 </br>
 <form action="viewsyllabus.php" method="post">
  Year/Scheme: <input  list="year" name="year" class="form-control" onfocus="this.value=''" required>
   <datalist id="year">
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
Semester<input  palceholder="semester" list="sem" name="sem" class="form-control" onfocus="this.value=''" required>
   <datalist id="sem">
    <option value="All"></option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
   </datalist>
   </br></br>
   <button class="btn btn-primary btn-sm" name="submit1">OK</button>
 </form>

</div>
</div>
</div>
</br>
</br>




<!-- create new scheme -->
<div class="container p-5">
<center><b><u>Create new scheme</u></b></center></br>
<div class="row">

</br>
  <div class="col-12 text-center">
 
<form action="" method="post"> 
New Scheme/year:<input type="number" class="form-control" name="year" required>
 <button name="submit2"  class="btn btn-primary btn-sm">Create</button>
</form>
<?php 
//  create scheme
 if(isset($_POST['submit2']))
{  $year=$_POST['year'];
   
    
   $sl="insert into scheme(year) values('$year')";
   $result=mysqli_query($conn,$sl)
    or die(mysqli_error($conn));
    if($result)
     { $i=1;
          while($i<=8)
        {
         $sq="insert into scheme_sem(sem_year,sem_id) values ('$year','$i')";
        
         $ret=mysqli_query($conn,$sq)
          or die(mysqli_error($conn));
           if($ret)
           {
             $j=1;
             while($j<=8)
             {
                 $fi=$i.$j;
                 $sj="insert into scheme_course(scheme_year,course_sem,course_code) values ('$year','$i','$fi')";
                 $rew=mysqli_query($conn,$sj) or die(mysqli_error($conn));
                 $j++;
             }
            }
             $i++;

         }
         echo "success";
    }
  

}
?> 
</div></br>
<div class="col-12 text-center">
 <form acion="" method="post">
  New scheme/Year<input type="number" class="form-control" name="year1" required>
  From scheme/Year<input  class="form-control" name="year2" list="tocopy"required>
  <datalist id="tocopy">
  <?php
      $se="select * from scheme order by scheme_id desc  limit 4 ";
      $result=mysqli_query($conn,$se) or die(mysqli_error($conn));
      if($result){
      while($row=mysqli_fetch_array($result))
      {
         echo "<option value='".$row['year']."'></option>";
        

      }
      }

     ?>
 
  </datalist>


  <button class="btn btn-primary btn-sm" name="submit12">Create</button>
 </form>
 <?php
//  Create Scheme from old Scheme
if(isset($_POST['submit12']))
{ 
  $year1=$_POST['year1'];
  $year2=$_POST['year2'];
  $so="insert into scheme(year) values('$year1')";
  $result1=mysqli_query($conn,$so)
   or die(mysqli_error($conn));
   if($result1){
   $sy="insert into scheme_course(scheme_year,course_sem,course_code,course_name)
   select $year1,course_sem,course_code,course_name
   from scheme_course
   where scheme_year='$year2'";
 $result=mysqli_query($conn,$sy);
 if($result)
 echo "success";
 else echo "sorry not created";
}
}
?>
</div>
</div>
</div>
</br>
</br>





<!-- update -->
<div class="container p-5">
<div class="row">
  <div class="col-12 text-center">
 <b><u>update the schemes</u></b></br>
 </br>
 <form action="" method="post" enctype="multipart/form-data">
 <div class="row text-center">
 
<div class="col-6 py-3">scheme/year</div><div class="col-6  py-3 "><input  name="year" class="form-control" list="year1" required >
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
   
    <div class="col-6  py-3">sem</div> <div class="col-6  py-3"><input  name="sem" class="form-control" list="sem1" required>
<datalist id="sem1">
    <option value="All"></option>
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
   <div class="row text-center">
   
   <div class="col-6  py-3">course code</div><div class="col-6  py-3"><input type="number" name="code" class="form-control" required></div></div>
<div class="row text-center">
<div class="col-6  py-3">course name</div><div class="col-6  py-3"><input type="text"  class="form-control" name="name" required >
</div></div>
<div class="row text-center">
<div class="col-6  py-3">upload file</div><div class="col-6  py-3"><input type="file" class="form-control" name="files"  >
</div></div>
<div class="row text-center">
<div class="col-12  py-3">
<button name="submit3" class="btn btn-primary btn-sm">OK</button>
</div>
</div>
 </form>
 
 <?php
// update php
if(isset($_POST['submit3'])){
$year=$_POST['year'];
$sem=$_POST['sem'];
$code=$_POST['code'];
$name=$_POST['name'];
$name=mysqli_real_escape_string($conn,$name);
$target="syllabusfiles/".basename($_FILES['files']['name']);
$file=$_FILES['files']['name'];
  if(empty($file))
  {
$sl="update scheme_course set course_name='$name' where scheme_year='$year' and course_sem='$sem' and course_code='$code'";
  $result=mysqli_query($conn,$sl) or die(mysqli_error($conn));
  if($result)
    echo "success";

    else
    echo "error";
  }
  else
  {
    $sl="update scheme_course set files='$file',course_name='$name' where scheme_year='$year' and course_sem='$sem' and course_code='$code'";
    move_uploaded_file($_FILES['files']['tmp_name'],$target);
  $result=mysqli_query($conn,$sl) or die(mysqli_error($conn));
  if($result)
    echo "success";
    else
    echo "error";
  }




}
?>

</div>
</div>
</div>



</body>
<html>