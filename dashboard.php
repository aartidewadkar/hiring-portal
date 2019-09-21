
<?php
include 'head.php';
?>

<html>
<?php
 session_cache_limiter(FALSE);
  session_start(); 
  if(!isset($_SESSION['user_id']))
  {
    header("Location: ../tagteam.php");
  }

  require_once("../dbconfig.php");
 
?>
<head>
 
      
<link type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css" />
 <script src=" https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>

 <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script> -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="../js/dataTables/jquery.dataTables.min.js"></script>
<script src="../js/dataTables/dataTables.bootstrap.min.js"></script>

</head>



<style>
.col-md-3{
    padding:10px 0 10px 0;
}
#menu-block{
  width:170px; height:150px;background-color:rgba(0,0,0,0.1);
}
#menu-icon{
  padding:20px 0 0 0; text-align:center; font-size:3.9em;
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
h1{
  color: white;
 
}


</style>

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
        <div class="col-md-12">
      <div class="col-md-3 col-sm-3">
        <div  id="menu-block" style="background-color:#34495E">
          <div  id="menu-icon" ><a href="hiring.php">
            <?php 
              $query= "SELECT id FROM hiring_tbl order by id";
              $result=$conn->query($query);

             $row= mysqli_num_rows($result);
             echo '<h1>'.$row.'</h1>';

            ?></a>
            <h3>Hiring</h3>
          </div>
          <div  id="menu-footer"><a href="hiring.php">More <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a></div>
        </div>
      </div>
      <div class="col-md-3 col-sm-3">
        <div  id="menu-block" style="background-color:#16A085;">
          <div  id="menu-icon" ><a href="joined.php">
            <?php 
              $query= "SELECT id FROM hiring_tbl WHERE status='Joined' order by id";
              $result=$conn->query($query);

             $row= mysqli_num_rows($result);
             echo '<h1>'.$row.'</h1>';

            ?></a>
            <h3>Joined</h3>
          </div>
          <div  id="menu-footer"><a href="joined.php">More <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a></div>
        </div>
      </div>
      <div class="col-md-3 col-sm-3">
        <div  id="menu-block" style="background-color:#F39C12;">
          <div  id="menu-icon" ><a href="to_joined.php">
             <?php 
              $query= "SELECT id FROM hiring_tbl WHERE status='To Joined' order by id";
              $result=$conn->query($query);

             $row= mysqli_num_rows($result);
             echo '<h1>'.$row.'</h1>';

            ?></a>
            <h3>To Joined</h3>
          </div>
          <div  id="menu-footer"><a href="to_joined.php">More <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a></div>
        </div>
      </div>
      <div class="col-md-3 col-sm-3">
        <div  id="menu-block" style="background-color:#ff4d4d;">
          <div  id="menu-icon" ><a href="decliend.php">
           <?php 
              $query= "SELECT id FROM hiring_tbl WHERE status='Declined' order by id";
              $result=$conn->query($query);

             $row= mysqli_num_rows($result);
             echo '<h1>'.$row.'</h1>';

            ?></a>
            <h3>Declined</h3>
          </div>
          <div  id="menu-footer"><a href="decliend.php">More <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a></div>
        </div>
      </div>
      
    </div>
  </div>
  <hr>
  <div class="row" style="margin-top: 5%;">
    <div class="col-md-6">
      <div class="table-wrapper-scroll-y my-custom-scrollbar">
     <table class="table table-bordered table-striped mb-0">
       <thead>
          <tr>
           <th>Recruiter Name</th>
           <th>Total</th>
           <th>Joined</th>
           <th>To Joined</th>
           <th>Rejected</th>
          </tr>
        </thead>
         <tbody>
         <?php
         $query ="SELECT COUNT(*), status, recruiter FROM `hiring_tbl` 
        WHERE status='Joined' GROUP BY status";


//          $query="SELECT hiring_tbl.recruiter FROM `hiring_tbl` 
// INNER JOIN hiring_tbl ON hiring_tbl.recruiter_id=hiring_tbl.id 
// WHERE results.subject='History' and results.result='excellence'
// GROUP BY hiring_tbl.name";



// SELECT recruiter_tbl.name, count(hiring_tbl.id) FROM `hiring_tbl` 
// INNER JOIN recruiter_tbl ON hiring_tbl.recruiter_id=recruiter_tbl.id
// GROUP BY hiring_tbl.recruiter_id
// HAVING count(hiring_tbl.status) > 0
// ORDER BY count(hiring_tbl.status) ASC;  


         $result= $conn->query($query);

          $row= mysqli_num_rows($result);
             // echo '<h1>'.$row.'</h1>';

          if ($result->num_rows>0)
           {
            
            while ($row= $result->fetch_assoc()) 
            {
              
            ?>
              <tr class="odd gradeX">
               <td><?php echo $row['recruiter'];?></td>


             </tr>
             <?php 
                 }
             }
                    ?>

           
        </tbody>
     </table>
    </div>

    </div>
    <div class="col-md-6">
      <canvas id="densityChart" width="200" height="160"></canvas>
    </div>
    
  </div>
  <hr>
  </div>
  
  </div>

</body>
<?php 
  
?>
<script type="text/javascript">

  $(function(){
    
  
  var densityCanvas = document.getElementById("densityChart");


var last_yr_record = {
  label: '2018 (Last Year)',
  data: [1300, 1400, 1500, 1100, 1100, 687, 1271, 1638, 1000, 800, 900, 1250],
  backgroundColor: 'rgba(0, 99, 132, 0.6)',
  borderWidth: 0,
  yAxisID: "y-axis-density"
};

var current_yr_record = {
  label: '2019 (Current Year)',
  data: [3.7, 8.9, 9.8, 3.7, 23.1, 9.0, 8.7, 11.0, 4.8, 10.2,14.2,8.9],
  backgroundColor: 'rgba(99, 132, 0, 0.6)',
  borderWidth: 0,
  yAxisID: "y-axis-gravity"
};

var month_record = {
  labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
  datasets: [last_yr_record, current_yr_record]
};

var chartOptions = {
  scales: {
    xAxes: [{
      barPercentage: 1,
      categoryPercentage: 0.6
    }],
    yAxes: [{
      id: "y-axis-density"
    }, {
      id: "y-axis-gravity"
    }]
  }
};

var barChart = new Chart(densityCanvas, {
  type: 'bar',
  data: month_record,
  options: chartOptions
});

})

</script>
</html>


        

