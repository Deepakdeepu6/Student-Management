<?php
session_start();
ob_start();
include("process.php");
if(!isset($_SESSION['usn'])){
   
    header('location:student.php');
    exit;
}
else if(!isset($_SERVER['HTTP_REFERER'])){
   
    header('location:student.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>


<style>
.head{
	text-transform:uppercase;
	font-size:30px;
	font-weight:bold;
	font-style:vardana;
	letter-spacing:10px;
	
}
label{
	
	font-size:30px;
	font-weight:bold;
	font-style:vardana;
	color:black;
	word-spacing:10px;
}
#question{
height:100px;
	max-width:500px;
	width:100%;
	margin:auto;
}
.para{
	color:black;
	font-style:italic;
}

 li a
{
	display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  margin-left:17px;
  text-decoration: none;
  font-size:20px;
  font-family:verdana;
  background-color:white;
  font-weight:bold;

}
a:hover{
	transform:scale(1.1);
}
a:link{
	text-decoration:none;
	color:white;
}
#profile form {
		color:black;
		font-weight:bold;
		font-style:verdana;
		width:100%;
	  }
	#profile{
    transform:scale(0.8);
    margin-top:0%;
  }
	
	 
	  #profile	img{
      margin-top:10%;
			max-width:300px;
			width:100%;
			height:300px;
		}     
		#profile .page-header
		{  
		  font-size:30px;
		  color:green;
		  font-style:vardana;
		  font-weight:bold;
			/* background-color:lime; */
		}
		
		#profile .section 
		{
			width:100px;
		}
		#profile a:link{
			text-decoration:none;
		}
		#profile .container-fluid{
		  width:100%;
      transform:scale(1.1);
      max-width:900px;
      /* margin-top:60px; */
      margin-bottom:60px;
			border:1px solid black;
			box-shadow:2px 2px 2px 2px grey;
      top:0px;
      background-color:#ffffff;
		}
    @media only screen and (max-width:600px)
    { #profile img
      {
        margin-top:10%;
			max-width:250px;
			width:100%;
			height:250px;
      }
    }
		#profile  {
		margin:auto;
    
		}
		
		#attendence header
{
    text-align:center;
    font-size:30px;
    font-weight:bold;
    font-family:verdana;
    color:white;
    letter-spacing:10px;
    background-color:#4EABE9;
    text-transform:uppercase;
}
/* #attendence {
    background-image:linear-gradient(to left,#A9CCE3 ,#2980B9  );
} */
#attendence .container {
   
    margin:10px auto;
   
    text-align:center;
}
#attendence table 
{
    text-transform:uppercase;
    border:2px solid black;
    
     font-size:20px;
}
#attendence table tr:hover td {
   
   transform: scale(1.1);
}
#cie1 header
{
    text-align:center;
    font-size:30px;
    font-weight:bold;
    font-family:verdana;
    color:white;
    letter-spacing:10px;
    background-color:#1ABC9C;
    text-transform:uppercase;
}
/* #cie {
    background-image:linear-gradient(to left,#7FB3D5  ,#E8F8F5   );
} */
#cie1 .container {
   
    margin:10px auto;
    max-width:400px;
    text-align:center;
}
#cie1 table 
{
    text-transform:uppercase;
    border:2px solid black;
    
     font-size:20px;
}
#cie1 table tr:hover td {
   
   transform: scale(1.1);
}
#see header
{
    text-align:center;
    font-size:30px;
    font-weight:bold;
    font-family:verdana;
    color:white;
    letter-spacing:10px;
    background-color:#4EABE9;
    text-transform:uppercase;
}
/* #see{
    background-image:linear-gradient(to left,#A9CCE3 ,#2980B9  );
} */
#see .container {
   
    margin:10px auto;
   
    text-align:center;
}
#see table 
{
    text-transform:uppercase;
    border:2px solid black;
    
     font-size:20px;
}
#see table tr:hover td {
   
   transform: scale(1.1);
}
#announce .page-header {
    background-color:#59A1D1 ;
    text-align:center;
    font-family:verdana;
    font-size:30px;
    font-weight:bold;
    letter-spacing:5px;
    color:white;
}
#announce .card 
{
    max-width:800px;
    margin:auto;
}
#announce .card-header 
{
    text-align:center;
    
    font-size:25px;
    font-weight:400;
    color:#388DC5 ;

}
#announce .card-body {
    font-size:20px;
    font-weight:200px;
    font-family:verdana;
    color:
}
#updatebutton{
  display:none;
}
</style>
<script >
function updating(){
 document.getElementById("update1").readOnly=false;
 document.getElementById("update2").readOnly=false;
 document.getElementById("update3").readOnly=false;
 document.getElementById("update4").readOnly=false;
 document.getElementById("update5").readOnly=false;
 document.getElementById("update6").readOnly=false;
 document.getElementById("update7").readOnly=false;
 document.getElementById("update8").readOnly=false;
 document.getElementById("update0").readOnly=false;
 document.getElementById("updatebutton").style.display="inline";
}

