<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Computer Science</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
<script type="text/javascript">
	
	function valid()
	{
		var v=true;
		var patnn=/^[a-z]{3,15}( ){0,1}[a-z]{2,15}$/i;
		
		if(document.getElementById("name").value == "")
		{
			document.getElementById("lname").style.color="red";
			document.getElementById("nmsg").innerHTML="The Name Is Empty";
			v=false;
		
		}
		else{
			if(patnn.test(document.getElementById("name").value) == false)
			{
				document.getElementById("lname").style.color="red";
				document.getElementById("nmsg").innerHTML="The Name Incorrect";
				v=false;
			}
			
			else
			{
			document.getElementById("lname").style.color="black";
			document.getElementById("nmsg").innerHTML=" ";
			}
		}
		patnn=/^[a-z]{3,15}(_){1}[a-z]{2,15}$/i;
		if(document.getElementById("user").value == "")
		{
			document.getElementById("luser").style.color="red";
			document.getElementById("umsg").innerHTML="The User Name Is Empty";
			v=false;
		
		}
		else{
			if(patnn.test(document.getElementById("user").value) == false)
			{
				document.getElementById("luser").style.color="red";
				document.getElementById("umsg").innerHTML="The User Name Incorrect";
				v=false;
			}
			
			else
			{
			document.getElementById("luser").style.color="black";
			document.getElementById("umsg").innerHTML=" ";
			}
		}
		patnn=/^[a-zA-Z][a-zA-Z0-9\._-]{7,18}$/i;
		if(document.getElementById("pass").value == "")
		{
			document.getElementById("lpass").style.color="red";
			document.getElementById("pmsg").innerHTML="The Password Is Empty";
			v=false;
		
		}
		else{
			if(patnn.test(document.getElementById("pass").value) == false)
			{
				document.getElementById("lpass").style.color="red";
				document.getElementById("pmsg").innerHTML="Password So Easy";
				v=false;
			}
			
			else
			{
			document.getElementById("lpass").style.color="black";
			document.getElementById("pmsg").innerHTML=" ";
			}
			
		}
		return v;
	}
	
	</script>
	</head>
	<?php
include_once("connection.php");						
function display_form()
{
	
	?>	
		
	<div class="wrapper">
					<div class="container">
						<div class="row">
							<br><br><br><br>
									<form action="#" method="post" class="form-horizontal row-fluid" onsubmit="return valid();">
									<div class="control-group">
											<label class="control-label" for="basicinput" id="lname">Name</label>
											<div class="controls">
												<input type="text" id="name"  class="span8" name="Name"><label id="nmsg"></label>
										
											</div>
									</div>
									
										<div class="control-group">
											<label class="control-label" for="basicinput" id="luser">User Name</label>
											<div class="controls">
												<input type="text"  name="User_Name" id="user"  class="span8" placeholder="User_Name"><label id="umsg"></label>
										
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput" id="lpass">Password</label>
											<div class="controls">
												<input  type="password"  name="Password" id="pass" placeholder="*******"  class="span8 tip"><label id="pmsg"></label>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Nationality</label>
											<div class="controls">
												<select name="Nationality" tabindex="1" data-placeholder="Libya" class="span8">
													<option  value="Libya">Libya</option>
													<option  value="USA">USA</option>
													<option  value="Malta">Malta</option>
												</select>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label">Prive : </label><br>
											<div class="controls">
												<label class="radio">
													<input type="radio" name="Prive" value="S" checked="">
													student
												</label> 
	
											</div>
										</div>
									
									<div class="control-group">
											<div class="controls">
											<button type="submit" name="submit" class="btn btn-primary pull"> Sing Up <i class="icon-signout"></i></button>
											</div>
										</div>
									</form>
									<br><br><br><br>
									</div>
									</div>
									</div>
									
						
<?php	
				
}
					
function insert($conn)
{
	extract($_POST);
	try
	{
		$sql="INSERT INTO users (U_name,Password,Priv,Name,Nationality) VALUES ('$User_Name','$Password','S','$Name','$Nationality')";
        $conn->exec($sql);		
	}	
	catch(PDOException $e)
	{
		echo $sql , $e->getMessage();
	}
		$conn = null;
}
							
?>

<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>

			  	<a class="brand" href="">
			  		Computer Science
			  	</a>
				

				<div class="nav-collapse collapse navbar-inverse-collapse">
				
					<ul class="nav pull-right">

						<li><a href="login.php">
							Log in
						</a></li>
					</ul>
				</div><!-- /.nav-collapse -->
								<div class="nav-collapse collapse navbar-inverse-collapse">
				
					<ul class="nav pull-right">

						<li><a href="">
							<?php
								echo date("F d,Y");
							?>
						</a></li>
					</ul>
				</div>
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->	
<?PHP
	if(isset($_POST['submit']))
{	?>
		<div class="wrapper">
					<div class="container">
						<div class="row">
						<?
	insert($conn);
	echo ( "  <h3>  Has Login <i class='icon-ok'></i></h3>");
	?>
	</div>
	</div>
	</div>
	<?
}
else
{ 
	
	display_form();
}
	
	?>

<br>

	<div class="footer">
		<div class="container">
			 

			<b class="copyright"><i class="icon-tag"></i> 2017 Assignment - Tripoli University / Computer Science.com </b>
		</div>
	</div>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>