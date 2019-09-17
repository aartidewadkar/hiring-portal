<?php


if(isset($_POST["register_submit"]))
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
    $created_on=date("Y-m-d h:i:sa");
    $password=rand(11111,99999);
    $recruiter_id=$email;


	$query = "select * from recruiter_tbl where name = '".$name."' and contact ='".$contact."' and email = '".$email."'";
    $result=$conn->query($query);
    if($result->num_rows>0)
    {
        $message = "You have already registered"; 
            unset($_POST);    
    }
    else
    {	
		
		$query = "INSERT INTO `recruiter_tbl`(`recruiter_id`, `name`, `gender`, `dob`, `email`, `contact`, `doj`, `emergency_contact`, `local_address`, `permanant_address`, `education`, `work_experience`, `designation`, `department`, `reporting_to`,  `password`, `created_on`, `modified_on`)
		VALUES('".$recruiter_id."','" . $name . "','" . $gender. "','" . $dob . "','" . $email. "','" . $contact . "','".$doj."','".$emergency_contact."','".$local_address."','".$permanent_address."','".$education."','".$work_exp."','".$designation."','".$department."','".$reporting_to."','".$password."','".$created_on."','".$created_on."')";
        $result = $conn->query($query);
		if($result===TRUE) 
        {
			$q="insert into activities_tbl(timestamp,comment,user_id) values('".$created_on."','Profile Created.','".$recruiter_id."')";
            $r=$conn->query($q);    
                    	
            $message = "You have registered successfully!"; 
			header('location:tagteam.php?message='.$message);
        } 
        else 
        {
            $message = "Problem in registration. Try Again!";   
        }
	}
}
?>
<!DOCTYPE HTML>
<html>
<style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 100%;
      margin: auto;
  }
  #message{
        text-align: center;
        padding: 10px;
        border:1px solid #337ab7;
        margin-bottom: 10px;
    }
 </style>
<?php
include 'head.php';
?>
<body style="background-color:#f8f8f8;">
<?php
include 'header.php';
//include 'banner2.php';

?>



<div class="container" >
     <div class="single">  
	
<form action="" method="post">
		<div class="col-md-8 col-md-offset-2">
	 <?php 
        if(isset($message))
        {
    ?>
    <div class="message"> 
    <?php 
        echo $message; 
    ?>
    </div>
    <?php
        }
    ?>	
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">New User Registration</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="" method="post">
                                <fieldset>
                                    <div class="form-group" style="width:24%;padding-left: 0px;display:inline-block;">
                                       Name
                                    </div>
                                    <div class="form-group" style="width:24%;padding-left: 0px;display:inline-block;">
                                        <input class="form-control" style="width:100%;" required="required "name="name" type="text" autofocus>
                                    </div>
                                    <div class="form-group" style="width:24%;padding-left: 0px;display:inline-block;">
                                       Email
                                    </div>
                                    <div class="form-group" style="width:24%;padding-left: 0px;display:inline-block;">
                                        <input class="form-control" style="width:100%;" required="required" name="email" type="email" autofocus>
                                    </div>
                                     <div class="form-group" style="width:24%;padding-left: 0px;display:inline-block;">
                                      Contact
                                    </div>
                                    <div class="form-group" style="width:24%;padding-left: 0px;display:inline-block;">
                                        <input class="form-control" style="width:100%;" pattern="\d{10}" required="required" name="contact" type="contact" autofocus>
                                    </div>
									   <div class="form-group" style="width:24%;padding-left: 0px;display:inline-block;">
                                         Emergency Contact
                                    </div>
                                    <div class="form-group" style="width:24%;padding-left: 0px;display:inline-block;">
                                        <input class="form-control" pattern="\d{10}" style="width:100%;" required="required" name="emergency_contact" type="emergency contact" autofocus>
                                    </div>
									<div class="form-group" style="width:24%;padding-left: 0px;display:inline-block;">
                                      Date of Birth
                                    </div>
                                    <div class="form-group" style="width:24%;padding-left: 0px;display:inline-block;">
                                        <input class="form-control" style="width:100%;" required="required" name="dob" type="date" autofocus>
                                    </div>
									<div class="form-group" style="width:24%;padding-left: 0px;display:inline-block;">
                                       Date Of Joining
                                    </div>
                                    <div class="form-group" style="width:24%;padding-left: 0px;display:inline-block;">
                                        <input class="form-control" style="width:100%;" required="required" name="doj" type="date" autofocus>
                                    </div>
									<div class="form-group" style="vertical-align:top; width:24%;padding-left: 0px;display:inline-block;">                                       
                                       Local Address
                                    </div>
                                    <div class="form-group" style="width:24%;padding-left: 0px;display:inline-block;">
                                        <textarea class="form-control" id="addr1" style="width:100%;" required="required" name="local_address" type="address" autofocus></textarea>
                                    </div>
                                    <div class="form-group" style="vertical-align:top; width:24%;padding-left: 0px;display:inline-block;">
                                       Permanent Address<br>
									   <h6><input type="checkbox" id="check">Same as local address</h6>
                                    </div>
                                    <div class="form-group" style="width:24%;padding-left: 0px;display:inline-block;">
                                        <textarea class="form-control" id="addr2" style="width:100%;" required="required" name="permanent_address" type="permanent address" autofocus></textarea>
                                    </div>
									
									<div class="form-group" style="width:24%;padding-left: 0px;display:inline-block;">
                                       Gender
                                    </div>
                                    <div class="form-group" style="width:24%;padding-left: 0px;display:inline-block;">
                                        <select class="form-control" name="gender"required="required">
											<option value="">Select Gender</option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>
										</select>
                                    </div>
                                                                         
                                   	
								   
                                    <div class="form-group" style="width:24%;padding-left: 0px;display:inline-block;">
                                       Education
                                    </div>
                                    <div class="form-group" style="width:24%;padding-left: 0px;display:inline-block;">
                                        <select class="form-control"  name="education" required="required">
											<option value="">Select Education</option>
                                        <option value="Not Pursuing Graduation">Not Pursuing Graduation</option>
