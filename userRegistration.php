<?php

include('dbConnection.php');
 if(isset($_POST['done'])){
	
	 if(($_POST['rname']=="") || ($_POST['remail']=="") || ($_POST['rpass']==""))
	{
	   $regmsg = '<div class="alert alert-warning mt-2" roll="alert"> 
		 all Fields are required</div>';	 
	 }
else
{
	$email = $_POST['remail'];
	
 $sql = " select email  from requesterlogin where email= '$email'";
	
 
	$result1 = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result1)>1)
	{
		 $regmsg = '<div class="alert alert-danger mt-2" roll="alert"> 
		 email id registed all ready</div>';	 ;
	}
	else{
	$name = $_POST['rname'];
 $email = $_POST['remail'];
 $pass = $_POST['rpass'];
$q = " INSERT INTO `requesterlogin`( `name`, `email`, `password`)
VALUES ('$name','$email','$pass')";
$result = mysqli_query($conn,$q);
	if($result)
	{
	   $regmsg = '<div class="alert alert-success mt-2" roll="alert"> 
		 accont created succefully</div>';	 
	}
	else
	{
	  $regmsg = '<div class="alert alert-danger mt-2" roll="alert"> 
		 uneble to create account</div>';	
	}
	
	}
 }
	 
 }

?>
   
   <!--start registation-->
    <div class="container pt-5">
      <h2  class="text-center">cerate and account</h2>
      <div class="row mt-4 mb-4">
        <div class="col-md-6 offset-md-3">
          <form action="" method="post" class="shadow-lg p-4">
            <div class="form-group">
              <i></i><label for=""class="font-weight-bold">names</label>
              <input type="text" placeholder="name" class="form-control" name="rname">
            </div>

            <div class="form-group">
              <i></i><label for=""class="font-weight-bold">email</label>
              <input type="email" placeholder="email" class="form-control" name="remail">
              <small class="form-text">Never share with anyones</small>
            </div>
            <div class="form-group">
              <i></i><label for=""class="font-weight-bold">password</label>
              <input type="text" placeholder="name" class="form-control" name="rpass">
            </div>
            <button type="submit" name="done" class="btn-block btn-danger mt-5 btn font-weight-bold">sign up</button>
            <em style="font-size: small;">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reiciendis</em>
            
            <?php if(isset($regmsg)){echo $regmsg;}?>
          </form>
        </div>
      </div>

    </div>
    <!--end registartion-->