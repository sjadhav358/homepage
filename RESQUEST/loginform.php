<?php
include('../dbConnection.php');
session_start();
if(!isset($_SESSION['is_login'])){

 if(isset($_POST['remail']))
 {
 $remail = trim($_POST['remail']);
 $rpass = trim($_POST['rpassword']);

 $sql =" select * from `requesterlogin` ";
  $result = mysqli_query($conn,$sql);
  $flag=0;
  while($row=mysqli_fetch_array($result))
  {
      if(($remail==$row['email']) && ($rpass==$row['password']))
      {  
      $flag=1;
     }
  }
   if($flag==1)
   {  $_SESSION['is_login']=true;
     $_SESSION['remail']=$remail;
      echo "<script> location.href='requestlogin.php';</script>";
   }
   else
   {
      $msg = '<div class="alert alert-warning mt-2">enter valide email</div>';
   }
}
}
else{
    echo "<script> location.href='requestlogin.php';</script>";
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
	<div class="mb-3 mt-5 text-center" style="font-size:36px;">
    <i></i>
    <span>online service mangement system</span>
    </div>
    <p class="text-center" style="font-size:20px;">Request dmeo</p>
    <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-6 col-md-4">
       <form action="" method="post" class="shadow-lg p-3">
       <div class="form-group">
       <label for="">email</label>
       <input type="email" class="form-control" placeholder="email" name="remail">
       <small>never share with anyones</small>
       </div>
        <div class="form-group">
         <label for="">password</label>
         <input type="text" name="rpassword" id="" class="form-control" placeholder="password" aria-describedby="helpId">
         <small id="helpId" class="text-muted">Help text</small>
       </div>
            <button type="submit" class="btn btn-outline-danger font-weight-bold  btn-block mt-3">login</button>
            <?php if(isset($msg)) {echo $msg;}?>
       </form>
       <div class="text-center mt-4">
       <a href="../index1.php" class="btn btn-sm btn-primary " >back to home</a>
       </div>
      </div>
    </div>
    </div>
</body>
</html>