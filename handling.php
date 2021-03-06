<?php 
session_start();
include("process.php");
if(!isset($_SESSION['username']))
 header("location:second.php");
if(!isset($_SERVER['HTTP_REFERER']))
{
    header("location:second.php");
}
?>
<!DOCTYPE html>
<html lang="en">
            <head>
             <title></title>
                <meta charset="utf-8">
                   <meta name="viewport" content="width=device-width,initial-scale=1.0">
                   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

                   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
                   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
                   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

            </head>
            <style>
              *{
                  margin:0px;
                  padding:0px;
                  list-style:none;
                  text-transform:none;
              }
              
              body{
                  background-color:#F68686;
              }
             .first{
                 background-color:white;
                 border:1px solid grey;
                 border-radius:5px;
                 box-shadow:2px 1px 2px 1px black;
                 margin:150px auto;
                 
                 font-size:25px;
                 font-weight:300;
                 font-family:verdana,sans-serif;
                 letter-spacing:5px;
                 color:#5DADE2 ;
             }
             
             .second,.inner{
                 margin-bottom:13px;
             }
            </style>
        <body>
         <div class="container">
             <div class="row">
                 
               <div class="col-xs-12 first ">
                <!-- content -->
                <?php 

                  $sl="select * from handling where semail='".$_SESSION['email']."'";
                  $result=mysqli_query($conn,$sl) or die(mysqli_error($conn));
                  while($row=mysqli_fetch_array($result))
                
                  {
                  ?>
                 <form action="" method="post">
                  <!-- another row inside column -->
                      <div class="row second">
                         <div class="col-2">
                           <a href="submit.php" >&larr;</a></div>
                           <div class="col-10"> <b >Update Your Alloted Semesters with Sections</b></div>
                     
                          
                        <div class="col-12 col-md-6 inner">
                        <input type="text" class="form-control" name="sem1" value="<?php echo $row['sem1']?>"placeholder="Semester With Section-1">
                        </div>
                        <div class="col-12 col-md-6 inner" >
                        <input type="text" class="form-control" name="sub1" value="<?php echo $row['sub1']?>" placeholder="Subject-1">
                        </div>
                        <div class="col-12 col-md-6 inner">
                        <input type="text" class="form-control" name="sem2" value="<?php echo $row['sem2']?>"placeholder="Semester With Section-2">
                        </div>
                        <div class="col-12 col-md-6 inner">
                        <input type="text" class="form-control" name="sub2" value="<?php echo $row['sub2']?>" placeholder="Subject-2">
                        </div>
                        <div class="col-12 col-md-6 inner">
                        <input type="text" class="form-control" name="sem3" value="<?php echo $row['sem3']?>" placeholder="Semester With Section-3">
                        </div>
                        <div class="col-12 col-md-6 inner">
                        <input type="text" class="form-control" name="sub3"  value="<?php echo $row['sub3']?>" placeholder="Subject-3">
                        </div>
                        <div class="col-12 col-md-6 inner">
                        <input type="text" class="form-control" name="sem4" value="<?php echo $row['sem4']?>" placeholder="Semester With Section-4">
                        </div>
                        <div class="col-12 col-md-6 inner">
                        <input type="text" class="form-control" name="sub4" value="<?php echo $row['sub4']?>" placeholder="Subject-4">
                        </div>
                        <div class="col-12  inner">
                        <button class="btn btn-success btn-lg btn-block" name="submit">Submit</button>
                        </div>
                    </div>  
                  </form> 
                 <?php
                  }
                ?>
             </div>  
          </div> 
        </div>
        <?php 
     if(isset($_POST['submit']))
          {
            $email=$_SESSION['email'];
           $sem1=strtoupper($_POST['sem1']);
           $sem2=strtoupper($_POST['sem2']);
           $sem3=strtoupper($_POST['sem3']);
           $sem4=strtoupper($_POST['sem4']);
           $sub1=$_POST['sub1'];
           $sub2=$_POST['sub2'];
           $sub3=$_POST['sub3'];
           $sub4=$_POST['sub4'];
           $email=$_SESSION['email'];
           if(empty($sem1 && $sub1))
           $sl="update handling set sem2='$sem2',sem3='$sem3',sem4='$sem4',sub2='$sub2',sub3='$sub3',sub4='$sub4' where semail='$email'";
           if(empty($sem2 && $sub2))
           $sl="update handling set sem1='$sem1',sem3='$sem3',sem4='$sem4',sub1='$sub1',sub3='$sub3',sub4='$sub4' where semail='$email'";
           if(empty($sem3 && $sub3))
           $sl="update handling set sem1='$sem1',sem2='$sem2',sem4='$sem4',sub1='$sub1',sub2='$sub2',sub4='$sub4' where semail='$email'";
           if(empty($sem4 && $sub4))
           $sl="update handling set sem1='$sem1',sem2='$sem2',sem3='$sem3',sub1='$sub1',sub2='$sub2',sub3='$sub3' where semail='$email'";
            $result=mysqli_query($conn,$sl) or die(mysqli_error($conn));
            if($result)
            {
                echo "<script> location.replace('handling.php'); </script>";
            }
             else{
                 echo "make sure you have entered the respective subject of semesters";
             }
          }
         ?>
    </body>
</html>