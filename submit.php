<?php
session_start();
ob_start();
if(!isset($_SESSION['email']))
{
	header("location:second.php");
	
}
else if(!isset($_SERVER['HTTP_REFERER'])){
   
    header('location:second.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>
      details
	  
	  </title>
	  </head>
	 

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<meta name="viewport" content="width=device-width,initial-scale=1">
<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	  <style>
	
	   #profile td 
	   {
		   color:black;
		   }
		   #profile .tab{ 
	  background-color:rgba(0,0,0,0.5);
		   margin:0px auto;
		    width:100%;
			max-width:800px;
		  font-size:20px;
		 font-weight:200;
		 font-style:vardana;
		 color:black;
		 
		  
	  }
	  @media only screen and (max-width:500px)
	  {
		#profile .tab
		  {  margin:auto;
			  max-width:500px;
			  left:0%;
			  font-size:18px;
			  
		  }
		  
		  #profile form{
			  max-width:220px;
		  }
	  }
	   
	  #profile form{
	
	width:100%;
}	
	 #profile a{
		 color:black;
	 }
	 #profile a:link{
		text-decoration:none;
	 }
#profile img{
			max-width:200px;
           
			width:100%;
			
		}     
		#profile .page-header
		{  
		  font-size:30px;
		  color:green;
		  font-style:vardana;
		  font-weight:bold;
			background-color:lime;
		}
		
		/* answering */
		#answering table{
	max-width:100px;
	text-transform:uppercase;
	font-size:20px;
	font-style:vardana;
	margin:auto;
	font-weight:bold;
}
#answering textarea{
	height:100px;
	width:300px;
	
}
#answering .heading{
	width:100%;
	font-size:20px;
	font-weight:bold;

}
#answering .left{
	left:0%;
	position:relative;
}
@media only screen and (max-width:500px){
	#answering textarea{
  width:120px;
	}
	
}
   /* semester handling column */
#handling .first{
                 background-color:white;
                 border:1px solid grey;
                 border-radius:5px;
                 box-shadow:2px 1px 2px 1px black;
                 margin:150px auto;
                 
                 font-size:25px;
                 font-weight:300;
                 font-family:verdana,sans-serif;
                 letter-spacing:5px;
                 color:#5DADE2 ;
             }
             
			 #handling .second,.inner{
                 margin-bottom:13px;
             }
		/* announcement column	  */
#announce form {
    width:100%;
}
#announce .form-control {
    font-size:25px;
}
#announce .first {
    margin:200px auto;
}
#announce .area {
 padding:20px;
}
#announce .card-header 
{
    font-size:25px;
    font-weight:100px;
    color:#4A235A ;
}
#announce .card-body {
    background-color:#AED6F1;
}

			 </style>
			 <script>
  function read()
  {    
     document.getElementById("input1").readOnly=false;   
    
     document.getElementById("input2").readOnly=false;   
     document.getElementById("input3").readOnly=false;   
     document.getElementById("input4").readOnly=false;   
     document.getElementById("input5").readOnly=false;   
     document.getElementById("input6").readOnly=false;   
     document.getElementById("input7").readOnly=false;   
     document.getElementById("submitinput").style.display="inline";

  }
                
 
</script>

	  <body>
      <!-- <nav class="navbar navbar-expand-md bg-dark navbar-dark" >
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
             <span class="navbar-toggler-icon"></span>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
		        <ul class="nav nav-tabs nav-fill navbar-nav">
           <li class="nav-item  "><a class="nav-link " data-toggle="tab" href="#profile">Profile</a></li>
           <li class="nav-item "><a class="nav-link" data-toggle="tab" href="#answering">Question from Students</a></li>
           <li class="nav-item "><a class="nav-link" data-toggle="tab" href="#handling">Handling Semester</a></li>
           <li class="nav-item "><a class="nav-link" data-toggle="tab" href="#announce">Announce</a></li>
            <li class="nav-item"><a href='logout.php' class="nav-link"><button class="btn btn-danger">Logout</button></a></li>
            </ul>
        </div>       

      </nav>
  -->
  <nav class="navbar navbar-expand-sm nav-fill navbar-dark bg-dark justify-content-center">
  

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav nav nav-pills nav-fill">
    <li class="nav-item   <?php echo $_GET['id']==('answering'||'handling'||'announce')?'':'active'; ?>"><a class="nav-link " data-toggle="tab" href="#profile">Profile</a></li>
           <li class="nav-item "><a class="nav-link" data-toggle="tab" href="#answering">Question from Students</a></li>
           <li class="nav-item "><a class="nav-link" data-toggle="tab" href="#handling">Handling Semester</a></li>
           <li class="nav-item "><a class="nav-link" data-toggle="tab" href="#announce">Announce</a></li>
            <li class="nav-item"><a href='logout.php' class="nav-link"><button class="btn btn-danger">Logout</button></a></li>
    </ul>
  </div>
