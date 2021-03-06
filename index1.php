<!DOCTYPE html>
<html lang="en">
<head>
<title></title>
<meta name="viewport" content="width=device-width">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</head>
<style>
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





</style>
<body>
<header class="text-center">
  Admin page
</header>

			
			<ul class=" nav nav-tabs nav-fill">
			 <li class="nav-item ">
			   <a class="nav-link " href="#student" >MAIN</a></li>
			   <li class="nav-item "><a class="nav-link"  href="syllabus.php">SYLLABUS</a></li>
			    
			   </ul>
         
			  </nav>
<div class="tab-content">
<div class="container " id="student">
  <h1 class="text-center">Add New Users</h1>
  <h1>This is for Student</h1>

 

Add cie-1 for New Courses or for Freshers
 <form method="post" action="">
   <input type="text" name="usn1" required placeholder="USN">
   <input type="text" name="cie" required placeholder="CIE">
   <input type="text" name="sem" required placeholder="SEM">
  
   <input type="text" name="fcode1"  required placeholder="CODE">
   
  <button class="btn btn-success btn-small" name="submit1">Submit</button>


  </form>
 
  <?php
  if(isset($_POST['submit1'])){
 include("process.php");
 $usn=$_POST['usn1'];
 $code=$_POST['fcode1'];
 $sem=$_POST['sem'];
 $cie=$_POST['cie'];

 $sl="insert into  result(rsem,fcode,cie1,rusn) values('$sem','$code','$cie','$usn') ";
 $result=mysqli_query($conn,$sl)
   or die(mysqli_error($conn));
   if($result){
       echo "success";
   }
  }
?>
 </br>
 </br>
  
  Update results
   
  <form method="post" action="">
   <input type="text" name="usn" required placeholder="USN">
   <input type="text" name="cie"placeholder="CIE1">
   <input type="text" name="fcode"  placeholder="CODE">
   <input type="text" name="cie2" placeholder="CIE2">
   <input type="text" name="ccode"  placeholder="CODE">
   <input type="text" name="see"  placeholder="SEE">
   <input type="text" name="scode"  placeholder="CODE">
  <button class="btn btn-success btn-small" name="submit2">Submit</button>


  </form>
<?php
include("process.php");
 if(isset($_POST['submit2']))
 {$usn=$_POST['usn'];
 $cie=$_POST['cie'];
 $fcode=$_POST['fcode'];
 $cie2=$_POST['cie2'];
 $ccode=$_POST['ccode'];
 $see=$_POST['see'];
 $scode=$_POST['scode'];
  if(!empty($cie && $fcode))
  {    $tcode=$fcode;
       $fcode=$fcode-10;

        $sl="update result set cie1='$cie',fcode='$tcode' where rusn='$usn' and scode='$fcode'";
        $result=mysqli_query($conn,$sl)
         or die(mysqli_error($conn));

  }
  
   if(!empty($cie2 && $ccode))
   {
    $sl="update result set cie2='$cie2',ccode='$ccode' where rusn='$usn' and fcode='$ccode'";
    $result=mysqli_query($conn,$sl)
     or die(mysqli_error($conn));
     if($result)
     {
         echo "success";
     }

   }
  if(!empty($see && $scode))
  {
    $sl="update result set see='$see',scode='$scode' where rusn='$usn' and fcode='$scode'";
    $result=mysqli_query($conn,$sl)
     or die(mysqli_error($conn));

  }
  

 }





?>
</div>
</br>
 </br>
          <!-- lecturers -->

<div class="container " id="lecturer">
<h1>For lecturers</h1>
<form method="post" action="">
   <input type="email" name="email" required placeholder="EMAIL">
    
   <input type="password" name="password"  required placeholder="PASSWORD">
   
   
  <button class="btn btn-success btn-small" name="submit3">Submit</button>


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



</div>

</div>


</body>
</html>