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
	.holder {
				padding:3px;
				margin-left:auto;
				margin-right:auto;
				margin-top:10%;
				display:table;
				border:solid 1px #cccccc;
				border-width: thin;
			}
			.style {
				bottom:0px;
				border:1px solid #666;
				background-color:#FFF;
				border-radius:3px;
				-webkit-border-radius:3px;
				-moz-border-radius:3px;
				box-shadow:0 0 5px #000;			
				-moz-box-shadow:0 0 5px #000;			
				-webkit-box-shadow:0 0 5px #000;			
			}
			.alpha {
				float:right;
				width:300px;
				padding:2px;
				border:1px solid #666;
				background-color:#FFF;
				border-radius: 3px;
				}
			.refresh {
				border: 1px solid #3366FF;
				border-left: 4px solid #3366FF;
				color: green;
				font-family: tahoma;
				font-size: 12px;
				height: 225px;
				overflow: auto;
				width: 270px;
				padding:10px;
				background-color:#FFFFFF;
			}	
			#post_button{
				border: 1px solid #3366FF;
				background-color:#3366FF;
				width: 50px;
				color:#FFFFFF;
				font-weight: bold;
				margin-left: -04px; padding-top: 4px; padding-bottom: 4px;
				cursor:pointer;
			}
			#textb{
				border: 1px solid #3366FF;
				border-left: 4px solid #3366FF;
				padding-top: 5px;
				padding-bottom: 5px;
				padding-left: 5px;
				width: 220px;
			}
			#texta{
				border: 1px solid #3366FF;
				border-left: 4px solid #3366FF;
				width: 210px;
				margin-bottom: 10px;
				padding:5px;
			}
			#johnlei{
				margin-left:3px;
				
				color: #ffffff;
				text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
				background-color: #49afcd;
				*background-color: #2f96b4;
				background-image: -moz-linear-gradient(top, #5bc0de, #2f96b4);
				background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#5bc0de), to(#2f96b4));
				background-image: -webkit-linear-gradient(top, #5bc0de, #2f96b4);
				background-image: -o-linear-gradient(top, #5bc0de, #2f96b4);
				background-image: linear-gradient(to bottom, #5bc0de, #2f96b4);
				background-repeat: repeat-x;
				border-color: #2f96b4 #2f96b4 #1f6377;
				border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
				filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff5bc0de', endColorstr='#ff2f96b4', GradientType=0);
				filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
				float:right;
				cursor:pointer;	
				height: 53px;
				width:70px;
			}
			#johnlei:hover,
			#johnlei:active,
			#johnlei.active,
			#johnlei.disabled,
			#johnlei[disabled] {
				color: #ffffff;
				background-color: #51a351;
				*background-color: #499249;
			}
			#johnlei:active,
			#johnlei.active {
				background-color: #408140;
			}
			#johnlei:hover{
				background-color: #2f96b4;
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
            <h2 class="page-header">Messanger</h2>  
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
	
	<div class="holder">
		<label="welcomemsg">WELCOME: </label><label for="name"><?php echo $recruiter_id; ?></label>
			<div class="style">	
				<div class="alpha">
					<b align="center">You can view your chats here:</b>
					<input name="user" type="hidden" id="texta" value="<?php echo $recruiter_id; ?>"/>
					<div class="refresh">
					</div>
					<br/>
					<form name="newMessage" class="newMessage" action="" onsubmit="return false">
						<select name="recipient" id="recipient" style="width:270px;">
							<option>--Send Chat To--</option>
								<?php 
									$q = "SELECT * FROM recruiter_tbl where recruiter_id!='yadav_sushant@ymail.com' and status=1 ORDER BY name";
									$r=$conn->query($q);
									if($r->num_rows>0)
									{
										while($rw = $r->fetch_assoc())
										{
								?>
									<option title="<?php echo $rw['recruiter_id']; ?>"><?php echo $rw['name']; ?> </option>
									<?php }} ?>
						</select>
					<textarea name="textb" id="textb">Enter your message here</textarea>
					<input name="submit" type="submit" value="Send" id="johnlei" />
				</form>
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
        <script src="../js/jquery.js"></script>
<script type="text/javascript">
$(function() {
	$('#textb').click(function() {
		document.newMessage.textb.value = "";
	});
	
	$('#johnlei').click(function(){
		
		var username = $('#texta').val();
		var message = $('#textb').val();
		var recipient = $('#recipient').val();
		
		if (message == "" || message == "Enter your message here" || recipient == "" || recipient == "--Send Chat To--") {
			return false;
		}
		
		var dataString = 'username=' + username + '&message=' + message + '&recipient=' + recipient;
		
		$.ajax({
			type: "POST",
			url: "send_save_chat.php",
			data: dataString,
			success: function() {
				document.newMessage.textb.value = "";
			}
		});
	});
});
</script>
<script type="text/javascript">
$.ajaxSetup ({
	cache: false	//use for i.e browser to clean cache
});
$(setInterval(function(){
	$('.refresh').load('view.php'); //this means that the items loaded by display.php will be prompted into the class refresh 
	$('.refresh').attr({ scrollTop: $('.refresh').attr('scrollHeight') }) //if the messages overflowed this line tells the textarea to focus the latest message	
}, 3000));
</script>