<?php
 session_cache_limiter(FALSE);
  session_start(); 
  if(!isset($_SESSION['user_id']))
  {
    header("Location: ../tagteam.php");
  }

  require_once("../dbconfig.php");
  

?>

<html>
<style>
.col-md-3,.col-md-9{
		padding:10px 0 10px 0;
}
.col-md-9 input[type="password"]{
	width:50%;
}

</style>
<?php
include 'head.php';
?>
	
<body>
<?php
include 'header.php';

if(isset($_POST["update_submit"]))
{
    $old=$_POST["old"];
	$new1=$_POST["new1"];
	$new2=$_POST["new2"];
	
	if(strcmp($new1,$new2)!=0)
	{
		$message = "New password and confirm password must be same."; 
        unset($_POST);
	}
	else
	{	
	$query = "select * from recruiter_tbl where recruiter_id = '".$recruiter_id."' and password='".$old."'";
    $result=$conn->query($query);
    if($result->num_rows>0)
    {
		$query = "UPDATE `recruiter_tbl` SET `password`='".$new1."' where recruiter_id='".$recruiter_id."'";
        $result = $conn->query($query);
		if($result===TRUE) 
		{
		
			$message = "Password changed successfully!"; 
			header('Location:profile.php?message='.$message);
		}	 
		else 
		{
			$message = "Problem in updation. Try Again!";    
		}    
    }
    else
    {
		$message = "Incorrect old password."; 
        unset($_POST);
	}
	}
}

?>

 <div id="page-wrapper">
        <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Change Password</h2>  
        </div>
    </div>
	<?php 
        if(isset($message))
        {
    ?>
    <div class="row" style="text-align:center;color:#337ab7;"> 
    <?php 
        echo $message;
    ?>
    </div>
    <?php
        }
    ?>	
	<form action="" method="post">
	<div class="row">
        <div class="col-lg-12">
         	<div class="panel panel-default">
               	<div class="panel-heading">
                    <b><?php echo $row['name']; ?></b> [ Recruiter ID: <?php echo $row['recruiter_id']; ?> ] <span style="float:right;">Last Modified: <?php echo $row['modified_on']; ?></span>
                </div>
				<div class="panel-body">
					<div class="col-md-10">
						<div class="col-md-3">
							<b>Old Password</b>
						</div>
						<div class="col-md-9">
							<input type="password" class="form-control" name="old"  required="required"/> 
						</div>
						<div class="col-md-3">
							<b>New Password</b>
						</div>
						<div class="col-md-9">
							<input type="password" class="form-control" name="new1"  required="required"/> 
						</div>
						<div class="col-md-3">
							<b>Confirm Password</b>
						</div>
						<div class="col-md-9">
							<input type="password" class="form-control" name="new2"  required="required"/> 
						</div>
						<div >
							<input type="submit" style="width:200px;" name="update_submit" class="btn btn-lg btn-success btn-block" value="Save Changes"/>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
			

	</div>
</div>

	
</body>
</html>
<!-- jQuery -->
        <script src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

       
        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>
        

<script src="../js/dataTables/jquery.dataTables.min.js"></script>
<script src="../js/dataTables/dataTables.bootstrap.min.js"></script>