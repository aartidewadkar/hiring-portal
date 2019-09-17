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
            <h2 class="page-header">Candidate List</h2>  
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
                                <b>All</b>
                        </div>
                        <div class="panel-body">
                        	<!--<div class="row">
                        		<form role="form" action="">
                                	<div class="col-lg-12">
                                    	<div class="srch-key" style="display:inline-block;" id="key1">
                                    		<label style="border:1px solid gray;padding:5px;">Java Developer <span id="remove1" style="color:#337ab7;">X</span></label>
                                       	</div>
                                       	<div style="display:inline-block;" id="key2">
                                    		<label style="border:1px solid gray;padding:5px;">Pune <span id="remove2" style="color:#337ab7;">X</span></label>
                                       	</div>
                                       	<div style="display:inline-block;float:right;">
                                    		<input type="submit" class="btn btn-primary" name="" value="Modify">
                                       	</div>
                                       	
                                     </div>
                                 </form>
                             </div>-->
                             </div>
                            
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                            
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" style="font-size: 14px;" id="dataTables-example">
                                        <thead>
                                            <tr>
                                            	
                                                <th>Name</th>
                                                <th>Contact</th>
                                                <th>Email</th>
                                                <th>Experience</th>
                                                <th>Employer</th>
                                                <th>Notice</th>
												<th>Resume</th>
                                            </tr>
                                        </thead>
                                        
										
										<tbody>
											<?php
											$query="SELECT * FROM candidate_tbl c INNER JOIN experience_tbl e ON c.candidate_id = e.candidate_id";
											$result=$conn->query($query);
											if($result->num_rows>0)
											{ 
												while($row = $result->fetch_assoc())
												{
													$exp=$row['experience'];
													$y=round($exp/12);
													$m=round($exp%12);
											?>
                                            <tr class="odd gradeX">
                                                <td><?php echo $row['first_name']." ".$row['last_name'] ;?></td>
                                                <td><?php echo $row['contact'];?></td>
                                                <td><?php echo $row['email'];?></td>
                                                <td>
												<?php	
													if($y>0)
													{ echo $y." Years ";} 
													else if($m>0)
													{echo $m." Months";}
													else
													{echo "Fresher";}
												?></td>
                                                <td ><?php echo $row['employer'];?></td>
                                                <td ><?php echo $row['notice'];?></td>
												<td  style="text-align:center;"><a href="<?php echo $row['resume'];?>"><i class="fa fa-download" aria-hidden="true"></i></a></td>
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
	
	$('#remove1').click(function() 
	{
		$('#key1').remove();	
	});
	$('#remove2').click(function() 
	{
		$('#key2').remove();	
	});
});
</script>