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
			var patnn=/^[a-z]{2}( ){0}[0-9]{3}$/i;
			if(document.getElementById("co").value == "")
			{
				document.getElementById("lco").style.color="red";
				v=false;
			
			}
			else{
				if(patnn.test(document.getElementById("co").value) == false)
				{
					document.getElementById("lco").style.color="red";
					v=false;
				}
				
				else
				{
				document.getElementById("lco").style.color="black";
				}
		        }
			
			 patnn=/^\w{2,15}$/i;
			if(document.getElementById("cname").value == "")
			{
				document.getElementById("lcname").style.color="red";
				v=false;
			
			}
			else{
				if(patnn.test(document.getElementById("cname").value) == false)
				{
					document.getElementById("lcname").style.color="red";
					v=false;
				}
				
				else
				{
				document.getElementById("lcname").style.color="black";
				}
		        }
				 patnn=/^[0-9]{1,10}$/i;
			if(document.getElementById("ln").value == "")
			{
				document.getElementById("lln").style.color="red";
				v=false;
			
			}
			else{
				if(patnn.test(document.getElementById("ln").value) == false)
				{
					document.getElementById("lln").style.color="red";
					v=false;
				}
				
				else
				{
				document.getElementById("lln").style.color="black";
				}
		        }
				return v;
		}
</script>
	</head>
<?
include_once ("connection.php");

function Form($conn)
{
	?>
	<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Added Course <i class="menu-icon icon-book"> </i></h3>
							</div>
									<div class="module-body">

									<form class="form-horizontal row-fluid" action="" method="post" onsubmit="return valid();">
										<div class="control-group">
											<label class="control-label" for="basicinput" id="lco">Course Number</label>
											<div class="controls">
												<input type="text" id="co" name="C_no" placeholder="CS***" class="span8">
										
											</div>
										</div>
									
									<div class="control-group">
											<label class="control-label" for="basicinput" id="lcname">Course Name</label>
											<div class="controls">
												<input type="text" id="cname" name="C_name" class="span8">
										
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="basicinput">Credits</label>
											<div class="controls">
												<select name="Credits" tabindex="1"  class="span8">
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													
													
												</select>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="basicinput" id="lln">Lecturer Number</label>
											<div class="controls">
												<input type="text" id="ln" name="L_no" class="span8">
										
											</div>
										</div>
				

										<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn btn-primary pull-right">ADD <i class="menu-icon icon-plus"></i></button>
											</div>
										</div>
									</form>
							</div>
						</div>
<?
}
function insert($conn)
{
	?>
	<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Added Course <i class="menu-icon icon-book"></i></h3>
							</div>
							
							<div class="module-body">

							<?
							extract($_POST);
	try
	{

		extract($_POST);
		$sql="INSERT INTO Course (C_no,C_name,Credits,L_no) VALUES ('$C_no','$C_name','$Credits','$L_no')";
        if($conn->exec($sql))
		{
			echo "<h3>Has Added Of Course <i class='icon-ok'></i></h3>";
		}

	}	
	catch(PDOException $e)
	{
		echo $sql , $e->getMessage();
	}
		$conn = null;
		?>
		</div>
		</div>
		</div>
		</div>
		<?

}

?>
<body>

	<div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="homeAdmin.php"><b class="copyright">Computer Seience</b></a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav nav-icons">
                            <li class="active"><a href=""><i class="icon-envelope"></i></a></li>
                            <li><a href=""><i class="icon-eye-open"></i></a></li>
                            <li><a href=""><i class="icon-bar-chart"></i></a></li>
                        </ul>
                        <form class="navbar-search pull-left input-append" action="">
                        <input type="text" class="span3" placeholder="Search">
                        <button class="btn" type="button">
                            <i class="icon-search"></i>
                        </button>
                        </form>
                        <ul class="nav pull-right">
						
								<li class="nav-user dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown">
									 Time <i class="menu-icon icon-time"></i>
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                              
                                    <li><a href=""><? echo date(" h:i a "); ?></a></li>
									<li><a href=""><? echo date(" d-m-Y "); ?></a></li>
   
                                    <li class="divider"></li>
                                  
                                </ul>
						
                            </li>
						
   
                            <li><a href=""><? session_start(  ); echo $_SESSION['Name']; ?> </a></li>
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="images/users.png" class="nav-avatar" />
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="">Your Profile</a></li>
                                    <li><a href="">Edit Profile</a></li>
                                    <li><a href="">Account Settings</a></li>
                                    <li class="divider"></li>
                                    <li><a href="login.php">Logout</a></li>
                                </ul>
						
                            </li>
					
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="homeAdmin.php"><i class="menu-icon icon-home"></i>Home
                                </a></li>
                                 <li><a href="add_user.php"><i class="menu-icon icon-user"></i>Add User</a></li>
                            </ul>
							 <ul class="widget widget-menu unstyled">
                                <li><a class="collapsed" data-toggle="collapse" href="#SE"><i class="menu-icon icon-tasks">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>Semester </a>
                                    <ul id="SE" class="collapse unstyled">
                                        <li><a href="inset_semester.php"><i class="icon-plus"></i> Add</a></li>

                                        <li><a href="update_semester.php"><i class="icon-refresh"></i> Update</a></li>
									   <li><a href="delete_semester.php"><i class="icon-trash"></i>Delete</a></li>
                                    </ul>
                                </li>
                                <li><a href="View_result.php"><i class="menu-icon icon-file"></i> View Results</a></li>
                            </ul>
							
							
                            <!--/.widget-nav-->
                            
                            
                            <ul class="widget widget-menu unstyled">
                                 <li><a class="collapsed" data-toggle="collapse" href="#CO"><i class="menu-icon icon-book">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>Course </a>
                                    <ul id="CO" class="collapse unstyled">
                                        <li><a href="insert_course.php"><i class="icon-plus"></i> Add</a></li>
										<li><a href="view_course.php"><i class="icon-file"></i> View</a></li>
                                        <li><a href="update_course.php"><i class="icon-refresh"></i> Update</a></li>
									   <li><a href="delete_course.php"><i class="icon-trash"></i> Delete</a></li>
                                    </ul>
                                </li>
                                <li><a href=""><i class="menu-icon icon-facebook"></i>Facebook <b class="label orange pull-right">
                                    3</b></a></li>
								 <li><a href=""><i class="menu-icon icon-twitter"></i>Twitter  </a></li>
   
                                <li><a href=""><i class="menu-icon icon-rss"></i>W3School </a></li>
      
                            </ul>
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
                                <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i class="menu-icon icon-cog">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>More Option </a>
                                    <ul id="togglePages" class="collapse unstyled">
                                        <li><a href=""><i class="icon-edit"></i> Edit </a></li>
                                        <li><a href=""><i class="icon-group"></i> All Users </a></li>
                                    </ul>
                                </li>
                                <li><a href="login.php"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
					<?
	if(isset($_POST['submit']))
	{
		insert($conn);	
	}

	else{
		Form($conn);
	}
		
?>
				

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

	<div class="footer">
		<div class="container">
			 

			<b class="copyright"><i class="icon-tag"></i> 2017 Assignment - Tripoli University / Computer Science.com </b>
		</div>
	</div>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
</body>
</html>