</script>




<body>
   <div class="container-fluid">
   <div class="card">
   <div class="card-header text-center head">
      
     
    <h1>WELCOME  <?php echo $_SESSION['susername'];?></h1>
    <h1> <?php echo $_SESSION['usn'];?></h1>
	    
	    </div>
		<div class="card-body ca-bo">
            <nav class=" navbar navbar-expand-md  navbar navbar-light bg-primary justify-content-center">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav nav nav-pills nav-fill">
			 <li class="nav-item active">
			   <a class="nav-link" href="#profile" data-toggle="tab">PROFILE</a></li>
			   <li class="nav-item active"><a class="nav-link" data-toggle="tab" href="#attendence">ATTENDENCE</a></li>
			   <li class="nav-item active"> <a class="nav-link" data-toggle="tab" href="#cie1">CIE1</a></li>
			   <li class="nav-item active"> <a class="nav-link" data-toggle="tab" href="#cie2">CIE2</a></li>
			   <li class="nav-item active"> <a class="nav-link" data-toggle="tab" href="#see">SEE</a></li>
			   <li class="nav-item active"> <a class="nav-link" data-toggle="tab" href="#announce">ANNOUNCEMENT</a></li>
			   <li class="nav-item active"> <a class="nav-link" data-toggle="tab" href="#question">Question</a></li>
			   <li class="nav-item active"> <a class="nav-link" data-toggle="tab" href="#syllabus">Syllabus</a></li>
			   <li class="nav-item active"> <a class="nav-link" href="logout.php"><button class="btn btn-danger btn-sm btn-block">Logout</button></a></li>
             
			   </ul>
         </div>
			  </nav>

		</div>
		</div>
		</div>

<div class="tab-content"> 
<!-- profile -->
   <div class="container tab-pane <?php  echo $_GET['id']==='success'?'fade':'active'?>" id="profile">

   <?php
	      include("process.php");
		  $user=$_SESSION['susername'];
		  $usn=$_SESSION['usn'];
		  $sl="select * from student where usn='$usn'";
		  $res=mysqli_query($conn,$sl);
		  $row=mysqli_fetch_array($res);
		  if($row)
	   
	   {
	  
	  
	  ?>
	 
	 
	    <div class="page-header text-center ">
		<a href="sprofile.php"><i class="fa fa-home"></i></a><?php echo @$_GET['id'];?>
		</div>
		<div class="container-fluid">
		 <div class="row">
     
		   <div class="col-md-12 ">
		     <div class="row">
           <div class="col-12 col-md-6 "
			 <center><?php echo "<img src='images/".$row['image']."'>
		       
		 
			   "?></center></div><div class="col-12 col-md-6">
				 
         <center><button onclick="updating();" class="btn btn-primary btn-sm"><i class='fa fa-edit fa-3x'></i></button></center></br>
		
			 <form action="profileupdate.php" method="post" enctype="multipart/form-data">
			 <center><input type="text" name="section" class="form-control  section" placeholder="SECTION:" readonly id="update0" value="<?php echo $row['section'];?>" readonly required></center>NAME:
			  
			  <input type="text" name="name"  class="form-control" id="update1" placeholder="NAME" value="<?php echo $row['username'];?>" size="30" readonly required><hr>
			   DATE OF BIRTH:<input type="date" name="birth" id="update2" class="form-control" value="<?php echo $row['date'];?>" size="30"  readonly required><br /><hr>
				  <hr>FATHER NAME:<input type="text" name="fname" id="update3" class="form-control" value="<?php echo $row['fname'];?>" size="25"readonly= required><br /><hr>
				MOTHER NAME:<input type="text"  class="form-control" id="update4" placeholder="" name="mname" value="<?php echo $row['mname'];?>" size="30"readonly required><hr><p></p>ADDRESS:<textarea name="address" readonly id="update8" required><?php echo $row['address']; ?></textarea><br /><hr>
				CONTACT NO:<input type="text" name="scontact" class="form-control" id="update5" value="<?php echo $row['scontact'];?>" size="25" readonly required><br /><hr>
                FATHER NO:<input type="text" name="fcontact" id="update6" class="form-control" value="<?php echo $row['fcontact'];?>" size="25" readonly required><br /><hr>
                MOTHER NO:<input type="text" name="mcontact" id="update7" class="form-control" value="<?php echo $row['mcontact'];?>" size="25" readonly required><br /><hr>
                 <p align="center-right">UPLOAD IMAGE:<input type="file" name="image" value="<?php echo $row['image']['name']?>"</p>
                 
				 <button name="submit12" id="updatebutton" class="btn btn-primary btn-sm "> Update</button>
				
				 <br />
				 <br />
				
				 </form>
          </div>
        </div>
			 </div>
			</div>
		 </div>
			
			 
			
	   <?php
	   
	   }
	   ?>
