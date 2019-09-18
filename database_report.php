<?php
 session_cache_limiter(FALSE);
  session_start(); 
  if(!isset($_SESSION['user_id']))
  {
    header("Location: ../tagteam.php");
  }

  require_once("../dbconfig.php");
 
 date_default_timezone_set("Asia/Kolkata");
$end_date = date('Y-m-d');
$start_date=date( 'Y-m-d');

?>

<html>

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
            <h2 class="page-header">Dashboard</h2>  
        </div>
    </div>

  <div class="row">

  <div class="cls mainPadtop tabbg mainPadLR">
<a href="#" class="tabsel"><span>Database Usage</span></a>
<span>/</span>
<a href="#" class="tabUnsel"><span>User Login</span></a> 


</div>


<div class="cont_border">
<form action="" name="form1" method="POST">

<h3>One Click Report </h3>
<div class="rowtxt" style="margin-top:10px;">
    <label>Specify Time Period: </label>
    <p>
      <input name="quick" type="radio" value="yesterday" > Yesterday
      <input name="quick" type="radio" value="week" style="margin-left:10px;"> This Week
      <input name="quick" type="radio" value="month" style="margin-left:10px;"> This Month</p>
</div>

<div class="cls" style="padding:10px 0 0 185px;"><span class="subBor">
<input name="submit" type="submit" class="submit"  value="Generate Report" style="width:120px;">
</span>
</div>
<?php



if(isset($_POST['submit']))
{
  $report_type= $_POST['quick'];

  if($report_type == 'yesterday')
  {
    $start_date=date( "Y-m-d", strtotime( " -1 days" ) ); 
  }
   if($report_type == 'week')
  {
     $start_date=date( "Y-m-d", strtotime( " -7 days" ) ); 
  }
   if($report_type == 'month')
  {
     $start_date=date( "Y-m-d", strtotime( " -30 days" ) ); 
  }
}

?>
</form>
</div>

<div class="cont_border">
<form action="" name="form2" method="POST">
<h3>Customised Report</h3>
<div class="rowtxt" style="margin-top:10px;">
    <label>Specify Durations:</label>
    <p>From
      <input type="date" name="startdate">

      To 
      <input type="date" name="enddate">

</p>
</div>

<div class="rowtxt">
    <label>Specify Report Type:  </label>
    <p><select name="sorttype" style="width:150px;">
    <option name="sorttype" value="summary">Summary</option>
    <option name="sorttype" value="quarterly">Quarterly</option>
    <option name="sorttype" value="monthly">Monthly</option>
    <option name="sorttype" value="daily">Daily</option>
        </select></p>
</div>



<div class="cls rowtxt">
    <label>Specify the Display format: </label>
    <p>
      <input name="mistype" type="radio" value="browser" checked=""> Display in browser
      <input name="mistype" type="radio" value="excel" style="margin-left:10px;"> Download in Excel</p>
</div>
<div class="cls" style="padding:10px 0 0 185px;"><input name="submit2" id="form2" onclick="myFunction()"type="submit" value="Generate Report" style="width:120px;">
</div>

<?php

  if(isset($_POST['submit2']))
{
  
  $specific_report=$_POST['sorttype'];

  if($specific_report== 'quarterly')
  {
   
    $start_date=date( "Y-m-d", strtotime( " -91 days" ) ); 

  }
  if($specific_report== 'monthly')
  {
    
    $start_date=date( "Y-m-d", strtotime( " -30 days" ) ); 
  }
  if($specific_report== 'daily')
  {

    $start_date=date( "Y-m-d", strtotime( " -1 days" ) ); 
  }
}


?>

</form>
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
                        $query= "SELECT * FROM hiring_tbl WHERE doj BETWEEN '$start_date' and '$end_date' order by doj";
                        $result=$conn->query($query);
                        if($result->num_rows>0)
                        { 

                            while($row = $result->fetch_assoc())
                                {
                                ?>
                  <tr class="odd gradeX">
                    <td><?php echo $row['id'] ;?></td>
                    <td><?php echo $row['name'];?></td>
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
                  unset($_POST); 
             }
                    ?>
                                            
                </tbody>
      </table>
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
