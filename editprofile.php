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
.col-md-3 input[type="text"],
.col-md-3 input[type="date"],
.col-md-3 select{
	width:100%;
}

</style>
<?php
include 'head.php';
?>

<body>
<?php
include 'header.php';
?>

<?php
if(isset($_POST["update_submit"]))
{
    $name=$_POST["name"];
	$email=$_POST["email"];
	$contact=$_POST["contact"];
	$emergency_contact=$_POST["emergency_contact"];
	$dob=$_POST["dob"];
	$doj=$_POST["doj"];
	$local_address=$_POST["local_address"];
	$permanent_address=$_POST["permanent_address"];
	$gender=$_POST["gender"];
	$education=$_POST["education"];
	$work_exp=$_POST["work_exp"];
	$department=$_POST["department"];
	$designation=$_POST["designation"];
	$reporting_to=$_POST["reporting_to"];

	date_default_timezone_set("Asia/Kolkata");
    $modified_on=date("Y-m-d h:i:sa");	
	
	$query = "UPDATE `recruiter_tbl` SET `name`='".$name."',`gender`='".$gender."',`dob`='".$dob."',`email`='".$email."',`contact`='".$contact."',`doj`='".$doj."',`emergency_contact`='".$emergency_contact."',`local_address`='".$local_address."',`permanant_address`='".$permanent_address."',`education`='".$education."',`work_experience`='".$work_exp."',`designation`='".$designation."',`department`='".$department."',`reporting_to`='".$reporting_to."',`modified_on`='".$modified_on."' WHERE recruiter_id='".$recruiter_id."'";
    $result = $conn->query($query);
	if($result===TRUE) 
    {
		
		$message = "Your profile updated successfully!"; 
		header('Location:profile.php?message='.$message);
    } 
    else 
    {
            $message = "Problem in updation. Try Again!";   
    }
	
}

?>

<div id="page-wrapper">
	<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Edit Profile</h2>  
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
					<div class="col-md-12">
						<div class="col-md-3">
							<b>Name</b>
						</div>
						<div class="col-md-3">
							<input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>" /> 
						</div>
						<div class="col-md-3">
							<b>Email</b>
						</div>
						<div class="col-md-3">
							<input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>"/>
						</div>						
						<div class="col-md-3">
							<b>Contact</b>
						</div>
						<div class="col-md-3">
							<input type="text" class="form-control" name="contact" value="<?php echo $row['contact']; ?>"/>
						</div>
						<div class="col-md-3">
							<b>Emergency Contact</b>
						</div>
						<div class="col-md-3">
							<input type="text" class="form-control" name="emergency_contact" value="<?php echo $row['emergency_contact']; ?>"/>
						</div>
						<div class="col-md-3">
							<b>Date of Birth</b>
						</div>
						<div class="col-md-3">
							<input type="date" class="form-control" name="dob" value="<?php echo $row['dob']; ?>"/>
						</div>
						<div class="col-md-3">
							<b>Date of Joining</b>
						</div>
						<div class="col-md-3">
							<input type="date" class="form-control" name="doj" value="<?php echo $row['doj']; ?>"/>
						</div>
						<div class="col-md-3">
							<b>Local Address</b>
						</div>
						<div class="col-md-3">
							<input type="text" class="form-control" name="local_address" value="<?php echo $row['local_address']; ?>"/>
						</div>
						<div class="col-md-3">
							<b>Permanent Address</b>
						</div>
						<div class="col-md-3">
							<input type="text" class="form-control" name="permanent_address" value="<?php echo $row['permanant_address']; ?>"/>
						</div>
						<div class="col-md-3">
							<b>Gender</b>
						</div>
						<div class="col-md-3">
							<select class="form-control" name="gender" required="required">
											<option value="">Select Gender</option>
											<option value="Male" <?php if($row['gender']=='Male'){ ?>selected="selected" <?php }?>>Male</option>
											<option value="Female" <?php if($row['gender']=='Female'){ ?>selected="selected" <?php }?>>Female</option>
										</select>
							
						</div>
						<div class="col-md-3">
							<b>Education</b>
						</div>
						<div class="col-md-3">
							<select class="form-control"  name="education" required="required">
											<option value="">Select Education</option>
                                        <option value="Not Pursuing Graduation" <?php if($row['education']=='Not Pursuing Graduation'){ ?>selected="selected" <?php }?>>Not Pursuing Graduation</option>