</div>
       <!-- attendence -->
    <div class="container tab-pane fade" id="attendence">
<?php 
$sl="select * from student where usn='".$_SESSION['usn']."'";
$res=mysqli_query($conn,$sl);
$row=mysqli_fetch_array($res);
$section=$row['section'];

?>


	<header>
 ATTENDENCE </br>
 CURRENT-SEMESTER-<?php echo $section?>
</header>

 <div class="container">
   <div class="row">
   <div class="col-md ">
<?php 
$minusn=substr($usn,3,4);
$num=20;
$scheme=$num.$minusn;
$s=substr($row['section'],0,1);
$usn=$_SESSION['usn'];
$sl="select section from student where usn='$usn'";
$res=mysqli_query($conn,$sl)
  or die(mysqli_error($res));
  $row=mysqli_fetch_array($res);
  {
      $s=substr($row['section'],0,1);
         
  }
  $sq="select * from attenden,scheme_course where musn='$usn' and course_code=mcode and scheme_year='$scheme' ";
   $result=mysqli_query($conn,$sq)
    or die(mysqli_error($conn));
    echo "<table class='table table-md  table-striped bg-light'>";
   echo " <tr><th scope='1'>SUBJECT</th><th>COURSE CODE</th><th>IN %</th></tr>";
    while($rows=mysqli_fetch_array($result))
    {  if($rows['attend']<85)
        {
        ?>
       <tr style="color:red;"><td> <?php echo $rows['course_name'];?></td><td><?php echo $rows['course_code'];?></td><td><?php echo $rows['attend'];?></td></tr>
     <?php 
        }
     else
     {
     ?>
         
     <tr style="color:green;"><td> <?php echo $rows['course_name'];?></td><td><?php echo $rows['course_code'];?></td><td><?php echo $rows['attend'];?></td></tr>
   
   
   <?php 
     }

    }
   echo "</table>";
?>
  </div>
</div>

</div>
    </div>

     <!-- cie1 -->
  <div class="container tab-pane fade" id="cie1">


  <header>
 CIE </br>
  CURRENT SEMESTER-<?php echo $section;?>
</header>

 <div class="container">
   <div class="row">
   <div class="col-xs  ">
<?php 
$usn=$_SESSION['usn'];
$minusn=substr($usn,3,4);
$num=20;
$scheme=$num.$minusn;
$sl="select section from student where usn='$usn'";
$res=mysqli_query($conn,$sl)
  or die(mysqli_error($res));
  $row=mysqli_fetch_array($res);
  {
      $s=substr($row['section'],0,1);
      
  }
  $sq="select * from result,scheme_course where rusn='$usn' and course_code=ccode and scheme_year='$scheme' ";
  $result=mysqli_query($conn,$sq)
   or die(mysqli_error($conn));
  echo "<table class='table table-md  table-striped bg-light'>";
  echo " <tr><th scope='1'>SUBJECT</th><th>COURSE CODE</th><th>CIE1</th></tr>";
   while($rows=mysqli_fetch_array($result))
   {  if($rows['cie1']<=20)
       {
       ?>
      <tr style="color:red;"><td> <?php echo $rows['course_name'];?></td><td><?php echo $rows['fcode'];?></td><td><?php echo $rows['cie1'];?></td></tr>
    <?php 
       }
    else
    {
    ?>
        
    <tr style="color:green;"><td> <?php echo $rows['course_name'];?></td><td><?php echo $rows['fcode'];?></td><td><?php echo $rows['cie1'];?></td></tr>
  
  
  <?php 
    }

   }
  echo "</table>";
  ?>
  </div>
