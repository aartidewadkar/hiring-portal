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

if(isset($_GET['id']))
{
$id=$_GET['id'];	
$query="SELECT * FROM hiring_tbl where id=".$id;
$result =$conn->query($query);
if($result ->num_rows>0)
{ 
	$row = $result ->fetch_assoc();
}
}

if(isset($_POST["update_submit"]))
{
  $doj= $_POST["doj"];
  $status= $_POST["status"];

  date_default_timezone_set("Asia/Kolkata");
    $modified_on=date("Y-m-d h:i:sa");	
	
  
} 
?>

<div id="page-wrapper">
	<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Edit Status</h2>  
        </div>
    </div>
	
	<form action="" method="post">
	<div class="row">
        <div class="col-lg-12">
         	<div class="panel panel-default">
               		<div class="panel-heading">
               			<b><?php echo $row['id']; ?></b> [ Cadidate Name: <?php echo $row['name']; ?> ] 
               		</div>

                <!-- </div> -->
				<div class="panel-body">
					<div class="col-md-12">
						
						<div class="col-md-3">
							<b>Date Of Joining</b>
						</div>
						<div class="col-md-3">
							<input type="date" class="form-control" name="doj" value="<?php echo $row['doj']; ?>"/>
						</div>
						<div class="col-md-3">
							<b>status</b>
						</div>
						<div class="col-md-3">
							<select class="form-control" name="status" required="required">
											<option value="">Select Status</option>
											<option value="Joined" <?php if($row['status']=='Joined'){ ?>selected="selected" <?php }?>>Joined
											</option>
											<option value="To Joined" <?php if($row['status']=='To Joined'){ ?>selected="selected" <?php }?>>To Joined</option>
											<option value="Decliend" <?php if($row['status']=='Decliend'){ ?>selected="selected" <?php }?>>Decliend</option>
									
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


