<?php
session_start();
if(!isset($_SESSION['username']))
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
<meta name="viewport" content="width=device-width">
<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

  
	  <style>
	  a{color:white;
	   text-decoration:none;
	   font-size:20px;
	   font-weight:bold;
	   }
	   a:link{color:violet;
	   font-weight:bold;}
	   

	   a:active{color:violet;}
	   body
	   {
		   background:url(det.jpg) no-repeat center fixed;
	   background-size:cover;
	   }
	   td 
	   {
		   color:white;
		   }
	  .tab{ 
	  background-color:rgba(0,0,0,0.5);
		   margin:0px auto;
		    width:100%;
			max-width:800px;
		  font-size:20px;
		 font-weight:200;
		 font-style:vardana;
		 color:white;
		 
		  
	  }
	  @media only screen and (max-width:500px)
	  {
		  .tab
		  {  margin:auto;
			  max-width:500px;
			  left:0%;
			  font-size:18px;
			  
		  }
		  
		  form{
			  max-width:220px;
		  }
	  }
	   
form{
	
	width:100%;
}	
	 
		img{
			max-width:120px;
			width:100%;
			height:120px;
		}     
		.page-header
		{  
		  font-size:30px;
		  color:green;
		  font-style:vardana;
		  font-weight:bold;
			background-color:lime;
		}
		table{
			background-color:rgba(0,0,0,0.5);
		}
		a:link{
			text-decoration:none;
		}
			 </style>
			 
			
	  <body>
	  <?php
	      include("process.php");
		  $user=$_SESSION['username'];
		  $sl="select * from users where username='$user'";
		  $res=mysqli_query($conn,$sl);
		  $row=mysqli_fetch_array($res);
		  if($row)
	   
	   {
	     $_SESSION['email']=$row['email'];
	    $_SESSION['username']=$row['username'];
	  ?>
	 <div class="container-fluid">
	    <div class="page-header text-center ">
		<?php echo @$_GET['success'];?>
		</div>
	 
	      <table border="5" cellpadding="30px"  class="table table-sm table-md-6 table-lg-12 " width="100%" style="border-collapse:collapse;border-color:7px solid gold;"
		   <table border="5" cellpadding="30px"  width="100%" style="border-collapse:collapse;border-color:7px solid gold;">
		   <tr><th colspan="2" style="color:white;background-color:black;width:100%;text-align:center;text-transform:uppercase;font-size:30px;letter-spacing:3px;"> WELCOME-<?php echo $row['username'];?></br>YOUR DETAILS</th></tr>
		   <tr>
			<th>
		    
			  <a href="answering.php" id="ww"><b>1.questions  from student</b></a>
			  
			  </th>
			 <td rowspan="5" >
			 <form action="process2.php" method="post" enctype="multipart/form-data">NAME:
			  
			  <input type="text" name="name"  class="form-control" placeholder="NAME" value="<?php echo $row['username'];?>" size="30"><hr>
			   DATE OF BIRTH:<input type="date" name="birth"  class="form-control" value="<?php echo $row['birth'];?>" size="30"><br /><hr>
				  DATE OF JOINING:
				  
				<input type="date" name="dat"  class="form-control" value="<?php echo $row['dat'];?>" size="30"><hr>QUALIFICATION:<input type="text" name="tet" class="form-control" value="<?php echo $row['qual'];?>" size="25"><br /><hr>
				 DESIGNATION:<input type="text"  class="form-control" placeholder="" name="designation" value="<?php echo $row['designation'];?>" size="30"><hr><p></p>ADDRESS:<textarea name="address" ><?php echo $row['address'];?></textarea><br /><hr>
				 <p align="center-right">UPLOAD IMAGE:<input type="file" name="image" value="<?php echo $row['image']['name']?>"</p>
				 <input type="submit"   value="Update" class="btn btn-success btn-lg btn-block"/>
				
				 <br />
				 <br />
				<input type="button" onclick="window.print()" value="print">
				 </form>
				 <a href='index.html'><button class='btn btn-warning btn-lg btn-block'>Logout</button></a>
				 
				
               
			  </td>
			  </tr>
			  <tr>
			  <th>
			      <a href="announcement.php" id="ww"><b>2.Announce</b></a>
				  </th> 
				 
				  
				  
				                   
				  </tr>
				  <tr>
				  <th>
				  <a href="handling.php" id="ww"><b>3.Handling semesters</b></a>
				  </th>
				  
				  </tr>
				  
				  <tr>
				  <th><a href="" id="ww">4.Teaching</a></th>
				 
				  </tr>
				  <tr>
				  <td><?php echo "<img src='images/".$row['image']."'>"?></td></tr>
             
				  
	
				
				 
				  </table>
			
			 </div>
			
			 
			
	   <?php
	   
	   }
	   ?>
			  
</body>
</html>