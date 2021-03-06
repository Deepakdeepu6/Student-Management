<?php
include("process.php");
 session_start();

$commentNew=$_POST['commentsNewCount'];
	

 
 $sl="select * from question  order by id desc limit $commentNew";
 if(mysqli_query($conn,$sl))
 {$res=mysqli_query($conn,$sl);}
   else die("".mysqli_error($conn));

  while($row=mysqli_fetch_array($res))
  {  
        ?>
		<div class="container">
		<div class="table-responsive">
    <table class="table table-striped table-bordered table-sm ">
	<thead>
	  <tr><td scope="col">question number</td><td scope="col"><?php echo $row['id'];?></td></tr>
	  <tr><td scope="row">question</td><td scope="col"><?php echo $row['questions']?></td></tr>
	  <tr><td scope="col">answer</td><td scope="col"><?php echo $row['answers'];?></td></tr>
	   <tr><td scope="col">question by</td><td scope="col"><?php echo $row['questionby'];echo "(".$row['section'].")";?></td></tr>
	   <tr><td scope="col">answer by(lecturer)</td><td scope="col"><?php echo $row['answered'];?></td></tr>
	 <tr><td><hr></td><td><hr></td></tr>
	   </thead>
	  </table>
	  </div>
	  </div>
  
	  <?php
  }
  
 
  

?>

