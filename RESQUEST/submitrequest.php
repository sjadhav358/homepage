<?php
include('connectivity.php');
session_start();
	
if(isset($_POST['submit']))
{
	if(($_POST['requestinfo']=="")||($_POST
	['description']=="")||($_POST['name']=="")||($_POST['addres']=="")||
		 ($_POST['addres2']=="")||($_POST['city']=="")
		||($_POST['state']=="")||($_POST['mobile']=="")||($_POST['date']=="")||
		($_POST['zip']==""))
		
	{
		$msg ='<div class="alert alert-warning">all fired requred</div>';
	}
	else
	{
		$reinfo =$_POST['requestinfo'];
		$desc = $_POST['description'];
		$name = $_POST['name'];
		$addr = $_POST['addres'];
		$addres1 = $_POST['addres2'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$mobile = $_POST['zip'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];
		$date =$_POST['date'];
		
		$sql = "INSERT INTO `submitrequest`( `reqinfo`, `reqdes`, `name`, `add`, `add1`, 
		`city`, `state`, `zip`, `email`, `mobile`, `date`) 
		VALUES ('$reinfo','$desc','$name','$addr','$addres1','$city','$state','$zip',
		'$email','$mobile','$date')" ;
		
		$Result =mysqli_query($conn,$sql);
		if($Result)
		{
			$gid= mysqli_insert_id($conn);
			$msg="<div class='alert alert-success col-sm-6 ml-5'>insert</div>";
			$_SESSION['myid']=$gid;
			echo "<script>location.href='../submitsuccess.php'</script>";
		}
		else
		{
			$msg="<div class='alert alert-danger col-sm-6 ml-5'> not insert</div>";
		}
		
	}
	
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>submitrequest</title>
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
            <a class ="nav-link "href="s"><i></i>change password</a>
            </li>
            <li class="nav-item">
            <a class ="nav-link "href="#"><i></i>log-out</a>
            </li>
            </ul>
     </nav><!--end nav-->
     <div class="col-sm-6 mt-5"><!--prilfe area-->
        <form action="" method="post">
        	<div class="from-group">
        		<label>request info</label>
        		<input type="text" class="form-control" name="requestinfo" id="requestinfo"
        		placeholder="request">
        	</div>
        	
        	<div class="from-group">
        		<label>Description</label>
        		<input type="text" class="form-control" name="description" id="description"
        		placeholder="description">
        	</div>
        	
        	<div class="from-group">
        		<label>name</label>
        		<input type="text" class="form-control" name="name" id="name"
        		placeholder="name">
        	</div>
        	
        <div class="form-row mt-2">
        	<div class="from-group col-md-6">
        		<iabel>address linne</iabel>
        		<input type="text" class="form-control" id="inputaddress" placeholder="houses 12"
        		name="addres">
        	</div>
        	<div class="from-group col-md-6">
        		<iabel>address linne2</iabel>
        		<input type="text" class="form-control" id="inputaddress1" placeholder="houses 12"
        		name="addres2">
        	</div>
        
        <div class="form-group col-md-6">
        	<label>city</label>
        <input type="text" class="form-control" id="city" name="city">
        </div>
        <div class="form-group col-md-4">
        	<label>state</label>
        <input type="text" class="form-control" id="city" name="state">
        </div>
        <div class="form-group col-md-2">
        	<label>zip</label>
        <input type="text" onkeypress="isinputnumber(event)" class="form-control" id="city" 
        name="zip"
        placeholder="only number accept">
        </div>
        
        </div>
        <div class="form-row">
        	<div class="col-lg-4 foem-group">
        		<label>email</label>
        		<input type="email" name="email" class="form-control">
        	</div>
        		<div class="col-lg-4">
        		<label>mobile</label>
        		<input type="text" name="mobile" class="form-control">
        	</div>
        		<div class="col-lg-4">
        		<label>date</label>
        		<input type="date" name="date" class="form-control">
        	</div>
        </div>
        <br>
        <br>
        	<input type="submit" value="submit" name="submit">	
        </form>
        <?php if(isset($msg)){echo $msg;}?>
    </div><!--end profle area-->
    </div> <!--end row-->
    


       </div>    
      </div>
    <!--side--end bar-->
	<script>
	
	 function isinputnumber(evt)
		{
			var ch = String.fromCharCode(evt.which);
			if(!(/[0-9]/.test(ch)))
	
				 {
				  evt.preventDefault();
				 }
		}
	</script>
</body>
</html>
