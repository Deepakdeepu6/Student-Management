
<!DOCTYPE html>
<html lang="en">
  <head>
 <title></title>
</head>
<meta name="viewport" content="width=device-width">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<body>
<div class="container">
<?php 
include("process.php");
if(isset($_POST['submit1']))
{
$year=$_POST['year'];
$sem=$_POST['sem'];
if($sem!="All" ||$sem=='1'||$sem=='2'||$sem=='3'||$sem=='4'||$sem=='5'||$sem=='6'||$sem=='7'||$sem=='8')
{
$sl="select * from scheme_course where scheme_year='$year' and course_sem='$sem'";
$result=mysqli_query($conn,$sl) or die(mysqli_error($conn));
echo "<div class='container-fluid'>";
echo "<table class='table table-md table-striped table-bordered'>";
echo "<tr><th>SEM</th><th>COURSE_CODE</th><th>COURSE_NAME</th></tr>";
while($row=mysqli_fetch_array($result))
{   if(!empty($row['course_name']))
    {
    
    ?> 
   
           
           <tr><td><?php echo $row['course_sem'] ;?></td>
           <td> <?php  echo $row['course_code'] ;?></td>
         
           <td><?php  echo $row['course_name'];?></td>
           <td><?php if(!empty($row['files'])){echo "<a href='syllabusfiles/".  $row['files']."'>dowload</a>";}?></td>
    
    </tr>


    <?php
     }


}

echo "</table>";
   echo " </div>";
}
else if($sem=="All")
{
    $sl="select * from scheme_course where scheme_year='$year'";
    $result=mysqli_query($conn,$sl) or die(mysqli_error($conn));
    echo "<div class='container-fluid'>";
    echo "<table class='table table-md table-striped table-bordered'>";
    echo "<tr><th>SEM</th><th>COURSE_CODE</th><th>COURSE_NAME</th></tr>";
    while($row=mysqli_fetch_array($result))
    {   ?>
          
           
        <tr><td><?php echo $row['course_sem'] ;?></td>
        <td> <?php  echo $row['course_code'] ;?></td>
      
        <td><?php  echo $row['course_name'];?></td>
        <td><?php if(!empty($row['files'])){echo "<a href='syllabusfiles/".  $row['files']."'>download</a>";}?></td>
    
       
    
   
    
        
    <?php 
    
    }
   
    echo "</table>";
   echo " </div>";



}

}
?>
</div>
</body>
</html>