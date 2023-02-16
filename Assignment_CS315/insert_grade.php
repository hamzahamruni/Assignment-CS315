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
		var patnn=/^[0-9]{1,3}$/i;
		if(document.getElementById("grade").value == "")
		{
			document.getElementById("gmsg").innerHTML="The Grade Is Empty";
			v=false;
		
		}
		else{
			if(patnn.test(document.getElementById("grade").value) == false)
			{
				document.getElementById("gmsg").innerHTML="The Grade Incorrect";
				v=false;
			}
			
			else
			{
			document.getElementById("gmsg").innerHTML=" ";
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
	
	$rows=$conn->query("SELECT C_no FROM Result");
	
	?>
	
				<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>ADD Grades <i class="icon-bar-chart"></i></h3>
							</div>
												<div class="module-body">
				
				<form class="form-horizontal row-fluid" action="" method="post">
				<div class="control-group">
						<label class="control-label" for="basicinput">Course Number</label>
						
						<div class="controls">
								<select name="C_no" tabindex="1"  class="span8">
									<option  value=""></option>
									<? 
									while($row=$rows->fetch(PDO::FETCH_OBJ))
									{
										
										?>
										<option  value="<? echo $row->C_no; ?>"><? echo $row->C_no; ?></option>
										<?
										
									}
													
										?>
													
								</select>
						
										<br><br>
								
										<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn btn-primary pull-right">View</button>
											</div>
										</div>
										</form>
								
						</div>
				</div>
										
										
										
	<?
}

function View($conn)
{
	$count=0;
// Test
	$sql="SELECT DISTINCT S_no FROM Result";
	$test1=$conn->query($sql);
	$Max_Sem=0;
	while($test=$test1->fetch(PDO::FETCH_OBJ))
	{
		if($Max_Sem<$test->S_no)
		{
			$Max_Sem=$test->S_no;
		}
	}

// Test	
	extract($_POST);
	$rows=$conn->query("SELECT * FROM Info,users,Result WHERE  C_no='$C_no' AND Info.I_no=Result.I_no AND Info.U_no=users.U_no AND S_no='$Max_Sem'");
	$row1=$conn->query("SELECT * FROM Info,users,Result WHERE  C_no='$C_no' AND Info.I_no=Result.I_no AND Info.U_no=users.U_no AND S_no='$Max_Sem'");
	if($row2=$row1->fetch(PDO::FETCH_OBJ))
	{
		?>
			<div class="span9">
					<div class="content">

						<div class="module">
						
							<div class="module-head">
								<h3>ADD Grades <i class="icon-bar-chart"></i></h3>
							</div>
							<div class="module-body">
								<form action="" method="post" class="form-horizontal row-fluid" onsubmit="return valid();">
								
										<table class="table">
											<thead>
											<tr>
												
												<th>ID</th>
												<th>Name</th>
												<th>Semester Number</th>
												<th>Course Number</th>
												<th>Grades</th>
									 
											</tr>
											</thead>
										<tbody>
										<?
											while($row=$rows->fetch(PDO::FETCH_OBJ))
											{
												?>
												
													
													<?
															
															echo	"<tr>
																	<td>$row->I_no</td>
																	<td>$row->Name</td>
																	<td>$row->S_no</td>
																	<td>$row->C_no</td>
																	";?>
																	<td>
																	<input type="hidden" name="C_no" value="<? echo $row->C_no; ?>" >
																	<input type="hidden" name="ID[]" value="<? echo $row->I_no; ?>" >
																	<input type="text" 	id="grade" maxlength="3"  size=3 name="grade[]" value="<? echo $row->Grade; ?>" ><label id="gmsg"></label>
																	
																	</td>
																	</tr>
										
														
																
												
													</tbody>
												
	
											<?	
												$count++;
											}
										?>
										</table>
										
										<input type="hidden" name="Max_Sem" value="<? echo $Max_Sem; ?>" >
										<input type="hidden" name="count" value="<? echo $count; ?>" >
										<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit_u" class="btn btn-primary pull-right"> Save <i class="icon-save"></i></button>
											</div>
										</div>
									</form>
									</div>
									</div>
									</div>
						</div>					
<?
	}
	else
	{
		Form($conn);
	}
}
function update($conn)
{
	
	?>
	<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>ADD Grades <i class="icon-bar-chart"></i></h3>
							</div>
							
							<div class="module-body">

	<?
	extract($_POST);
	$i=0;
	try
	{
		
			
	
		while($i<$count)
		{
			$sql="UPDATE Result SET Grade='$grade[$i]' WHERE I_no='$ID[$i]' AND C_no='$C_no' AND S_no='$Max_Sem' ";
			$conn->exec($sql);
		
			
			$i++;
		
		}
		echo "<h3>Has Saved Grade <i class='icon-ok'></i></h3>";
		
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
	if(isset($_POST['submit_u']))
	{
		update($conn);	
	}
	else 
	{
		if(isset($_POST['submit']))
		{
			View($conn);
		}
		else
		{
			Form($conn);
		}
	}
		
?>
				
	</div>
	</div>
						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

	

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
</body>
</html>