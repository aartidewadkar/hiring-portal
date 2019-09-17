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
.col-md-3{
		padding:10px 0 10px 0;
}
</style>
<?php
include 'head.php';
?>

<body>
<?php
include 'header.php';

?>

<div id="page-wrapper">
	<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Profile</h2>  
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
	<div class="row">
        <div class="col-lg-12">
         	<div class="panel panel-default">
               	<div class="panel-heading">
                    <b><?php echo $row['name']; ?></b> [ Recruiter ID: <?php echo $row['recruiter_id']; ?> ] <a href="editprofile.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a><span style="float:right;">Last Modified: <?php echo $row['modified_on']; ?></span>
                </div>
				<div class="panel-body">
					<div class="col-md-3">
						<img src="<?php echo $row['photo']; ?>" height="150px" width="150px;" />
						<p><a href="changePhoto.php">Change Photo</a></p>
					</div>
					<div class="col-md-9">
						<div class="col-md-3">
							<b>Name</b>
						</div>
						<div class="col-md-3">
							<?php echo $row['name']; ?>
						</div>
						<div class="col-md-3">
							<b>Email</b>
						</div>
						<div class="col-md-3">
							<?php echo $row['email']; ?>
						</div>						
						<div class="col-md-3">
							<b>Contact</b>
						</div>
						<div class="col-md-3">
							<?php echo $row['contact']; ?>
						</div>
						<div class="col-md-3">
							<b>Emergency Contact</b>
						</div>
						<div class="col-md-3">
							<?php echo $row['emergency_contact']; ?>
						</div>
						<div class="col-md-3">
							<b>Date of Birth</b>
						</div>
						<div class="col-md-3">
							<?php echo $row['dob']; ?>
						</div>
						<div class="col-md-3">
							<b>Date of Joining</b>
						</div>
						<div class="col-md-3">
							<?php echo $row['doj']; ?>
						</div>
						<div class="col-md-3">
							<b>Local Address</b>
						</div>
						<div class="col-md-3">
							<?php echo $row['local_address']; ?>
						</div>
						<div class="col-md-3">
							<b>Permanent Address</b>
						</div>
						<div class="col-md-3">
							<?php echo $row['permanant_address']; ?>
						</div>
						<div class="col-md-3">
							<b>Gender</b>
						</div>
						<div class="col-md-3">
							<?php echo $row['gender']; ?>
						</div>
						<div class="col-md-3">
							<b>Education</b>
						</div>
						<div class="col-md-3">
							<?php echo $row['education']; ?>
						</div>
						<div class="col-md-3">
							<b>Work Experience</b>
						</div>
						<div class="col-md-3">
							<?php echo $row['work_experience']; ?>
						</div>
						<div class="col-md-3">
							<b>Department</b>
						</div>
						<div class="col-md-3">
							<?php echo $row['department']; ?>
						</div>
						<div class="col-md-3">
							<b>Designation</b>
						</div>
						<div class="col-md-3">
							<?php echo $row['designation']; ?>
						</div>
						<div class="col-md-3">
							<b>Reporting To</b>
						</div>
						<div class="col-md-3">
							<?php echo $row['reporting_to']; ?>
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