<?php
 session_cache_limiter(FALSE);
  session_start(); 
  if(!isset($_SESSION['user_id']))
  {
    header("Location: ../tagteam.php");
  }

  require_once("../dbconfig.php");
 
?>


<?php

if(isset($_POST["register_submit"]))
{
    $name=$_POST["name"];
    $doi=$_POST["doi"];
    $phone=$_POST["phone"];
    $client=$_POST["client"];
    $hr=$_POST["hr"];
    $doj=$_POST["doj"];
    $status=$_POST["status"];
    $recruiter=$_POST["recruiter"];
    $center=$_POST["center"];
    $department=$_POST["department"];
    
   
    
    date_default_timezone_set("Asia/Kolkata");
    $created_on=date("Y-m-d h:i:sa");
    $password=rand(11111,99999);
    $hiring_id=$email;



 $query= "INSERT INTO `hiring_tbl`(`hiring_id`, `name`, `doi`, `phone`, `client`, `hr`, `doj`, `status`, `recruiter`, `center`, `department`, `created_on`, `updated_on`) 
 VALUES ('".$hiring_id."','".$name."','".$doi."','".$phone."','".$client."','".$hr."','".$doj."','".$status."','".$recruiter."','".$center."','".$department."','".$created_on."','".$updated_on."')";
     
        $result = $conn->query($query);
        if($result===TRUE) 
        {
            $q="insert into activities_tbl(timestamp,comment,user_id) values('".$created_on."','Profile Created.','".$recruiter_id."')";
            $r=$conn->query($q);    
                        
            $message = "You have registered successfully!"; 
            header('location:hiring.php?message='.$message);
        } 
        else 
        {
            $message = "Problem in registration. Try Again!";   
        }
    }

?>



<html>
<style>

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
            <h2 class="page-header">Hiring</h2>  
        </div>
    </div>
    
    <form role="form" action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm();"> 
    
    <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                                <b>New Entry Form</b>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                    <div class="col-lg-6" id="form-group"> 
                                        <label >First Name</label>
                                        <input type="text" class="form-control" name="name" required="required">
                                     </div>
                                    <div class="col-lg-6" id="form-group">
                                        <label >D.O.I</label>
                                        <input type="date" class="form-control" name="doi" required="required">
                                     </div>
                                     <div class="col-lg-6" id="form-group">
                                        <label >Phone</label>
                                        <input type="text" class="form-control" name="phone" required="required" pattern="\d{10}">
                                     </div>
                                     <div class="col-lg-6" id="form-group">
                                        <label >Client</label>
                                        <input type="text" class="form-control" name="client" required="required">
                                     </div>

                                      <div class="col-lg-6" id="form-group">
                                        <label >HR</label>
                                        <input type="text" class="form-control" name="hr" required="required">
                                     </div>
                                     <div class="col-lg-6" id="form-group">
                                        <label >D.O.J</label>
                                        <input type="date" class="form-control" name="doj">
                                     </div>
                                      <div class="col-lg-6" id="form-group">
                                        <label >Status</label>
                                         <select class="form-control" name="status"  required="required">
                                             <option value="">Select Status</option>
                                            <option value="To Joined" selected="selected">To Joined</option>
                                            <option value="Joined" selected="selected" >Joined</option>
                                            <option value="Declined" selected="selected" >Declined</option>
                                        </select>
                                     </div>
                                      <div class="col-lg-6" id="form-group">
                                        <label >Recruiter</label>
                                        <input type="text" class="form-control" name="recruiter" required="required">
                                     </div>

                                     <div class="col-lg-6" id="form-group">
                                        <label >Center</label>
                                        <select class="form-control" name="center"  required="required">
                                             <option value="">Select Center</option>
                                            <option value="Phase 1">Phase 1</option>
                                            <option value="Phase 2">Phase 2</option>
                                            <option value="Phase 3">Phase 3</option>
                                        </select>
                                        
                                     </div>
                                      <div class="col-lg-6" id="form-group">
                                        <label >Department</label>
                                        <select class="form-control" name="department"  required="required">
                                             <option value="">Select Department</option>
                                            <option value="FNA/BPO">FNA/BPO</option>
                                            <option value="IT">IT</option>
                                        </select>
                                        
                                     </div>
                                    <div style="float:right;">
                                    <input type="submit" style="width:170px; margin:10px 20px" name="register_submit" class="btn btn-lg btn-success btn-block" value="Register"/>
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
   