</nav>
  
	 <!-- Main profile  -->
      <?php
      

      
	      include("process.php");
		  $email=$_SESSION['email'];
		  $sl="select * from users where email='$email'";
		  $res=mysqli_query($conn,$sl);
		  $row=mysqli_fetch_array($res);
		  if($row)
	   
	   {
	     $_SESSION['email']=$row['email'];
	    $_SESSION['username']=$row['username'];
	  ?>
<div class="tab-content">
	 <div class="container tab-pane <?php echo $_GET['id']==('answering'||'handling'||'announce')?'fade':'active'; ?>"  id="profile">
	    <div class="page-header text-center ">
		<?php echo @$_GET['success'];?>
		</div>
	 
	      <table border="5" cellpadding="30px"  class="table table-sm table-md-6 table-lg-12 " width="100%" style="border-collapse:collapse;border-color:7px solid gold;"
		   <table border="5" cellpadding="30px"  width="100%" style="border-collapse:collapse;border-color:7px solid gold;">
		   <tr><th colspan="2" style="color:white;background-color:black;width:100%;text-align:center;text-transform:uppercase;font-size:30px;letter-spacing:3px;"> WELCOME-<?php echo $row['username'];?></br>YOUR DETAILS</th></tr>
		   
		   <tr><td><center><?php echo "<img src='images/".$row['image']."'>"?></center></td></tr>
		   <tr>
			
			 <td rowspan="5" >
			 <form action="process2.php" method="post" enctype="multipart/form-data">NAME:
			  
			  <input type="text" name="name"  class="form-control" id="input1" placeholder="NAME" readonly  value="<?php echo $row['username'];?>" size="30"><hr>
			   DATE OF BIRTH:<input type="date"  name="birth" id="input7" class="form-control" value="<?php echo $row['birth'];?>" size="30" readonly><br /><hr>
				  DATE OF JOINING:
				  
				<input type="date" name="dat"  class="form-control" id="input2" readonly value="<?php echo $row['dat'];?>" size="30"><hr>QUALIFICATION:<input readonly id="input3"  type="text" name="tet" class="form-control" value="<?php echo $row['qual'];?>" size="25"><br /><hr>
				 DESIGNATION:<input type="text"  class="form-control" id="input4" readonly placeholder="" name="designation" value="<?php echo $row['designation'];?>" size="30"><hr><p></p>ADDRESS:<textarea readonly id="input5" name="address" ><?php echo $row['address'];?></textarea><br /><hr>
				 <p align="center-right">UPLOAD IMAGE:<input type="file" readonly id="input6" name="image" value="<?php echo $row['image']['name']?>"</p>
				 <input type="submit" id="submitinput" style="display:none;"  value="Update" class="btn btn-success btn-lg btn-block"/>
				
				 <br />
				 <br />
			
				 </form>
				 
				<button class="btn btn-primary btn-lg btn-block" onclick="read()">Edit Profile</button>
        <!-- <input type="button"  onclick="window.print()" value="print"> -->
			  </td>
			  </tr>
			
				  
             
				  
	
				
				 
				  </table>

	   <?php
	   }
	   ?> 
	</div>
                                    <!-- answering the question -->

		<div class="container tab-pane <?php echo $_GET['id'] === 'answering' ? 'active' : ''; ?>"  id="answering">
<div class="card heading">

   <?php 
   
