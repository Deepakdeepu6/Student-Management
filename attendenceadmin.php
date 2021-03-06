<?php
include("process.php");
header("Cache-Control: no cache,must-revalidate,max-age=0");
session_cache_limiter("private_no_expire");
?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<style>
.table{
  width:50%;
  margin:auto;
}
h1{
  font-size:30px;
  color:blue;
  font-family:sans-serif;
  font-style:verdana;

}

</style>
<body>
<div class="container">
 <center><h1>Attendence Update</h1></center>
 <div class="text-right"><a href="admin.php"><i class="fa fa-window-close fa-4x text-danger text-right"  aria-hidden="true"  ></i></a></div>
 <div class="row p-5" id="row1" >

  <div class="col-6" >
<form action="" method="post">

<input  name="year"  list="scheme" class="form-control" placeholder="Year:" onfocus="this.value=''">
<datalist id="scheme">
<?php
   $sl="select year from scheme";
   $result=mysqli_query($conn,$sl) or die(mysqli_error($conn));
   while($row=mysqli_fetch_array($result))
   {  ?>
       <option value="<?php echo $row['year'];?>"></option>
     <?php   
}

?>
</datalist>
</div>
<div class="col-6">

<input  name="section" list="section" placeholder="section:" class="form-control">
<datalist id="section">
<option value="a">A</option>
<option value="b">B</option>
<option value="c">C</option>

</datalist>
</div>

<div class="col-12 p-2">
<center>
<button name="submit0" class="btn btn-info btn-lg">submit</button></center>
</form>
</div>
</div>
 <div class="row">
  <div class="col-12">

  <?php
  if(isset($_POST['submit0']))
  {  $year=substr($_POST['year'],2,3);
    $section=$_POST['section'];

   $sl="select usn,id from student where section like '_{$section}' and usn like '___{$year}%' ";
   $result=mysqli_query($conn,$sl) or die(mysqli_error($conn));
   echo "<form action='attendenceadmininside.php' method='post'>";
   while($row=mysqli_fetch_array($result))
   {  ?>
   <div class="container">
   <table class='table table-striped table-sm table-bordered'>
   <tr>
     <td> <input readonly  type="text" class="form-control" name="<?php echo $row['usn'];?>" value= "<?php echo $row['usn'];?>" ></td>
      <td>  <button name="submit_<?php echo $row['id'];?>" class='btn btn-primary btn '>Update</button></td>
      </tr>
      </table>
      </div>
      <?php
    
   }

  echo "</form>";


  }
  ?>

  </div>
  </div>


</body>

</html>