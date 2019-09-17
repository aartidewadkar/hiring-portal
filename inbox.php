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
           <h2 class="page-header">Mail</h2> 
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
    
	$dns = "{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX";
    $email = "yadavsushant1992@gmail.com";
    $password = "sushant_123";

    $openmail = imap_open($dns,$email,$password ) or die("Cannot Connect ".imap_last_error());
    
	if ($openmail) {
	?>
	<div class="row">
            	<div class="col-lg-12">
                	<div class="panel panel-default">
                    	<div class="panel-heading">
                                <b>Inbox(<?php echo imap_num_msg($openmail);?>)</b>
                        </div>
                        <div class="panel-body">
                        	<div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" style="font-size: 14px;" id="dataTables-example">
                                        <thead>
                                            <tr>
                                            	<th>Sr. No.</th>
                                                <th>Subject</th>
												<th>Date & Time</th>
												
                                            </tr>
                                        </thead>
										<tbody>
											<?php
											$x=0;
											//for($i=imap_num_msg($openmail); $i >0; $i--) 
											for($i=imap_num_msg($openmail); $i >imap_num_msg($openmail)-26; $i--) 	
											{
												$x++;
												$header = imap_header($openmail,$i);
												echo " ";
           
											?>
											<tr class="odd gradeX">
												<td><?php echo $x; ?></td>
												<td><?php echo $header->Subject; ?></td>
												<td><?php $d=substr($header->Date,0,strrpos($header->Date," ")); echo date_format(date_create($d),"d/m/Y H:i:s");  ?></td>
											</tr>
											<?php 
												}  
											?>
										</tbody>
									</table>
									
                        	</div>
						</div>
				</div>
	</div>
	<?php
		} 
	?>
	
	
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