<option value="Compulsory Education" <?php if($row['education']=='Compulsory Education'){ ?>selected="selected" <?php }?>>Compulsory Education</option>
<option value="Diploma" <?php if($row['education']=='Diploma'){ ?>selected="selected" <?php }?>>Diploma</option>
<option value="B.A" <?php if($row['education']=='B.A'){ ?>selected="selected" <?php }?>>B.A</option>
<option value="B.Arch" <?php if($row['education']=='B.Arch'){ ?>selected="selected" <?php }?>>B.Arch</option>
<option value="BCA" <?php if($row['education']=='BCA'){ ?>selected="selected" <?php }?>>BCA</option>
<option value="B.B.A" <?php if($row['education']=='B.B.A'){ ?>selected="selected" <?php }?>>B.B.A</option>
<option value="B.Com" <?php if($row['education']=='B.Com'){ ?>selected="selected" <?php }?>>B.Com</option>
<option value="B.Ed" <?php if($row['education']=='B.Ed'){ ?>selected="selected" <?php }?>>B.Ed</option>
<option value="BDS" <?php if($row['education']=='BDS'){ ?>selected="selected" <?php }?>>BDS</option>
<option value="BHM" <?php if($row['education']=='BHM'){ ?>selected="selected" <?php }?>>BHM</option>
<option value="B.Pharma" <?php if($row['education']=='B.Pharma'){ ?>selected="selected" <?php }?>>B.Pharma</option>
<option value="B.Sc" <?php if($row['education']=='B.Sc'){ ?>selected="selected" <?php }?>>B.Sc</option>
<option value="B.Tech/B.E." <?php if($row['education']=='B.Tech/B.E.'){ ?>selected="selected" <?php }?>>B.Tech/B.E.</option>
<option value="LLB" <?php if($row['education']=='LLB'){ ?>selected="selected" <?php }?>>LLB</option>
<option value="MBBS" <?php if($row['education']=='MBBS'){ ?>selected="selected" <?php }?>>MBBS</option>
<option value="BVSC" <?php if($row['education']=='BVSC'){ ?>selected="selected" <?php }?>>BVSC</option>
<option value="CA" <?php if($row['education']=='CA'){ ?>selected="selected" <?php }?>>CA</option>
<option value="CS" <?php if($row['education']=='CS'){ ?>selected="selected" <?php }?>>CS</option>
<option value="ICWA" <?php if($row['education']=='ICWA'){ ?>selected="selected" <?php }?>>ICWA</option>
<option value="Integrated PG" <?php if($row['education']=='Integrated PG'){ ?>selected="selected" <?php }?>>Integrated PG</option>
<option value="LLM" <?php if($row['education']=='LLM'){ ?>selected="selected" <?php }?>>LLM</option>
<option value="M.A" <?php if($row['education']=='M.A'){ ?>selected="selected" <?php }?>>M.A</option>
<option value="M.Arch" <?php if($row['education']=='M.Arch'){ ?>selected="selected" <?php }?>>M.Arch</option>
<option value="M.Com" <?php if($row['education']=='M.Com'){ ?>selected="selected" <?php }?>>M.Com</option>
<option value="M.Ed" <?php if($row['education']=='M.Ed'){ ?>selected="selected" <?php }?>>M.Ed</option>
<option value="M.Pharma" <?php if($row['education']=='M.Pharma'){ ?>selected="selected" <?php }?>>M.Pharma</option>
<option value="M.Sc" <?php if($row['education']=='M.Sc'){ ?>selected="selected" <?php }?>>M.Sc</option>
<option value="M.Tech" <?php if($row['education']=='M.Tech'){ ?>selected="selected" <?php }?>>M.Tech</option>
<option value="MBA/PGDM" <?php if($row['education']=='MBA/PGDM'){ ?>selected="selected" <?php }?>>MBA/PGDM</option>
<option value="MCA" <?php if($row['education']=='MCA'){ ?>selected="selected" <?php }?>>MCA</option>
<option value="MS" <?php if($row['education']=='MS'){ ?>selected="selected" <?php }?>>MS</option>
<option value="PG Diploma" <?php if($row['education']=='PG Diploma'){ ?>selected="selected" <?php }?>>PG Diploma</option>
<option value="MVSC" <?php if($row['education']=='MVSC'){ ?>selected="selected" <?php }?>>MVSC</option>
<option value="Ph.D/Doctorate" <?php if($row['education']=='Ph.D/Doctorate'){ ?>selected="selected" <?php }?>>Ph.D/Doctorate</option>
<option value="MPHIL" <?php if($row['education']=='MPHIL'){ ?>selected="selected" <?php }?>>MPHIL</option>
										</select>
						</div>
						<div class="col-md-3">
							<b>Work Experience</b>
						</div>
						<div class="col-md-3">
							<input type="text" class="form-control" name="work_exp" value="<?php echo $row['work_experience']; ?>"/>
						</div>
						<div class="col-md-3">
							<b>Department</b>
						</div>
						<div class="col-md-3">
							<select class="form-control" name="department" required="required">
											<option value="">Select Department</option>
											<option value="IT Recruitment" <?php if($row['department']=='IT Recruitment'){ ?>selected="selected" <?php }?>>IT Recruitment</option>
											<option value="Financial Recruitment" <?php if($row['department']=='Financial Recruitment'){ ?>selected="selected" <?php }?>>Financial Recruitment</option>
											<option value="BPO Recruitment" <?php if($row['department']=='BPO Recruitment'){ ?>selected="selected" <?php }?>>BPO Recruitment</option>
											<option value="Admin" <?php if($row['department']=='Admin'){ ?>selected="selected" <?php }?>>Admin</option>
										</select>
						</div>
						<div class="col-md-3">
							<b>Designation</b>
						</div>
						<div class="col-md-3">
							<select class="form-control" name="designation" required="required">
											<option value="">Select Designation</option>
											<option value="Intern" <?php if($row['designation']=='Intern'){ ?>selected="selected" <?php }?>>Intern</option>
											<option value="Jr. Recruiter" <?php if($row['designation']=='Jr. Recruiter'){ ?>selected="selected" <?php }?>>Jr. Recruiter</option>
											<option value="Recruiter" <?php if($row['designation']=='Recruiter'){ ?>selected="selected" <?php }?>>Recruiter</option>
											<option value="Sr. Recruiter" <?php if($row['designation']=='Sr. Recruiter'){ ?>selected="selected" <?php }?>>Sr. Recruiter</option>
											<option value="Team Lead / Recruitment" <?php if($row['designation']=='Team Lead / Recruitment'){ ?>selected="selected" <?php }?>>Team Lead / Recruitment</option>
											<option value="Recruitment Manager" <?php if($row['designation']=='Recruitment Manager'){ ?>selected="selected" <?php }?>>Recruitment Manager</option>
											
										</select>
						</div>
						<div class="col-md-3">
							<b>Reporting To</b>
						</div>
						<div class="col-md-3">
							<select class="form-control" name="reporting_to" required="required">
											<option value="">Select </option>
											<option value="Team Leader" <?php if($row['reporting_to']=='Team Leader'){ ?>selected="selected" <?php }?>>Team Leader</option>
											<option value="Manager" <?php if($row['reporting_to']=='Manager'){ ?>selected="selected" <?php }?>>Manager</option>
											<option value="Sr. Manager" <?php if($row['reporting_to']=='Sr. Manager'){ ?>selected="selected" <?php }?>>Sr. Manager</option>
										</select>
						</div>
						<div style="float:right;">
									<input type="submit" style="width:200px;" name="update_submit" class="btn btn-lg btn-success btn-block" value="Update"/>
									</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</form>
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