</div>

</div>
 

</div>
  <div class="container tab-pane fade" id="cie2">




 
<?php

  $sq="select * from result,scheme_course where rusn='$usn' and course_code=ccode and scheme_year='$scheme' ";
  $result=mysqli_query($conn,$sq)
   or die(mysqli_error($conn));
  echo "<table class='table table-md  table-striped bg-light'>";
  echo " <tr><th scope='1'>SUBJECT</th><th>COURSE CODE</th><th>CIE2</th></tr>";
   while($rows=mysqli_fetch_array($result))
   {  if($rows['cie2']<=20)
       {
       ?>
      <tr style="color:red;"><td> <?php echo $rows['course_name'];?></td><td><?php echo $rows['fcode'];?></td><td><?php echo $rows['cie2'];?></td></tr>
    <?php 
       }
    else
    {
    ?>
        
    <tr style="color:green;"><td> <?php echo $rows['course_name'];?></td><td><?php echo $rows['fcode'];?></td><td><?php echo $rows['cie2'];?></td></tr>
  
  
  <?php 
    }

   }
  echo "</table>";
?>
















  </div>

















   <!-- see -->
   <div class="container tab-pane fade " id="see">

   <header>
  SEE</br>
  CURRENT SEMESTER-<?php echo $section;?>
</header>

 <div class="container">
   <div class="row">
   <div class="col-sm ">
<?php 
$usn=$_SESSION['usn'];
$sl="select section from student where usn='$usn'";
$res=mysqli_query($conn,$sl)
  or die(mysqli_error($res));
  $row=mysqli_fetch_array($res);
  {
      $s=substr($row['section'],0,1);
         
  }
  // $count=0;
  // $final=0;
  $sq="select * from result,scheme_course where rusn='$usn' and course_code=scode and scheme_year='$scheme'";
   $result=mysqli_query($conn,$sq)
    or die(mysqli_error($conn));
    echo "<table class='table table-md  table-striped bg-light'>";
   echo " <tr><th scope='1'>SUBJECT</th><th>COURSE CODE</th><th>SEE</th></tr>";
    while($rows=mysqli_fetch_array($result))
    { 
    //  $count=$count+$rows['credit'] ;
      if($rows['see']<4)
        {
        ?>
       <tr style="color:red;"><td> <?php echo $rows['course_name'];?></td><td><?php echo $rows['scode'];?></td><td><?php echo $rows['see'];?></td></tr>
       <?php $c=substr($rows['scode'],0,1);?>
        <!--  <?php $final=$final+($rows['credit']*$rows['see']);?> -->
     <?php 
        }
     else
     {
     ?>
         
     <tr style="color:green;"><td> <?php echo $rows['course_name'];?></td><td><?php echo $rows['scode'];?></td><td><?php echo $rows['see'];?></td></tr>
     <!-- <?php  $final=$final+($rows['credit']*$rows['see']);?> -->
     <?php $c=substr($rows['scode'],0,1);?>
   <?php 
     }

	}
	if(!empty($c)){
    // $points=$final/$count;
    echo "<tr><th> Semester</td><th></th><th>".$c."</th></tr>";
    // echo "<tr><th>Total Points</th><th>". substr($points,0,4)."</th></tr>";
  }
   echo "</table>";
  
   
?>
  </div>
</div>

</div>


   </div>
     <!-- announcement -->
	 <div class="container tab-pane fade" id="announce">
	 <?php
$usn=$_SESSION['usn'];
$se="select * from student where usn='$usn'";
$result=mysqli_query($conn,$se) or die(mysqli_error($conn));
$row=mysqli_fetch_array($result);
$section=$row['section'];

?>
<div class="page-header">
   ANNOUNCEMENTS FOR <?php echo $section;?>

