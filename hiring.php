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
#menu-footer a{
	text-decoration:none;
	color:#ffffff;
}
#menu-footer:hover{
	 background-color:rgba(0,0,0,0.5);
	 cursor:pointer;
}
.easypiechart-panel {
    text-align: center;
    padding: 1px 0;
    margin-bottom: 20px;
}
.easypiechart {
    position: relative;
    text-align: center;
    width: 120px;
    height: 120px;
    margin: 20px auto 10px auto;
}

.easypiechart .percent {
    display: block;
    position: absolute;
    font-size: 40px;
	font-weight:600;
    top: 30px;
    width: 120px;
	color: #ffffff;
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
            <h2 class="page-header">Hiring List</h2>  
        </div>
    </div>
		
	<div class="row">
        <div class="col-lg-12">
          	<div class="panel panel-default">
               	<div class="panel-heading">
                    <b>All Jobs</b>
                     <a href="new_entry_hiring.php" class="btn btn-lg btn-success " style="width:130px; padding: 10px 4px; margin-left: 20">Add New Entry</a>
                     <a href="database_report.php" class="pull-right">Database Usage Reports</a>
                </div>
	<div class="panel-body">
    <div class="dataTable_wrapper">
        <table class="table table-striped table-bordered table-hover" style="font-size: 14px;" id="dataTables-example">
            <thead>
                <tr>
                 <th>Sr.</th>
                 <th>Name</th>
                 <th>D.O.I</th>
                 <th>Phone</th>
                 <th>Client</th>
                 <th>HR</th>
                 <th>D.O.J </th>
                 <th>Status</th>
                 <th>Recruiter</th>
                 <th>Center</th>
                 <th>Department</th>
					
				</tr>
            </thead>
			<tbody>
                    <?php
                        $query="SELECT * FROM hiring_tbl";
                        $result=$conn->query($query);
                        if($result->num_rows>0)
                        { 
                            while($row = $result->fetch_assoc())
                                {
                                ?>
                  <tr class="odd gradeX">
                                        <td><a href="edit_hiring_status.php?id=<?php echo $row['id'] ;?>"><?php echo $row['id'] ;?>
                     </a></td>
                    <td><a href="edit_hiring_status.php?id=<?php echo $row['id'] ;?>"><?php echo $row['name'];?>
                    </a></td>
                    <td><?php echo $row['doi'];?></td>
                    <td><?php echo $row['phone'];?></td>
                    <td ><?php echo $row['client'];?></td>
                    <td ><?php echo $row['hr'];?></td>
                    <td ><?php echo $row['doj'];?></td>
                    <td ><?php echo $row['status'];?></td>
                    <td ><?php echo $row['recruiter'];?></td>
                    <td ><?php echo $row['center'];?></td>
                    <td ><?php echo $row['department'];?></td>
                     </tr>
                    <?php 
                 }
             }
                    ?>
                                            
                </tbody>
			</table>
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
<script>
$(document).ready(function() 
{
	$('#dataTables-example').DataTable({
    	responsive: true
    });
	
});
</script>