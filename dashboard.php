
<html>
<head>
  <!-- jQuery -->
<script src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
<script src="../js/metisMenu.min.js"></script>

       
<!-- Custom Theme JavaScript -->
<script src="../js/startmin.js"></script>

      
<link type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css" />
 <script src=" https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>

        

<script src="../js/dataTables/jquery.dataTables.min.js"></script>
<script src="../js/dataTables/dataTables.bootstrap.min.js"></script>
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
          // "#DEB887",
          // "#A9A9A9",
          "#ff6699",
          "#F4A460",
          "#2E8B57"
        ],
        borderColor: [
          // "#CDA776",
          // "#989898",
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
    labels: ["Pranali", "Aniket", "Praghya"],
    datasets: [
      {
        label: "TeamB Score",
        data: [40, 60, 50],
        backgroundColor: [
          // "#FAEBD7",
          // "#DCDCDC",
          "#E9967A",
          "#F5DEB3",
          "#9ACD32"
        ],
        borderColor: [
          // "#E9DAC6",
          // "#CBCBCB",
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
<?php
 session_cache_limiter(FALSE);
  session_start(); 
  if(!isset($_SESSION['user_id']))
  {
    header("Location: ../tagteam.php");
  }

  require_once("../dbconfig.php");
 
?>






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
        <div class="col-md-12">
      <div class="col-md-3 col-sm-3">
        <div  id="menu-block" style="background-color:#34495E">
          <div  id="menu-icon" >
            <i class="fa fa-users" aria-hidden="true"></i>
            <h3>Hiring</h3>
          </div>
          <div  id="menu-footer"><a href="hiring.php">More <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a></div>
        </div>
      </div>
      <div class="col-md-3 col-sm-3">
        <div  id="menu-block" style="background-color:#16A085;">
          <div  id="menu-icon" >
            <i class="fa fa-money" aria-hidden="true"></i>
            <h3>Joined</h3>
          </div>
          <div  id="menu-footer"><a href="joined.php">More <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a></div>
        </div>
      </div>
      <div class="col-md-3 col-sm-3">
        <div  id="menu-block" style="background-color:#F39C12;">
          <div  id="menu-icon" >
            <i class="fa fa-bell" aria-hidden="true"></i>
            <h3>To Joined</h3>
          </div>
          <div  id="menu-footer"><a href="to_joined.php">More <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a></div>
        </div>
      </div>
      <div class="col-md-3 col-sm-3">
        <div  id="menu-block" style="background-color:#2980B9;">
          <div  id="menu-icon" >
            <i class="fa fa-tasks" aria-hidden="true"></i>
            <h3>Decliend</h3>
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
  </div>
  <hr>
  
  </div>
  
  </div>

</body>
</html>


        

