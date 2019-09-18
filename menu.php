<style>
#photo{
	margin:0 auto;width:120px;height:120px;background:url(<?php echo $row['photo']; ?>);background-size: 120px 120px;border-radius:100px;
}
#photo:hover{

	cursor:pointer;
}
#photo:hover #photo-cap{
	display:inline-block;
	color:#ffffff;
	
}
#photo:hover #photo-cap a{
	background-color:rgba(0,0,0,0.5);
}
#photo-cap{
	margin:auto; padding-top:45%;
	display:none;
}
#photo-cap a{
	text-decoration:none;
	padding:3px;
	border-radius:5px;
}
</style>

<div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">

                <ul class="nav" id="side-menu">
                    <li style="padding:20px 0 0 0;text-align:center;">
						<div id="photo">
							<div id="photo-cap"><a href="changePhoto.php">Change Photo</a></div>
						</div>
						<br>
						<span style="color:rgba(0,0,0,0.5);color:#b9c9d8;"><i class="fa fa-key" aria-hidden="true"></i> <i>Logged in as</i></span><br>
						<span style="color:rgba(0,0,0,0.7);font-size:1.5em;font-family:Trebuchet MS, Helvetica, sans-serif;color:#ffffff;"><?php echo $row['name']; ?></span>
						
					</li>
					<li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button" style="background-color:#34495E; border:1px solid #ffffff; height: 34px;">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                        </div>
                    </li>
                    <li>
                        <a href="dashboard.php" ><i class="fa fa-dashboard fa-fw"></i> Hiring</a>
                    </li>
                    
					 <li>
                        <a href="walk_in.php"><i class="fa fa-male"></i> Walk In</a>
                    </li>
                    <li>
                        <a href="#" ><i class="fa fa-dashboard fa-fw"></i> Drive Tracker</a>
                    </li>
                    <li>
                        <a href="hiring.php"><i class="fa fa-list-alt fa-fw"></i>Reports</a>
                    </li>
                    <li>
                        <a href="messanger.php"><i class="fa fa-comments-o fa-fw"></i> Messanger</a>
                    </li>
					
                   
					
               </ul>
			</div>
            
        </div>