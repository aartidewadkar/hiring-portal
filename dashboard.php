
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

<?php 
   $labels = [];
   $counts = [];

  $query= "SELECT name, count(recruiter_id) as num_candidate FROM recruiter_tbl group by name";
    $result=$conn->query($query);
    var_dump($result);
  
    // if($result->num_rows > 0){
    //       while($row = $result->fetch_assoc()){
            
    //         // echo "['".$row['name']."', ".$row['num_candidate']."],";
    //         array_push($labels,$row['name']);
    //         array_push($counts,$row['num_candidate']);
    //   // print_r($labels);
            
    //       }
    //  }

    //  else
    //  {
    //   echo "no records in this month";
    //  }
    //   var_dump($labels);
?>
<script>

  $(function(){

  //get the doughnut chart canvas
  var ctx1 = $("#doughnut-chartcanvas-1");
  var ctx2 = $("#doughnut-chartcanvas-2");

  //doughnut chart data
  var data1 = {
    labels: ["Sneha", "Priya", "Archana"],
    datasets: [
      {
        label: "TeamA Score",
        data: [50, 70, 40],
        backgroundColor: [
          "#ff6699",
          "#F4A460",
          "#2E8B57"
        ],
        borderColor: [
          "#b75ff5",
          "#E39371",
          "#1D7A46"
        ],
        borderWidth: [1, 1, 1]
      }
    ]
  };

  //doughnut chart data
  var data2 = {
    labels: [],
    datasets: [
      {
        label: "TeamB Score",
        data: [40, 60, 50],
        backgroundColor: [
          "#E9967A",
          "#F5DEB3",
          "#9ACD32"
        ],
        borderColor: [
          "#D88569",
          "#E4CDA2",
          "#89BC21"
        ],
        borderWidth: [1, 1, 1]
      }
    ]
  };

  //options
  var options1 = {
    responsive: true,
    title: {
      display: true,
      position: "top",
      text: "Highest Performance",
      fontSize: 18,
      fontColor: "#111"
    },
    legend: {
      display: true,
      position: "bottom",
      labels: {
        fontColor: "#333",
        fontSize: 16
      }
    }
  };

  var options2 = {
    responsive: true,
    title: {
      display: true,
      position: "top",
      text: "Lowest Performance",
      fontSize: 18,
      fontColor: "#111"
    },
    legend: {
      display: true,
      position: "bottom",
      labels: {
        fontColor: "#333",
        fontSize: 16
      }
    }
  };

  //create Chart class object
  var chart1 = new Chart(ctx1, {
    type: "doughnut",
    data: data1,
    options: options1
  });

  //create Chart class object
  var chart2 = new Chart(ctx2, {
    type: "doughnut",
    data: data2,
    options: options2
  });
});






  
</script>
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
          <div  id="menu-icon" >
            <?php 
              $query= "SELECT id FROM hiring_tbl order by id";
              $result=$conn->query($query);

             $row= mysqli_num_rows($result);
             echo '<h1>'.$row.'</h1>';

            ?>
            <h3>Hiring</h3>
          </div>
          <div  id="menu-footer"><a href="hiring.php">More <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a></div>
        </div>
      </div>
      <div class="col-md-3 col-sm-3">
        <div  id="menu-block" style="background-color:#16A085;">
          <div  id="menu-icon" >
            <?php 
              $query= "SELECT id FROM hiring_tbl WHERE status='Joined' order by id";
              $result=$conn->query($query);

             $row= mysqli_num_rows($result);
             echo '<h1>'.$row.'</h1>';

            ?>
            <h3>Joined</h3>
          </div>
          <div  id="menu-footer"><a href="joined.php">More <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a></div>
        </div>
      </div>
      <div class="col-md-3 col-sm-3">
        <div  id="menu-block" style="background-color:#F39C12;">
          <div  id="menu-icon" >
             <?php 
              $query= "SELECT id FROM hiring_tbl WHERE status='To Joined' order by id";
              $result=$conn->query($query);

             $row= mysqli_num_rows($result);
             echo '<h1>'.$row.'</h1>';

            ?>
            <h3>To Joined</h3>
          </div>
          <div  id="menu-footer"><a href="to_joined.php">More <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a></div>
        </div>
      </div>
      <div class="col-md-3 col-sm-3">
        <div  id="menu-block" style="background-color:#ff4d4d;">
          <div  id="menu-icon" >
           <?php 
              $query= "SELECT id FROM hiring_tbl WHERE status='Declined' order by id";
              $result=$conn->query($query);

             $row= mysqli_num_rows($result);
             echo '<h1>'.$row.'</h1>';

            ?>
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
      <canvas id="doughnut-chartcanvas-1"></canvas>
    </div>
    <div class="col-md-6">
      <canvas id="doughnut-chartcanvas-2"></canvas>
    </div>
    <?php

    
     ?>
  </div>
  <hr>

  <div class="row">
  <canvas id="densityChart" width="600" height="400"></canvas>
</div>
  
  </div>
  
  </div>

</body>
<script type="text/javascript">

  $(function(){
    
  
  var densityCanvas = document.getElementById("densityChart");

// Chart.defaults.global.defaultFontFamily = "Lato";
// Chart.defaults.global.defaultFontSize = 18;

var densityData = {
  label: 'Density of Planet (kg/m3)',
  data: [5427, 5243, 5514, 3933, 1326, 687, 1271, 1638],
  backgroundColor: 'rgba(0, 99, 132, 0.6)',
  borderWidth: 0,
  yAxisID: "y-axis-density"
};

var gravityData = {
  label: 'Gravity of Planet (m/s2)',
  data: [3.7, 8.9, 9.8, 3.7, 23.1, 9.0, 8.7, 11.0],
  backgroundColor: 'rgba(99, 132, 0, 0.6)',
  borderWidth: 0,
  yAxisID: "y-axis-gravity"
};

var planetData = {
  labels: ["Mercury", "Venus", "Earth", "Mars", "Jupiter", "Saturn", "Uranus", "Neptune"],
  datasets: [densityData, gravityData]
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
  data: planetData,
  options: chartOptions
});

})

</script>
</html>


        

