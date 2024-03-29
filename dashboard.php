
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
 
  <div class="row" style="margin-top: 5%;">
    <div class="col-md-6">
      <div class="table-wrapper-scroll-y my-custom-scrollbar">
     <table class="table table-bordered table-striped mb-0" style="font-size: 13px;"  id="dataTables-example">
       <thead>
          <tr>
           <th>Recruiter Name</th>
           <th>Total</th>
           <th>Joined</th>
           <th>To Joined</th>
           <th>Rejected</th>
           <th>CR Trend</th>
          </tr>
        </thead>
         <tbody>

      <?php
       
      $query="SELECT recruiter, count(id) as Total, 
        sum(case when status='Joined' then 1 else 0 end) as Joined,
        sum(case when status='To Joined' then 1 else 0 end) as ToJoined,
        sum(case when status='Declined' then 1 else 0 end) as Declined
        from hiring_tbl GROUP BY recruiter";

       $result= $conn->query($query);
         if ($result->num_rows>0)
           {
            
            while ($row= $result->fetch_assoc()) 
            {
              
            ?>
              <tr class="odd gradeX">
               <td><?php echo $row['recruiter'];?></td>
               <td><?php echo $row['Total'];?></td>
               <td><?php echo $row['Joined'];?></td>
               <td><?php echo $row['ToJoined'];?></td>
               <td><?php echo $row['Declined'];?></td>

             </tr>
             <?php 
                 }
             }
                    ?>

           
           
        </tbody>
     </table>
    </div>
     <div>
      <canvas id="myChart" width="10" height="5"></canvas>
    </div>

    </div>
    <div class="col-md-6">
      <canvas id="densityChart" width="200" height="160"></canvas>
    </div>
    </div>

   
 
  </div>
  
  </div>

</body>

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


// my chart js//
var data3 = {
    labels: [
        // "Red",
        // "Blue",
        // "Yellow"
    ],
    datasets: [
        {
            data: [300, 50, 100],
            backgroundColor: [
                "#FF6384",
                "#36A2EB",
                "#FFCE56"
            ],
            hoverBackgroundColor: [
                "#FF6384",
                "#36A2EB",
                "#FFCE56"
            ]
        }]
};

var ctx = document.getElementById("myChart");

// And for a doughnut chart
var myDoughnutChart = new Chart(ctx, {
    type: 'doughnut',
    data: data3,
    options: {
      rotation: 1 * Math.PI,
      circumference: 1 * Math.PI
    }
});
</script>
</html>


        

