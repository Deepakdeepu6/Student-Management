<?php
 include("process.php");
   $username=$_POST['user'];
   $password=$_POST['pass'];
   $confirm=$_POST['con'];
  
   $email=$_POST['em'];
   $confirm=mysqli_real_escape_string($conn,$confirm);
    $username=mysqli_real_escape_string($conn,$username);
   $password=mysqli_real_escape_string($conn, $password);
    $email=mysqli_real_escape_string($conn, $email);
   if($username=="" || $password=="" || $email==""){echo "enter all details in all the field";}
   else if($password== $confirm)
   {
	      
	    
	   
   $conn=mysqli_connect("localhost","root","","login");
     $sem="select * from users";
      $sres=mysqli_query($conn,$sem);     
       $rows=mysqli_fetch_array($sres);
	   if($rows['email']==$email)
	   {
		  header("location:second.php?loginfail=email id is already registered");
	   }
    else{
  
  
  
    $sq="INSERT INTO USERS (username,password,email) VALUES ('$username','$password','$email')";
       if(mysqli_query($conn,$sq))
	   { $to=$email;	 
		 $subject="Email verification";
		 $message="Registered ";
		 $headers = "From: infopedia.org4@gmail.com";
		 $headers .= "MIME-Version: 1.0" . "\r\n";
		 $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		 
		 mail($to,$subject,$message,$headers);
		
	
		 header("location:second.php?success=you are successfully registered,you can login now");
		  
   
          }
else
{die("sorry".mysqli_error());}
   }
   }
   else{
	    header("location:second.php?passfail=your password is not matching");
	  
          }

   






?>