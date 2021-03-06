<?php
session_start();
include("process.php");

	
	
?>

<!DOCTYPE html>
<html>
<head>
<title>
   LOGIN PAGE
   </title>
  
   </head>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<meta name="viewport" content="width=device-width">
<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"">
   <link rel="icon" href="login22.jpg"> 
   
    
   <style>
 

   a:link{color:red;
       font-weight:bold;}
	   a:hover{color:brown;}
	   a:active{color:green;}
	   p {
	      color:white;}
		  body{
		  background:url('login.jpg') center fixed;
		  background-repeat:no-repeat;
		  background-size:cover;
		  }
		  span {
		  color:violet;
		  
		   }
		    .first{
			  background:none;
	              border:none;
		       
				outline:none;
		        color:white;
		        font-size:20px;
		   }
		   .first:hover{
		    border-bottom:1px solid gold;}
			input:focus
			{
			  border:3px solid green;
			  
			}
		 form{background-color:rgba(0,0,0,0.6);}
		
		 
	
		 .ph{color:red;
		   text-transform:uppercase;
		    text-align:center;}
			.success{
   margin:auto;
   width:100%;
   color:gold;
   height:200px;
   text-align:center;
text-transform:uppercase;
 position:relative;
}
	.loginfail{
   margin:auto;
   width:100%;
   color:#AED6F1 ;
    background-color:rgba(0,0,0,0.5);
    position:relative;
   text-align:center;
text-transform:uppercase;
}
.passfail{
   margin:auto;
   width:100%;
   color:red ;
    background-color:rgba(0,0,0,0.5);
   position:relative;
   text-align:center;
text-transform:uppercase;
}
.logout{
   margin:auto;
   width:100%;
   
   position:absolute;
   left:0%;
   top:10%;
   color:blue ;
    
   font-size:20px;
   text-align:center;
text-transform:uppercase;
}
.col-12{
	max-width:500px;
	margin: auto;
}
		  </style> 
		  <?php
		
	   if(isset($_POST['submit']))
	   { 
   
          
	    $username=$_POST['user'];
	$password=$_POST['pass'];
	$username=mysqli_real_escape_string($conn,$username);
	$password=mysqli_real_escape_string($conn,$password);
	  if($username=="" || $password =="")
	  { echo "<h1 class=\"ph\">enter credentials properly</h1>";
  }
  else{
	      
				
		     $result=mysqli_query($conn,"select * from users where email='$username' and password='$password'")
                          or die("failed to connect".mysqli_error());
						  $row=mysqli_fetch_array($result);
                               if($row['email']==$username && $row['password']==$password)
							   {
								   $_SESSION['username']=$row['username'];
								   $_SESSION['email']=$row['email'];
								   $_SESSION['image']=$row['image'];
								   
								   
								   
							   header("location:submit.php");
							    if(isset($_POST['check']))
			{                      setcookie("cookie_name",$username,time()+(10*365*24*60*60));
								   setcookie("cookie_pass",$password,time()+(10*365*24*60*60));
			}

			
			
			                    }
							
							
							    else   echo " <h1 class=\"ph\"> invalid username or password unsuccessful </h1>";
	}
			
	   
	   
	   
	   
	   
	   
	   }
	 
	   ?>
		<body>
		
        
	    <div class="success">
      <h1><?php echo @$_GET["success"];?></h1>
      
</div>
<div class="logout">
      <h1><?php echo @$_GET["logout"];?></h1>
      
</div>
<div class="container">
  <div class="row ">
    <div class="col-12">
	
	   <form name="login" action="" method="post">
	   
	   <h1 style="color:violet;text-align:center;">LOGIN HERE</h1>
	         <p style="text-align:center;font-weight:bold;">Email<br /><br /><span class="fa fa-user"><input type="email"  id="user"  class="form-control" name="user" value="<?php if(isset($_COOKIE['cookie_name']))echo $_COOKIE['cookie_name'];?>"/></span></p><br /><br /><br />
			 <p style="text-align:center;font-weight:bold;">Password<br /><br /><span class="fa fa-lock"><input type="password" id="pass"  class="form-control" name="pass" value="<?php if(isset($_COOKIE['cookie_pass']))echo $_COOKIE['cookie_pass'];?>"/></span></p>
			<p class="text-center"> <input type="checkbox" name="check" class="form-check-input" id="checker"><label for="checker">Remember me</label></p>
	   <center> <input type="submit" id="btn" name="submit"  class="btn btn-success btn-lg"/></center>
		
		</form>

	   </div>
	    <!-- <div class="col-lg">
	   
	
	   <form name="login" action="process1.php" method="post">
	   <div class="loginfail">
      <h1><?php echo @$_GET["loginfail"];?></h1>
      
</div>
<div class="passfail">
      <h1><?php echo @$_GET["passfail"];?></h1>
      
</div>
	   <h1 style="color:violet;text-align:center;">SIGN UP HERE</h1>
	         <p style="text-align:center;font-weight:bold;">USERNAME<br /><br /><span class="fa fa-user"><input type="text"  class="form-control" placeholder="only letters" id="user" name="user" value="" required pattern="^[A-Za-z]+"/></span></p><br />
			 <p style="text-align:center;font-weight:bold;">PASSWORD<br /><br /><span class="fa fa-lock"><input type="password"  class="form-control" id="pass" name="pass" value="" required pattern="^[A-Za-z0-9@]+"/></span></p>
			 <p style="text-align:center;font-weight:bold;">CONFIRM PASSWORD<br /><br /><span class="fa fa-lock"><input type="password" class="form-control" id="con" name="con" value="" required pattern="^[A-Za-z0-9@]+"/></span></p>
			 
			 <p style="text-align:center;font-weight:bold;">email<br /><br /><span class="fa fa-envelope"><input type="email" id="em"  class="form-control" name="em" value="" /></span></p>
			
			 
	   <center> <input type="submit" id="btn" class="btn btn-success btn-lg"/></center>
		
		
		</form>
	
	   </div> -->
	   </div>
	   </div>
	
	   
	   </body>
	   </html>
	   
		