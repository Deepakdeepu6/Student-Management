<?php 
include("process.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin Page</title>
<meta name="viewport" content="width=device-width">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</head>
<style>
body{
  background-image:linear-gradient(to left,#B5DBF4,#82C8F5 );
}
header{
  font-family:verdana;
  font-size:25px;
  font-weight:bold;
  color:white;
  letter-spacing:10px;
  word-spacing:5px;
  background-color:#5593BC;
  text-transform:uppercase;
}
form{
  width:100%;
  max-width:500px;
  margin:auto;
}

.main{
  margin:20px auto;
  border:1px solid black;
  box-shadow:2px 2px 5px 2px grey;
  transform:scale(1.0);
  background-color:#F9F9F9  ;
}
 

.navbar-dark .navbar-nav .nav-link {
    color: #D1F2EB ;
    
}

.input-group-text{
  color:black;
} 

</style>
<body>
<header class="text-center">
  Admin page
</header>
<nav class="navbar navbar-expand-sm  navbar-dark bg-info justify-content-center navbar-custom">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
			
			<ul class="navbar-nav nav nav-tabs nav-fill">
			 <li class="nav-item ">
         <a class="nav-link" href="#student" >MAIN</a></li>
			 <li class="nav-item ">
         <a class="nav-link" href="studentresult.php" >STUDENT'S RESULT</a></li>
        
			   <li class="nav-item "><a class="nav-link"  href="viewsyllabus.php">VIEW SYLLABUS</a></li>
			   <li class="nav-item "><a class="nav-link"  href="createsyllabus.php">CREATE SCHEME</a></li>
			   <li class="nav-item "><a class="nav-link"  href="updatesyllabus.php">UPDATE SYLLABUS</a></li>
			   <li class="nav-item "><a class="nav-link"  href="attendenceadmin.php">ATTENDENCE</a></li>
			    
			   </ul>
</div>
			  </nav>
<div class="tab-content">
<div class="container main">
<div class="container " id="student">
  <h1 class="text-center">Add New Users</h1>
  <h1>This is for Student</h1>
 
 <form action="" method="post">
 <div class="input-group mb-3">
 <div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-default">USN</span></div><input type="text" required name="usn" class="form-control" ></div>
 <div class="input-group  mb-3"><div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-default">PASSWORD</span></div><input type="text" required name="password1" class="form-control"></br></div>
 <center><button class="btn btn-primary btn-sm btn-block" name="submit0">Create</button></center>
 </form>
 </div>
</br>
</br>

          <!-- lecturers -->

<div class="container " id="lecturer">
<h1>For Lecturers</h1>
<form method="post" action="">
<div class="input-group mb-3">
<div class="input-group-prepend"><span class="input-group-text">EMAIL</span></div>
   <input type="email" name="email" class="form-control " required></div>
    <div class="input-group mb-3">
    <div class="input-group-prepend"><span class="input-group-text">PASSWORD</span></div>
   <input type="password" name="password" class="form-control " required ></br>
   </div>
   
 <center> <button class="btn btn-success btn-sm btn-block" name="submit3">Create</button></center>


  </form>
  
  <?php
  if(isset($_POST['submit3'])){
 include("process.php");
 $email=$_POST['email'];
 $pass=$_POST['password'];
 
 $sl="insert into users (email,password) values('$email','$pass')";
 $resul=mysqli_query($conn,$sl)
   or die(mysqli_error($conn));
   if($resul){
       
   $sl="insert into handling (semail) values('$email')";
 $result=mysqli_query($conn,$sl)
   or die(mysqli_error($conn));
   if($result){
       echo "success";
   }
  }
  }
?>
     <!-- New Student -->
<?php
if(isset($_POST['submit0']))
{
  $usn=$_POST['usn'];
  $password=$_POST['password1'];
  $sd="insert into student (usn,password) values('$usn','$password')";
  $result=mysqli_query($conn,$sd) or die(mysqli_error($conn));
  if($result)
  {  $i=1;
    $j=1;
      while($j<=8)
      { 
        $f=$i.$j;
        $ss="insert into result(rusn,fcode,ccode,scode) values ('$usn','$f','$f','$f')";
        $resu=mysqli_query($conn,$ss) or die(mysqli_error($conn));
          if($resu)
          {
            $sa="insert into attenden(musn,mcode) values ('$usn','$f')";
            $final=mysqli_query($conn,$sa) or die(mysqli_error($conn));
           

          }
        $j++;
      }
      echo "successfully added";
  }
}
?>

</div>

</div>

</div>
</body>
</html>