if(isset($_POST['submit1']))
{    $sq="select username from users where email='".$_SESSION['email']."'";
	 $result=mysqli_query($conn,$sq);
	 $row=mysqli_fetch_array($result);
	 $username=$row['username'];
	
	$sl="select * from question";
	$res=mysqli_query($conn,$sl);
	
	$i=1;
	while($row=mysqli_fetch_array($res))
	{
while($i<=$row['id'])
{   	if(!empty($_POST["answer_{$i}"]))
	{
	$ans=$_POST["answer_{$i}"];
	$email=$_SESSION['email'];
mysqli_query($conn,"update question set answers='$ans',answered='$username' where id={$i}");
header('location:submit.php?id=answering');
	}
    $i++;
 }
	}
}
?>
</div>

 <?php 
  $sq="select username from users where email='".$_SESSION['email']."'";
  $result=mysqli_query($conn,$sq);
  $row=mysqli_fetch_array($result);
  $username=$row['username'];	 
 $sl="select * from question
 
 join handling on section=sem1 or section=sem2 or section=sem3 or section=sem4 where semail='".$_SESSION['email']."' order by id desc";
 $result=mysqli_query($conn,$sl);
 while($row=mysqli_fetch_array($result))
 {    
      if ($username==$row['answered'])
		  $row['answered']='yourself';
	 ?>           

		<form action="" method="post">
		<div class="container">
	  <div class="card">
      <div class="card-header">
      <?php echo @$_GET['answer'];?>
      </div>
      <div class="card-body">
    <table class="table table-light table-striped table-bordered table table-sm">
	<thead>
	  <tr><td scope="col">question number</td><td scope="col"><?php echo $row['id'];?></td></tr>
	 
	  <tr><td scope="col">question</td><td scope="col"><?php echo $row['questions'];?></td></tr>
	   
       <tr><td scope="col">answer</td><td scope="col"><textarea name="answer_<?php echo $row['id'];?>" class="form-control" id="answer_<?php echo $row['id'];?>" ><?php echo $row['answers']?></textarea></td>
         <tr><td scope="col">questionby</td><td scope="col"><?php echo $row['questionby'];?>(<?php echo $row['section'];?>)</td></tr>
	   <tr><td scope="col">answered by(lecturer)</td><td scope="col"><?php echo $row['answered'];?></td></tr>
	   	  
	  <tr ><td scope="col" colspan="2"><input type="submit" name="submit1" class="btn btn-success btn-lg btn-block" value="submit"></td></tr
	 <tr><td> </td><td></tr>
	  
	<tr><td><hr></td><td><hr></td></tr>
	   </thead>
      </table>
 </div>
 </div>
	  </div>
	 
	  
	  </form>
	 <?php
 }
	   ?>
		</div>	  
    <!-- handling the semester -->
   <div id="handling" class="container tab-pane <?php echo $_GET['id']==='handling'?'active':'fade';?>">
    
   <div class="container">
             <div class="row">
                 
               <div class="col-xs-12 first ">
                <!-- content -->
                <?php 

                  $sl="select * from handling where semail='".$_SESSION['email']."'";
                  $result=mysqli_query($conn,$sl) or die(mysqli_error($conn));
                  while($row=mysqli_fetch_array($result))
                
                  {
                  ?>
                 <form action="" method="post">
                  <!-- another row inside column -->
                      <div class="row second">
                         
                           <div class="col-12"> <b >Update Your Alloted Semesters with Sections</b></div>
                     
                          
                        <div class="col-12 col-md-6 inner">
                        <input type="text" class="form-control" name="sem1" value="<?php echo $row['sem1']?>"placeholder="Semester With Section-1">
                        </div>
                        <div class="col-12 col-md-6 inner" >
                        <input type="text" class="form-control" name="sub1" value="<?php echo $row['sub1']?>" placeholder="Subject-1">
                        </div>
                        <div class="col-12 col-md-6 inner">
                        <input type="text" class="form-control" name="sem2" value="<?php echo $row['sem2']?>"placeholder="Semester With Section-2">
                        </div>
                        <div class="col-12 col-md-6 inner">
                        <input type="text" class="form-control" name="sub2" value="<?php echo $row['sub2']?>" placeholder="Subject-2">
                        </div>
                        <div class="col-12 col-md-6 inner">
                        <input type="text" class="form-control" name="sem3" value="<?php echo $row['sem3']?>" placeholder="Semester With Section-3">
                        </div>
                        <div class="col-12 col-md-6 inner">
                        <input type="text" class="form-control" name="sub3"  value="<?php echo $row['sub3']?>" placeholder="Subject-3">
                        </div>
                        <div class="col-12 col-md-6 inner">
                        <input type="text" class="form-control" name="sem4" value="<?php echo $row['sem4']?>" placeholder="Semester With Section-4">
                        </div>
                        <div class="col-12 col-md-6 inner">
                        <input type="text" class="form-control" name="sub4" value="<?php echo $row['sub4']?>" placeholder="Subject-4">
                        </div>
                        <div class="col-12  inner">
                        <button class="btn btn-success btn-lg btn-block" name="submit2">Submit</button>
                        </div>
                    </div>  
                  </form> 
                 <?php
                  }
                ?>
             </div>  
          </div> 
        </div>
        <?php 
     if(isset($_POST['submit2']))
          {
            $email=$_SESSION['email'];
           $sem1=strtoupper($_POST['sem1']);
           $sem2=strtoupper($_POST['sem2']);
           $sem3=strtoupper($_POST['sem3']);
           $sem4=strtoupper($_POST['sem4']);
           $sub1=$_POST['sub1'];
           $sub2=$_POST['sub2'];
           $sub3=$_POST['sub3'];
           $sub4=$_POST['sub4'];
           $email=$_SESSION['email'];
           
           $sl="update handling set sem1='$sem1',sem2='$sem2',sem3='$sem3',sem4='$sem4',sub1='$sub1',sub2='$sub2',sub3='$sub3',sub4='$sub4' where semail='$email'";
           
            $result=mysqli_query($conn,$sl) or die(mysqli_error($conn));
            if($result)
            {
              ?>
             <script>
        swal({ title: "Updated!",
 text: "Successfully Updated!",
 icon: "success"}).then(okay => {
   if (okay) {
    window.location.href = "submit.php?id=handling";
  }
});
        </script>
              <?php
            

               
            }
             else{
              ?>
            
             
                
                 

             <script>
        swal({ title: "Not Updated!",
 text: "Sorry Not Updates!",
 icon: "warning"}).then(okay => {
   if (okay) {
    window.location.href = "submit.php?id=handling";
  }
});
        </script>
                
            
              
              
              <?php
             

               
            }
          }
         ?>
 


   </div>
      <!-- announcement column -->
   <div class="container tab-pane <?php echo $_GET['id']==='announce'?'active':'fade';?>" id="announce">
   <div class="container">
    <div class="row first">
           <div class="col-sm-7 column" style="margin:auto;">
                 <div class="card"> 
                 <div class="card-header text-center "><a href="submit.php"><i class="fa fa-home"></i></a>
                 <?php echo "<font color=green>".@$_GET['success']."</font>"?></div>
                    <div class="card-header text-center ">
                   MAKE YOUR  ANNOUNCEMENTS HERE
                    </div>
                     <div class="card-body">
                         <form action="" method="post">
                              <input type="text" placeholder="Send To" name="to" class="form-control" required></br>
                              <textarea name="text" placeholder="Type Here" class="form-control area" required></textarea></br>
                              <center><button name="submit3" class="btn btn-success btn-lg">submit</button></center>
                         </form>
                      </div>
                 </div>
          </div>
     </div>
 </div>
<?php 
if(isset($_POST['submit3']))
{  $sq="select username from users where email='".$_SESSION['email']."'";
  $result=mysqli_query($conn,$sq);
  $row=mysqli_fetch_array($result);
  $username=$row['username'];
   $to=$_POST['to'];
   $text=$_POST['text'];
   
   $email=$_SESSION['email'];
   $to=strtoupper($to);
   $so="insert into announce(sendto,announcer,text,email) values('$to','$username','$text','$email')";
   if(mysqli_query($conn,$so))
  {   

       ?>
      <script>       
     swal({
       title:"Successfully Sent",
       text:"You Have Successfully Sent The Message",
       icon:"success"}).then(okay=>{
         if(okay){
           window.location.href="submit.php?id=announce";
         }

       });


    </script>

    <?php
	  
	 
   }
else
{
?>
<script>
swal({
 title:"Not Sent",
 text:"You Have Not Sent The Message",
 icon:"warning"}).then(okay=>{
   if(okay){
     window.location.href="submit.php?id=announce";
   }

 });


</script>

<?php
}
}
?>
   


   </div>	  
 </div>	  
</body>
</html>