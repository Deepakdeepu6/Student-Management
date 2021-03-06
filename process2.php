<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
session_start();
echo "success";
$conn=mysqli_connect("localhost","root","","login");
$qualification=$_POST['tet'];

$uname=$_POST['name'];
$dat=$_POST['dat'];
$designation=$_POST['designation'];
$birth=$_POST['birth'];
$address=$_POST['address'];
$qualification=mysqli_real_escape_string($conn,$qualification);

$date=mysqli_real_escape_string($conn,$dat);
$designation=mysqli_real_escape_string($conn,$designation);
$birth=mysqli_real_escape_string($conn,$birth);
$address=mysqli_real_escape_string($conn,$address);

$target="images/".basename($_FILES['image']['name']);
$image=$_FILES['image']['name'];
  
        if(!empty($qualification || $dat || $designation ||$birth || $address || $image || $uname))
     
	 {
		 if(!empty($_SESSION['image']) && empty($image))
		 
		 
		 
		 {
		 
    
        $sq="update users set username='$uname',qual='$qualification',birth='$birth',dat='$dat',designation='$designation',address='$address' where email='".$_SESSION['email']."'";
       
	  
	   if(mysqli_query($conn,$sq)){
		   
		?><script>
		swal({
		   title:"success",
		   icon:"success",
		   text:"You Have successfully Updated Your Profile"


		}).then(okay=>{
			if(okay)
			  {
				  window.location.href="submit.php?success=Successfully Updated";
			  }
		});

	   </script>
	 <?php
		
	   }

   else
	{echo "sorry there is a error".mysqli_error($conn);}
	  
	 }
	 else{
        $sq="update users set  username='$uname',image='$image',qual='$qualification',birth='$birth',dat='$dat',designation='$designation',address='$address' where email='".$_SESSION['email']."'";
        move_uploaded_file($_FILES['image']['tmp_name'],$target);
	  
	   if(mysqli_query($conn,$sq)){
           ?><script>
             swal({
                title:"success",
				icon:"success",
				text:"You Have successfully Updated Your Profile"


			 }).then(okay=>{
				 if(okay)
				   {
					   window.location.href="submit.php?success=Successfully Updated";
				   }
			 });
 
            </script>
		  <?php

	// header("location:submit.php?success=Successfully Updated");
		
	   }

   else
	{?><script>
		swal({
		   title:"Sorry",
		   icon:"Warning",
		   text:"Sorry to Say nothing has been Updated"


		}).then(okay=>{
			if(okay)
			  {
				  window.location.href="submit.php?success=Not Updated";
			  }
		});

	   </script>
	 <?php
	 }
	  
		 
	 }
	 
	 
	}

	 else
		 header("location:submit.php?success=Sorry Nothing To Update");
  








?>