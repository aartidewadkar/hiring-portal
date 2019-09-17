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
    if (!empty($_FILES["photo"]["name"])) 
  {
        date_default_timezone_set("Asia/Kolkata");
        $photo_updated_on=date("Y-m-d h:i:sa");  

        $file_name=$_FILES["photo"]["name"];
        $temp_name=$_FILES["photo"]["tmp_name"];
        $filetype=$_FILES["photo"]["type"];
        $a=explode('.',$_FILES['photo']['name']);
        $b=end($a);
        $ext= strtolower($b);
        $filename=date("d-m-Y")."-".time().".".$ext;
        $target_path= "../recruiter/profiles/".$filename;
        if(move_uploaded_file($_FILES["photo"]["tmp_name"],$target_path))            
        {
          $str=$row['photo'];
          $r=strcmp($str,"../recruiter/profiles/default.jpg");

            if($r!=0)
            {
              unlink($str);
            }
            $query="update recruiter_tbl set photo='".$target_path."', modified_on='".$photo_updated_on."' where recruiter_id='".$recruiter_id."'";
            $result = $conn->query($query);
            if($result===TRUE) 
            {
                $message = "Profile photo updated successfully. "; 
                header('Location:dashboard.php?message='.$message);
            }
            else
            {
                 $message = "Problem in upload. Try Again!";  
            }
        }
  }
}

?>

 <div id="page-wrapper">
        <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Change Profile Photo</h2>  
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
	<form action="" method="post" enctype="multipart/form-data">
	<div class="row">
        <div class="col-lg-12">
         	<div class="panel panel-default">
               	<div class="panel-heading">
                    <b><?php echo $row['name']; ?></b> [ Recruiter ID: <?php echo $row['recruiter_id']; ?> ] <span style="float:right;">Last Modified: <?php echo $row['modified_on']; ?></span>
                </div>
				<div class="panel-body">
					<div class="col-md-10">
						<div class="col-md-3">
							<b>Select New Photo</b>
						</div>
						<div class="col-md-9">
							<input type="file" class="form-control" name="photo"  required="required"/> 
						</div>
						<div >
							<input type="submit" style="width:200px;" name="update_submit" class="btn btn-lg btn-success btn-block" value="Upload"/>
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