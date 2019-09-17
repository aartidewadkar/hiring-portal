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
#menu-block{
	width:140px; height:140px;background-color:rgba(0,0,0,0.1);
}
#menu-icon{
	padding:10px 0 0 0; text-align:center; font-size:3.9em;
	color:#ffffff;
}
#menu-icon h3{
	font-family:Trebuchet MS, Helvetica, sans-serif;
}
#menu-footer{
	vertical-align:bottom;  background-color:rgba(0,0,0,0.3);text-align:center;color:#ffffff;
}
#menu-footer:hover{
	 background-color:rgba(0,0,0,0.5);
	 cursor:pointer;
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
            <h2 class="page-header">Search Candidates</h2>  
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
                                <b>Search</b>
                        </div>
                                                <div class="panel-body">
                        	<div class="row">
                        		<form role="form" action="searchResult1.html">
                                	<div class="col-lg-8" id="form-group">
                                    	<label >Any</label>
                                       	<input type="text" class="form-control" name="" placeholder="Skill, Designation, Role seperated by comma" />
                                     </div>
                                     <div class="col-lg-8" id="form-group">
                                    	<label >All</label>
                                       	<input type="text" class="form-control" name="" placeholder="Skill, Designation, Role seperated by comma" />
                                     </div>
                                     <div class="col-lg-8" id="form-group">
                                    	<label >Exclude</label>
                                       	<input type="text" class="form-control" name="" placeholder="Skill, Designation, Role seperated by comma" />
                                     </div>
                                     <div class="col-lg-8" id="form-group">
                                    	<label >Location</label>
                                       	<select name="" class="form-control">
                                       		<option value="">Select Location</option>
                                       		<option value="Pune">Pune</option>
                                       		<option value="Mumbai">Mumbai</option>
                                       		<option value="Kolhapur">Kolhapur</option>
                                       		<option value="Nashik">Nashik</option>
                                       	</select>
                                     </div>
                                     <div class="col-lg-8" id="form-group">
                                    	<label >Experience</label>
                                       	<input type="text" class="form-control" style="width:20%; display:inline-block;" name="" placeholder="" />
                                       	<span>To</span>
                                       	<input type="text" class="form-control" style="width:20%;display:inline-block;" name="" placeholder="" />
                                     </div>
                                      <div class="col-lg-8" id="form-group">
                                    	<label >Salary</label>
                                       	<input type="text" class="form-control" style="width:20%; display:inline-block;" name="" placeholder="" />
                                       	<span>To</span>
                                       	<input type="text" class="form-control" style="width:20%;display:inline-block;" name="" placeholder="" />
                                     </div>
                                      <div class="col-lg-8" id="form-group">
                                    	<label >Education</label>
                                   		<select class="form-control" name="qual">
                                   			<option value="">Select Qualification</option>
                                   			<option value="Diploma">Diploma</option>
                                   			<option value="Under Graduate">Under Graduate</option>
                                   			<option value="Graduate">Graduate</option>
                                   			<option value="BE/BTech">BE/BTech</option>
                                   			<option value="Masters">Masters</option>
                                   			<option value="Chartered Accountant">Chartered Accountant</option>
                                   		</select>
                                     </div>
                                     <div class="col-lg-8" id="form-group">
                                    	<label >Employer</label>
                                       	<input type="text" id="employer" class="form-control" style="width:30%; display:inline-block;" name="" placeholder="" />
                                       	<input type="radio"  name="btnEmp" id="btnEmp1" checked="checked"/> Any
                                       	<input type="radio"  name="btnEmp" id="btnEmp2" /> Current/Previous
                                     </div>
                                     <div class="col-lg-8" id="form-group">
                                    	<label >Designation</label>
                                       	<input type="text" id="designation" class="form-control" style="width:30%; display:inline-block;" name="" placeholder="" />
                                       	<input type="radio"  name="btnDesig" id="btnDesig1" checked="checked"/> Any
                                       	<input type="radio"  name="btnDesig" id="btnDesig2" /> Current/Previous
                                     </div>
                                     <div class="col-lg-8" id="form-group">
            							<label >Notice</label>
                                   		<select class="form-control" name="">
                                   			<option value="">Select Notice Period </option>
                                   			<option value="SNP">SNP</option>
                                   			<option value="15">15 Days</option>
                                   			<option value="30">30 Days</option>
                                   			<option value="60">60 Days</option>
                                   			<option value="90">90 Days</option>
                                   		</select>
            						</div>
            						 <div class="col-lg-8" id="form-group">
                                    	<label >Gender</label>
                                       	<input type="radio"  name="btnGender" id="btnGender" checked="checked" value="Male"/> Male
                                       	<input type="radio"  name="btnGender" id="btnGender" value="Female" /> Female
                                     </div>
                                     <div class="col-lg-8" id="form-group">
                                   		<input type="submit" class="btn btn-primary" name="" value="Search" style="float:right;">
                                   	</div>
                                 </form>
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
<script type="text/javascript">
$(document).ready(function () {
	$("#employer").attr("disabled", true);
	$("#designation").attr("disabled",true);
	
	$('#btnEmp1').click(function() 
	{
		$("#employer").attr("disabled", true);
	});
	$('#btnDesig1').click(function() 
	{
		$("#designation").attr("disabled", true);
	});
	$('#btnEmp2').click(function() 
	{
		$("#employer").attr("disabled", false);
	});
	$('#btnDesig2').click(function() 
	{
		$("#designation").attr("disabled", false);
	});
});
</script>