<option value="Compulsory Education">Compulsory Education</option>
<option value="Diploma">Diploma</option>
<option value="B.A">B.A</option>
<option value="B.Arch">B.Arch</option>
<option value="BCA">BCA</option>
<option value="B.B.A">B.B.A</option>
<option value="B.Com">B.Com</option>
<option value="B.Ed">B.Ed</option>
<option value="BDS">BDS</option>
<option value="BHM">BHM</option>
<option value="B.Pharma">B.Pharma</option>
<option value="B.Sc">B.Sc</option>
<option value="B.Tech/B.E.">B.Tech/B.E.</option>
<option value="LLB">LLB</option>
<option value="MBBS">MBBS</option>
<option value="BVSC">BVSC</option>
<option value="CA">CA</option>
<option value="CS">CS</option>
<option value="ICWA">ICWA</option>
<option value="Integrated PG">Integrated PG</option>
<option value="LLM">LLM</option>
<option value="M.A">M.A</option>
<option value="M.Arch">M.Arch</option>
<option value="M.Com">M.Com</option>
<option value="M.Ed">M.Ed</option>
<option value="M.Pharma">M.Pharma</option>
<option value="M.Sc">M.Sc</option>
<option value="M.Tech">M.Tech</option>
<option value="MBA/PGDM">MBA/PGDM</option>
<option value="MCA">MCA</option>
<option value="MS">MS</option>
<option value="PG Diploma">PG Diploma</option>
<option value="MVSC">MVSC</option>
<option value="Ph.D/Doctorate">Ph.D/Doctorate</option>
<option value="MPHIL">MPHIL</option>
										</select>
                                    </div> 
                                      
                                    <div class="form-group" style="width:24%;padding-left: 0px;display:inline-block;">
                                       Work Experience
                                    </div>
                                    <div class="form-group" style="width:24%;padding-left: 0px;display:inline-block;">
                                        <input class="form-control" style="width:100%;" required="required" name="work_exp" type="text" autofocus>
                                    </div>
                                    <div class="form-group" style="width:24%;padding-left: 0px;display:inline-block;">
                                       Departmant
                                    </div>
                                    <div class="form-group" style="width:24%;padding-left: 0px;display:inline-block;">
                                        <select class="form-control" name="department"required="required">
											<option value="">Select Department</option>
											<option value="IT Recruitment">IT Recruitment</option>
											<option value="Financial Recruitment">Financial Recruitment</option>
											<option value="BPO Recruitment">BPO Recruitment</option>
											<option value="Admin">Admin</option>
										</select>
                                    </div>  
                                    
									<div class="form-group" style="width:24%;padding-left: 0px;display:inline-block;">
                                         Designation
                                    </div>
                                    <div class="form-group" style="width:24%;padding-left: 0px;display:inline-block;">
                                        <select class="form-control" name="designation" required="required">
											<option value="">Select Designation</option>
											<option value="Intern">Intern</option>
											<option value="Jr. Recruiter">Jr. Recruiter</option>
											<option value="Recruiter">Recruiter</option>
											<option value="Sr. Recruiter">Sr. Recruiter</option>
											<option value="Team Lead / Recruitment">Team Lead / Recruitment</option>
											<option value="Recruitment Manager">Recruitment Manager</option>
											
										</select>
                                    </div>
                                    <div class="form-group" style="width:24%;padding-left: 0px;display:inline-block;">
                                         Reporting To
                                    </div>
                                    <div class="form-group" style="width:24%;padding-left: 0px;display:inline-block;">
                                        <select class="form-control" name="reporting_to" required="required">
											<option value="">Select </option>
											<option value="Team Leader">Team Leader</option>
											<option value="Manager">Manager</option>
											<option value="Sr. Manager">Sr. Manager</option>
										</select>
                                    </div>
                                   
                                    <!-- Change this to a button or input when using this as a form -->
                                    <div style="float:right;">
									<input type="submit" style="width:200px;" name="register_submit" class="btn btn-lg btn-success btn-block" value="Register"/>
									</div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
				</div>
	</form>
	</div>
	
</div>
<?php
include 'footer.php';
?>
</body>
</html>

<script>
$(document).ready(function(){
	
	$('#check').click(function() { 
		if ($(this).is(':checked')) 
		{ 
			$("#addr2").val($("#addr1").val());
		} 
		else
		{
			$("#addr2").val("");
		}
	});
 })      
</script>