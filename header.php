<?php
$recruiter_id=$_SESSION['user_id'];
   $result = $conn->query("select * from recruiter_tbl where recruiter_id='".$recruiter_id."'");
  $row = $result->fetch_assoc();
?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="navbar-header">
            <a class="navbar-brand" href="../index.php" target="_blank" style="padding:5px 15px;">
			<img src="../images1/logo.png"/ style="padding:6px 15px;height:50px;">
			</a>
        </div>
		
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

       

        <!-- Top Navigation: Right Menu -->
        <ul class="nav navbar-right navbar-top-links" style="padding-top:5px;">
            <li class="dropdown navbar-inverse">
				<div id="clockbox" style="color:#ffffff;"></div>
			</li>
			<li class="dropdown navbar-inverse">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-envelope fa-fw"></i> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
				</ul>
			</li>
			<li class="dropdown navbar-inverse">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-comment fa-fw"></i> New Comment
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </li>
			<li class="dropdown navbar-inverse">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-tasks fa-fw"></i> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
				</ul>
			</li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <b class="caret"></b>
                </a>
				
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="profile.php"><!--<img src="profiles/default.jpg" class="img-circle" height="40px" width="40px"/> &nbsp;&nbsp;&nbsp;--> <i class="fa fa-user fa-fw"></i> Profile</a>
                    </li>
                    <li><a href="changePwd.php"><i class="fa fa-pencil-square-o fa-fw"></i> Change Password</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
		<?php
		include 'menu.php';
		?>
	</nav>
