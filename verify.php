<?php
include("process.php");
if(isset($_GET['vkey']))
{
	$vkey=$_GET['vkey'];
	
	$sl="select verified,vkey from question where verified 0 and vkey='$vkey'";
	$res=mysqli_query($sl,$vkey);
	$total=mysqli_fetch_row($res);
	if($total>0)
	{
	
	$sq="update question set verified=1  where vkey='$vkey'";

     if(mysqli_query($conn,$sq))
	 {
		 echo "success";
	 }
	 else
		 echo mysqli_error($conn);
	}


   else
   {
	   echo "no ";
   }

?>