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
			patnn=/^[a-z]{3,10}$/i;
		if(document.getElementById("nat").value == "")
		{
			document.getElementById("lnat").style.color="red";
			v=false;
		
		}
		else{
			if(patnn.test(document.getElementById("nat").value) == false)
			{
				document.getElementById("lnat").style.color="red";
				v=false;
			}
			
			else
			{
			document.getElementById("lnat").style.color="black";
			}
		}
		patnn=/^[a-z]{3,10}$/i;
		if(document.getElementById("ad").value == "")
		{
			document.getElementById("lad").style.color="red";
			v=false;
		
		}
		else{
			if(patnn.test(document.getElementById("ad").value) == false)
			{
				document.getElementById("lad").style.color="red";
				v=false;
			}
			
			else
			{
			document.getElementById("lad").style.color="black";
			}
			}
			patnn=/^([a-z0-9_\.-]+)@([da-z\.-]+)\.([a-z\.]{2,6})$/i;
		if(document.getElementById("email").value == "")
		{
			document.getElementById("lemail").style.color="red";
			document.getElementById("emsg").innerHTML="The Email Is Empty";
			v=false;
		
		}
		else{
			if(patnn.test(document.getElementById("email").value) == false)
			{
				document.getElementById("lemail").style.color="red";
				document.getElementById("emsg").innerHTML="The Email Incorrect Ex:User_Name@mail.com";
				v=false;
			}
			else
			{
			document.getElementById("lemail").style.color="black";
			document.getElementById("emsg").innerHTML=" ";
			}
		}
		patnn=/^[0-9]{4}$/;
		if(document.getElementById("y").value == "")
		{
			document.getElementById("ly").style.color="red";
			v=false;
		
		}
		else{
			if(patnn.test(document.getElementById("y").value) == false)
			{
				document.getElementById("ly").style.color="red";
				v=false;
			}
			else
			{
			document.getElementById("ly").style.color="black";
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
	$sql="SELECT DISTINCT Gender FROM Info";
	$rows=$conn->query($sql);
	?>
	<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Update Student Info <i class="icon-refresh"></i></h3>
							</div>
												<div class="module-body">

									<form class="form-horizontal row-fluid" action="" method="post">
									
										
									<form class="form-horizontal row-fluid" action="" method="post">
										
												
										<div class="control-group">
											<label class="control-label" for="basicinput">Name Student</label>
											<div class="controls">
												<input type="text" id="basicinput" name="Name"  placeholder="Search" class="span8">
										
											</div>
										</div>
									
									
									
										<div class="control-group">
											<label class="control-label" for="basicinput">ID Number Of Student</label>
											<div class="controls">
												<input type="text" id="basicinput" placeholder="Search" name="ID" class="span8">
										
											</div>
										</div>
										
										
										<div class="control-group">
											<label class="control-label" for="basicinput">Gender</label>
											<div class="controls">
												<select name="Gender" tabindex="1"  class="span8">
													<option  value=""></option>
													<?
													while($row=$rows->fetch(PDO::FETCH_OBJ))
													{
														?>
														<option  value="<? echo $row->Gender ?>" ><? echo $row->Gender ?></option>;
													<?
													}
													?>
													
												</select>
											</div>
										</div>
									

				

										<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn btn-primary pull-right">Search <i class="icon-search"></i></button>
											</div>
										</div>
									</form>
							</div>
						</div>
<?
}
function update($conn)
{
	?>
	<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Update Student Info <i class="icon-refresh"></i></h3>
							</div>
							
							<div class="module-body">

	<?
	extract($_POST);
	try
	{

		$sql="UPDATE Info,users SET Name='$Name',Gender='$Gender',Address='$ad',Email='$email',Year=$ye,Gender='$Gender' WHERE I_no='$I_nu' AND Info.U_no=users.U_no";
        $conn->exec($sql);
		
			echo "<h3> Has Updated <i class='icon-ok'></i></h3>";
		
		
		$conn->exec($sql);
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

function FormInfo($conn)
{
	if(isset($_POST['I_noo']))
	{
		
	
	extract($_POST);
	
	$rows=$conn->query("SELECT * FROM Info,users WHERE I_no='$I_noo' AND Info.U_no=users.U_no ");
	$row=$rows->fetch(PDO::FETCH_OBJ);

	?>
	<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Update Student Info <i class="icon-refresh"></i></h3>
							</div>
							
							<?
							echo "<br><center>ID Number : ";
							echo $row->I_no;
							echo "</center>";
								?>
							<div class="module-body">

									<form class="form-horizontal row-fluid" action="" method="post" onsubmit="return valid();">
										
										<input  type="hidden" name="I_nu" value="<? echo $I_noo; ?>" >
										
										<div class="control-group">
											<label class="control-label" for="basicinput" id="lname">Name</label>
											<div class="controls">
												<input type="text" name="Name" value="<? echo $row->Name ?>" id="name" class="span8"><label id="nmsg"></label>
										
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="basicinput" id="lnat">Nationality</label>
											<div class="controls">
												<input type="text" name="Nationality" Value="<? echo $row->Nationality ?>"  id="nat"  class="span8">
										
											</div>
										</div>
									
										<div class="control-group">
											<label class="control-label" for="basicinput" id="lad">Address</label>
											<div class="controls">
												<input type="text" value="<? echo $row->Address ?>" name="ad" id="ad"  class="span8">
										
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="basicinput" id="lemail">Email</label>
											<div class="controls">
												<input  type="text" value="<? echo $row->Email; ?>" name="email" placeholder="User_Name@****.com" id="email" class="span8 tip"><label id="emsg"></label>
											</div>
										</div>

										
					 					<div class="control-group">
											<label class="control-label">Gender</label>
											<div class="controls">
											<?php 
							if($row->Gender=='male')
						{
							echo '<label class="radio">
													<input type="radio" name="Gender" value="male" checked>
													Male
												</label> 
												<label class="radio">
													<input type="radio" name="Gender" value="female">
													Female
												</label> ';
						}
						else
						{
							echo '<label class="radio">
													<input type="radio" name="Gender" >
													Male
												</label> 
												<label class="radio">
													<input type="radio" name="Gender" checked value="female">
													Female
												</label> ';
						}   ?>       
												
	
											</div>
										</div>
										
													
										<div class="control-group">
											<label class="control-label" for="basicinput" id="ly">Year</label>
											<div class="controls">
												<input  type="text" name="ye" value="<? echo $row->Year;?>" id="y" class="span8 tip">
											</div>
										</div>
										
				

										<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit_info" class="btn btn-primary pull-right">Update <i class="icon-refresh"></i></button>
											</div>
										</div>
									</form>
							</div>
						</div>
	
<?
	}
	else{
		Form($conn); 
	}
}
function formRadio($conn)
{
	extract($_POST);
	$rows2= $conn->query("SELECT * FROM Info,users WHERE  I_no LIKE '$ID%' AND Name LIKE '$Name%' AND Info.U_no=users.U_no");
	$rows= $conn->query("SELECT * FROM Info,users WHERE  I_no LIKE '$ID%' AND Name LIKE '$Name%' AND Info.U_no=users.U_no" );

	if(! $rows2->fetch(PDO::FETCH_OBJ))
	{
		Form($conn);
		return;
	}
	?>
	<div class="span9">
					<div class="content">

						<div class="module">
						
							<div class="module-head">
								<h3>Update Student Info <i class="icon-refresh"></i></h3>
							</div>
										<div class="module-body">
										<form action="" method="post" class="form-horizontal row-fluid">
								
										<table class="table">
											<thead>
											<tr>
												<th>#</th>
												<th>ID</th>
												<th>Name</th>
												<th>Nationality</th>
												<th>Email</th>
									 
											</tr>
											</thead>
												<tbody>
										<?
											while($row=$rows->fetch(PDO::FETCH_OBJ))
											{
												?>
												<label class="radio">
													<tr><td>
													<input type="radio" name="I_noo" value="<? echo $row->I_no; ?>"></td>
													<?
															
															echo	"<td>$row->I_no</td>
																	<td>$row->Name</td>
																	<td>$row->Nationality</td>
																	<td>$row->Email</td>
																	</tr>";
													?>
													</tbody>
												</label> 
	
										
										<?
											}
										?>
										</table>
									
										
										<div class="control-group">
											<div class="controls">
												<button type="submit" name="submitR" class="btn btn-primary pull-right"> Edit <i class="icon-edit"></i></button>
											</div>
										</div>
									</form>
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
		formRadio($conn);	
	}
	else if(isset($_POST['submitR']))
	{
		FormInfo($conn);
	}
	else if(isset($_POST['submit_info']))
	{
		update($conn);
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