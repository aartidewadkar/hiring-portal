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
    $recruiter_id=$_POST["recruiter_id"];
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
   



 $query= "INSERT INTO `hiring_tbl`(`recruiter_id`, `name`, `doi`, `phone`, `client`, `hr`, `doj`, `status`, `recruiter`, `center`, `department`, `created_on`, `updated_on`) 
 VALUES ('".$recruiter_id."','".$name."','".$doi."','".$phone."','".$client."','".$hr."','".$doj."','".$status."','".$recruiter."','".$center."','".$department."','".$created_on."','".$updated_on."')";
    
        $result = $conn->query($query);
         // echo "$result";
        var_dump($result);
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
        
    <div class="row">
        <div class="col-md-12">
           <form action="" method="post">
            <div class="login-panel panel panel-default" style="margin-top: 4;">
                        <div class="panel-heading">
                            <h3 class="panel-title">New Entry Form</h3>
                        </div>
                        <div class="panel-body" style="line-height: 4;padding: 35px;">
                            <form role="form" action="" method="post">
                                <fieldset>
                                    <div class="form-group" style="width:20%;padding-left: 0px;display:inline-block;">
                                       Name
                                    </div>
                                    <div class="form-group" style="width:24%;padding-left: 0px;display:inline-block;">
                                        <input class="form-control" placeholder="Full Name" style="width:100%;" required="required "name="name" type="text" autofocus>
                                    </div>
                                    <div class="form-group" style="width:20%;padding-left: 40px;display:inline-block;">
                                      D.O.I
                                    </div>
                                    <div class="form-group" style="width:24%;padding-left: 0px;display:inline-block;">
                                        <input class="form-control" style="width:100%;" required="required" name="doi" type="date" autofocus>
                                    </div>
                                     <div class="form-group" style="width:20%;padding-left: 0px;display:inline-block;">
                                      Phone
                                    </div>
                                    <div class="form-group" style="width:24%;padding-left: 0px;display:inline-block;">
                                        <input class="form-control" style="width:100%;" pattern="\d{10}" required="required" name="phone" type="contact" autofocus>
                                    </div>
                                       <div class="form-group" style="width:20%;padding-left: 40px;display:inline-block;">
                                         Client
                                    </div>
                                     <div class="form-group" style="width:24%;padding-left: 0px;display:inline-block;">
                                        <input class="form-control" placeholder="Company name" style="width:100%;" required="required" name="client" type="text" autofocus>
                                    </div>
                                    <div class="form-group" style="width:20%;padding-left: 0px;display:inline-block;">
                                     HR
                                    </div>
                                    <div class="form-group" style="width:24%;padding-left: 0px;display:inline-block;">
                                        <input class="form-control" style="width:100%;" required="required" name="hr" type="text" autofocus>
                                    </div>
                                    <div class="form-group" style="width:20%;padding-left: 40px;display:inline-block;">
                                       Date Of Joining
                                    </div>
                                    <div class="form-group" style="width:24%;padding-left: 0px;display:inline-block;">
                                        <input class="form-control" style="width:100%;" required="required" name="doj" type="date" autofocus>
                                    </div>
                                    <div class="form-group" style="width:20%;padding-left: 0px;display:inline-block;">
                                       Recruiter Name
                                    </div>
                                    <div class="form-group" style="width:24%;padding-left: 0px;display:inline-block;">
                                        <input class="form-control" style="width:100%;" required="required "name="recruiter" type="text" autofocus>
                                    </div>
                                    <div class="form-group" style="width:20%;padding-left: 40px;display:inline-block;">
                                       Recruiter Id
                                    </div>
                                    <div class="form-group" style="width:24%;padding-left: 0px;display:inline-block;">
                                        <input class="form-control" style="width:100%;" required="required "name="recruiter_id" type="email" autofocus>
                                    </div>
                                     <div class="form-group" style="width:20%;padding-left: 0px;display:inline-block;">
                                       Status
                                    </div>
                                    <div class="form-group" style="width:29%;padding-left: 0px;display:inline-block;">
                                        <select class="form-control" name="status" required="required">
                                            <option value="">Select Status</option>
                                            <option value="To Joined" selected="selected">To Joined</option>
                                            <option value="Joined" selected="selected" >Joined</option>
                                            <option value="Declined" selected="selected" >Declined</option>
                                    </select>
                                    </div>
                                   
                                     
                                    <div class="form-group" style="width:15%;padding-left: 0px;display:inline-block;">
                                      Center
                                    </div>
                                    <div class="form-group" style="width:30%;padding-left: 0px;display:inline-block;">
                                        <select class="form-control" name="center"required="required">
                                            <option value="">Select Center</option>
                                            <option value="Phase 1"> Phase 1</option>
                                            <option value="Phase 2"> Phase 2</option>
                                             <option value="Phase 3"> Phase 3</option>
                                        </select>
                                    </div>
                                                                         
                                    
                                   
                                    <div class="form-group" style="width:15%;padding-left: 0px;display:inline-block;">
                                       Department
                                    </div>
                                    <div class="form-group" style="width:37%;padding-left: 40px;display:inline-block;">
                                        <select class="form-control"  name="department" required="required">
                                           <option value="">Select Department</option>
                                            <option value="BPO"> BPO</option>
                                            <option value="FNA"> FNA</option>
                                            <option value="IT"> IT</option>
                                            
                                        </select>
                                    </div> 
                                     
                                    <!-- Change this to a button or input when using this as a form -->
                                    <div style="float:right;">
                                    <input type="submit" style="width:170px; margin:10px 20px" name="register_submit" class="btn btn-lg btn-success btn-block" value="Register"/>
                                    </div>
                                </fieldset>
                            </form>
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
   