</div>
<?php 

  $sl="select * from announce where sendto='$section' order by id desc";
  $res=mysqli_query($conn,$sl)
   or die(mysqli_error($conn));
   echo "<div class='container'>";
   echo "<div class='card'>";
   while($row=mysqli_fetch_array($res))
   {  ?>
   
        <div class="card-header">
       <small> <?php echo "<i>Posted on </i>:".$row['time']."</br>";?></small>
        <?php echo "From:".$row['announcer']."</br>";?>
        
        </div>
        <div class="card-body">
        <?php echo "&rarr;".$row['text']."</br>";?>
        </div>
      
       
    <?php 
 
   }
   echo "</div>";
    echo "</div>";
   
?>

	 </div>
 
             <!-- questions -->
		<div class="container-fluid tab-pane <?php echo $_GET['id']==='success'?'active':'fade'?>" id="question">
		<div class="card-footer text-center para">
		  <p>Post your questions and get the answer directly</p>
		
		
		</div>
	    
		
	<form method="post" action="">
	<div class="form-group text-center">
	
    <label for="question">TYPE YOUR QUESTIONS</label>: <textarea id="question" name="text"></textarea> 
	<button  type="submit" name="submit5" class="btn btn-primary mb-2">Submit</button>
  </div>
 </form>
 
        <?php
 $sl="select * from question order by id desc ";
 $res=mysqli_query($conn,$sl);
   
  while($row=mysqli_fetch_array($res))
  {  if($row['questionby']==$_SESSION['usn'])
	$row['questionby']="yourself";  
    
        ?>
		<div class="container">
		<div class="table-responsive">
    <table class="table table-dark table-bordered table table-md">
	<thead>
	  <tr><td scope="col"><ul> <li>question number</li></ul></td><td scope="col"><?php echo $row['id'];?></td></tr>
	  <tr><td scope="col"><ul> <li>question</li></ul></td><td scope="col"><?php echo $row['questions'];?></td></tr>
	  <tr><td scope="col"><ul> <li>answer</li></ul></td><td scope="col"><?php echo $row['answers'];?></td></tr>
	  <tr><td scope="col"><ul> <li>question from </li></ul></td><td scope="col"><?php echo $row['questionby'];?></td></tr>
	  <tr><td scope="col"><ul> <li>answered by(lecturer)</li></ul></td><td scope="col"><?php echo $row['answered'];?></td></tr>
	  
	  <tr><td><hr></td><td><hr></td></tr>
	   </thead>
	  </table>
	 </div>
	 </div>
	  <?php
	  
		 
  }
?>  
 </div>
  <!-- syllabus -->
<div class="container tab-pane fade" id="syllabus">
  <?php
$sl="select * from scheme_course where scheme_year='$scheme' and course_sem='$s'";
$result=mysqli_query($conn,$sl) or die(mysqli_error($conn));
echo "<div class='container-fluid table-responsive'>";
echo "<table class='table table-sm table-striped table-bordered' style='max-width:600px;width:100%;margin:auto;'>";
echo "<tr><th>SEM</th><th>COURSE_CODE</th><th>COURSE_NAME</th></tr>";
while($row=mysqli_fetch_array($result))
{   ?>
      
       
    <tr><td><?php echo $row['course_sem'] ;?></td>
    <td> <?php  echo $row['course_code'] ;?></td>
  
    <td><?php  echo $row['course_name'];?></td>
    <td><?php if(!empty($row['files'])){echo "<a href='syllabusfiles/".  $row['files']."'>dowload</a>";}?></td>
    
    </tr>

   



    
<?php 

}
echo "</tr>";
echo "</table>";
echo " </div>";

?>
</div>
<!-- end of tab-content -->
		 </div>
		 <?php
if(isset($_POST['submit5']))
{   

  $section=$_SESSION['section'];
        $usn=$_SESSION['usn'];
	 $text=$_POST['text'];
	 if(!empty($text))
	 {
	  $sq="INSERT INTO question (id,questions,questionby,section) values ('','$text','$usn','$section')";
	 
	    if( mysqli_query($conn,$sq))
		header("location:sprofile.php?id=success");
         else
			 die("sorry not added".mysqli_error($conn));
	 }
	 else{
		 echo "<script>alert('you can't submit! coz question field is empty');</script>";
	 }
                   		 
}




?>
		 
</body>


</html>