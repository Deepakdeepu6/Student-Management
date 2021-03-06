<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php
session_start();
include("process.php");
if(isset($_POST['submit12']))
{
$fname=$_POST['fname'];
$name=$_POST['name'];
$mname=$_POST['mname'];
$birth=$_POST['birth'];
$address=$_POST['address'];
$scontact=$_POST['scontact'];
$fcontact=$_POST['fcontact'];
$mcontact=$_POST['mcontact'];
$section=$_POST['section'];
$fname=mysqli_real_escape_string($conn,$fname);
$name=mysqli_real_escape_string($conn,$name);
$mname=mysqli_real_escape_string($conn,$mname);
$scontact=mysqli_real_escape_string($conn,$scontact);
$fcontact=mysqli_real_escape_string($conn,$fcontact);
$mcontact=mysqli_real_escape_string($conn,$mcontact);
$birth=mysqli_real_escape_string($conn,$birth);
$address=mysqli_real_escape_string($conn,$address);
$section=mysqli_real_escape_string($conn,$section);
$section=strtoupper($section);
$usn=$_SESSION['usn'];
$target="images/".basename($_FILES['image']['name']);
$image=$_FILES['image']['name'];
  $sq="select flag from student where usn='$usn'";
  $result=mysqli_query($conn,$sq) or die(mysqli_error($conn));
   $row=mysqli_fetch_array($result);
   if($row['flag']==0)
   {  
        if(!empty($fname || $mname || $fcontact|| $scontact|| $mcontact ||$birth || $address || $image ||$section))
     
     {    $sl="select image from student where usn='$usn'";
        $re=mysqli_query($conn,$sl);
        $row=mysqli_fetch_array($re);
		 if(!empty($row['image']) && empty($image))
		 
		 
		 
		 {
		 
    
        $sq="update student set flag=1,username='$name',section='$section',fname='$fname',date='$birth',mname='$mname',fcontact='$fcontact',mcontact='$mcontact',scontact='$scontact',address='$address' where usn='$usn'";
       
	  
	   if(mysqli_query($conn,$sq)){
		   
		?>
		<script>
		$(document).ready(function(){
		swal({
			title:"Update Details",
				text:"Successfully Updated",
				icon:"success"
	
		}).then(okay=>{
		if(okay)
		{
			window.location.href='sprofile.php?id=Successfully Updated';
		}
	
		});
	});
	
		</script>
	
	
	
		<?php
		
	   }

   else
	{echo "sorry there is a error".mysqli_error($conn);}
	  
	 }
	 else{
        $sq="update student set flag=1,username='$name',section='$section',fname='$fname',date='$birth',mname='$mname',fcontact='$fcontact',mcontact='$mcontact',scontact='$scontact',address='$address',image='$image' where usn='$usn'";
        move_uploaded_file($_FILES['image']['tmp_name'],$target);
	  
	   if(mysqli_query($conn,$sq)){
		   
		?>
		<script>
		$(document).ready(function(){
		swal({
			title:"Update Details",
				text:"Successfully Updated",
				icon:"success"
	
		}).then(okay=>{
		if(okay)
		{
			window.location.href='sprofile.php?id=Successfully Updated';
		}
	
		});
	});
	
		</script>
	
	
	
		<?php
		
	   }

   else
	{echo "sorry there is a error".mysqli_error($conn);}
	  
		 
	 }
	 
	 
	 }
	 else
		 header("location:sprofile.php?success=Sorry Nothing To Update");
  
    
	}
	else
	{
		if(!empty($section))
		{
			$sl="select image from student where usn='$usn'";
        $re=mysqli_query($conn,$sl);
		$row=mysqli_fetch_array($re);
		
        $sq="update student set section='$section' where usn='$usn'";
       
	  
	   if(mysqli_query($conn,$sq)){
		   
		   
		?>
		<script>
		$(document).ready(function(){
		swal({
			title:"Update Details",
				text:"Successfully Updated",
				icon:"success"
	
		}).then(okay=>{
		if(okay)
		{
			window.location.href='sprofile.php?id=Successfully Updated';
		}
	
		});
	});
	
		</script>
	
	
	
		<?php
		
	   }

   else
	{echo "sorry there is a error".mysqli_error($conn);}
		
		}
 


	}





}
?>