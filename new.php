<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
                   <meta name="viewport" content="width=device-width,initial-scale=1.0">
                   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

                   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
                   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
                   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</head>
<body>
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link " data-toggle="tab" href="#first">Active</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Dropdown</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" data-toggle="tab" href="#">Link 1</a>
      <a class="dropdown-item" data-toggle="tab" href="#">Link 2</a>
      <a class="dropdown-item" data-toggle="tab" href="#">Link 3</a>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#second">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#">Disabled</a>
  </li>
</ul>
<div class="tab-content">
	 <div class="container tab-pane active" id="first">
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
			
			 
             <div class="container tab-pane fade" id="second">
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
	 </div> 
</body>
</html>