<?php
session_start();
include("process.php");
if(!isset($_SESSION['susername'])){
   
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

</head>

<?php
if(isset($_POST['submit']))
{       $section=$_SESSION['section'];
        $usn=$_SESSION['usn'];
	 $text=$_POST['text'];
	 if(!empty($text))
	 {
	  $sq="INSERT INTO question (id,questions,questionby,section) values ('','$text','$usn','$section')";
	 
	    if( mysqli_query($conn,$sq))
		header("location:sprofile.php");
         else
			 die("sorry not added".mysqli_error($conn));
	 }
	 else{
		 echo "<script>alert('you can't submit! coz question field is empty');</script>";
	 }
                   		 
}




?>
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

</style>
<body>
   <div class="container-fluid">
   <div class="card">
   <div class="card-header text-center head">
      
     
    <h1>WELCOME  <?php echo $_SESSION['susername'];?></h1>
    <h1> <?php echo $_SESSION['usn'];?></h1>
	    
	    </div>
		<div class="card-body ca-bo">
            <nav class=" navbar navbar-expand-md  navbar navbar-light bg-light ">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav nav nav-pills nav-fill">
			 <li class="nav-item active">
			   <a class="nav-link" href="profile.php" data-toggle="tab">PROFILE</a></li>
			   <li class="nav-item active"><a class="nav-link" data-toggle="tab" href="attendence.php">ATTENDENCE</a></li>
			   <li class="nav-item active"> <a class="nav-link" data-toggle="tab" href="cie.php">CIE</a></li>
			   <li class="nav-item active"> <a class="nav-link" data-toggle="tab" href="see.php">SEE</a></li>
			   <li class="nav-item active"> <a class="nav-link" data-toggle="tab" href="announce.php">ANNOUNCEMENT</a></li>
             
			   </ul>
         </div>
			  </nav>

		</div>
		<div class="card-footer text-center para">
		  <p>Post your questions and get the answer directly</p>
		 <a href="slogout.php"> <button type="submit" name="submit" class="btn btn-primary mb-2">Logout</button></a>
		</div>
	    </div>
		
	<form method="post" action="">
	<div class="form-group text-center">
	
    <label for="question">TYPE YOUR QUESTIONS</label>: <textarea id="question" name="text"></textarea> 
	<button type="submit" name="submit" class="btn btn-primary mb-2">Submit</button>
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
		 
</body>


</html>