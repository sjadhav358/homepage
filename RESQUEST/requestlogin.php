<?php
include('connectivity.php');
session_start();
if(isset($_POST['submit']))
{

if($_SESSION['is_login'])
{
    $rEmail = $_SESSION['rEmail'];
}
else
{
    echo "<script>location:href='Requesterlogin.php'</script>";
}

$sql = " select name email form loing_table where 
email = '$rEmail" ;
$result = mysqli_query($conn,$q);
 if(mysqli_num_rows($result)==1)
 {
     $rName = $row['name'];
    
 }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script src="../js/jquery-.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-dark fixed-top bg-danger flex-md-nowrap p-0 shadow">
        <a href="login.php" class="navbar-brand col-sm-3 col-md-2 mr-0" >OSMS</a>

    </nav>
    <!--sidebar-->
      <div class="container-fluid" style="margin-top:40px">
       <div class="row"><!--row-->

           <nav class="col-sm-2 bg-light sidebar py-5">
               <div class="sidebar-sticky">
            <ul class="nav flex-column">
                <li class="nav-item">
            <a class ="nav-link "href="#"><i></i>profile</a>
            </li>

            <li class="nav-item">
            <a class ="nav-link "href="submitrequest.php"><i></i>submit request</a>
            </li>

            <li class="nav-item">
            <a class ="nav-link "href="checkstatus.php"><i></i>check staus</a>
            </li>
            <li class="nav-item">
            <a class ="nav-link "href="changepassword.php"><i></i>change password</a>
            </li>
            <li class="nav-item">
            <a class ="nav-link "href="#"><i></i>log-out</a>
            </li>
            </ul>
     </nav><!--end nav-->
     <div class="col-sm-6 mt-5"><!--prilfe area-->
       <form action="" method="post" class="mx-5">
           <div class="form">
               <label for="">email</label>
                <input type="text" name="remail" id="remail" class="form-control"
                value="<?php echo $_SESSION['rEmail']; ?> ">
           </div>
           <div class="form-group">
               <label for="">name</label>
               <input type="text" name="rnmae" id="rname"class="form-control">
           </div>
           <button type="submit"class="btn btn-danger"name="update">submit</button>

       </form>
     </div><!--end profle area-->
    </div> <!--end row-->
    


       </div>    
      </div>
    <!--side--end bar-->

</body>
</html>