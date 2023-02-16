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
		patnn=/^[0-9]{9}$/;
		if(document.getElementById("sn").value == "")
		{
			document.getElementById("lsn").style.color="red";
			document.getElementById("snmsg").innerHTML="The Student Number Is Empty";
			v=false;
		
		}
		else{
			if(patnn.test(document.getElementById("sn").value) == false)
			{
				document.getElementById("lsn").style.color="red";
				document.getElementById("snmsg").innerHTML="The Student Number  Incorrect Ex:9 Number";
				v=false;
			}
			else
			{
			document.getElementById("lsn").style.color="black";
			document.getElementById("snmsg").innerHTML=" ";
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
		flag=0;
	x=document.getElementById("y");
	if(x.selectedIndex==0)
	{
		flag=1;
		document.getElementById("ly").style.color="red";
			v=false;
	}
	if(flag==0)
	{
		document.getElementById("ly").style.color="black";
		for(var i=0;i<x.length;i++)
		{
			if(x[i].selected==true)
			{
				t+=x[i].value+"<br/>";
			}
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
	$rows= $conn->query("SELECT DISTINCT Nationality FROM users WHERE Flag=0 AND Priv='S'");

	?>
	<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Added Student Info</h3>
							</div>
												<div class="module-body">

									<form class="form-horizontal row-fluid" action="" method="post">
										<div class="control-group">
											<label class="control-label" for="basicinput">Name</label>
											<div class="controls">
												<input type="text" id="basicinput" name="Name" class="span8">
										
											</div>
										</div>
									
										<div class="control-group">
											<label class="control-label" for="basicinput">Nationality</label>
											<div class="controls">
												<select name="Nationality" tabindex="1"  class="span8">
													<option  value=""></option>
												<? 
												while(	$row=$rows->fetch(PDO::FETCH_OBJ))
												{
													echo "<option  value='$row->Nationality'>$row->Nationality</option>";
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
function insert($conn)
{
	?>
	<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Added Student Info</h3>
							</div>
							
							<div class="module-body">

							<?
	extract($_POST);
	try
	{

		extract($_POST);
		$sql="INSERT INTO Info (U_no,I_no,Address,Email,Gender,Year) VALUES ('$U_no','$I_no','$ad','$email','$Gender','$ye')";
        if($conn->exec($sql))
		{
			echo "<h3>Has Saved Info <i class='icon-ok'></i></h3>";
		}
		
		$sql="UPDATE users SET  Flag=1,Name='$Name',Nationality='$Nationality' WHERE U_no='$U_no'";	
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
	if(isset($_POST['U_noo']))
	{
		
	
	extract($_POST);
	$rows= $conn->query("SELECT * FROM users WHERE U_no='$U_noo' ");
	$row=$rows->fetch(PDO::FETCH_OBJ);

	?>
	<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Added Student Info</h3>
							</div>
							
	
					
							<div class="module-body">

									<form class="form-horizontal row-fluid" action="" method="post" onsubmit="return valid();" >
										
										
										<input  type="hidden" name="U_no" value="<? echo $U_noo; ?>" >
										
										<div class="control-group">
											<label class="control-label" for="basicinput" id="lname">Name</label>
											<div class="controls">
												<input type="text" name="Name" value="<? echo $row->Name ?>" id="name" class="span8"><label id="nmsg"></label>
										
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="basicinput" id="lsn">Student Number</label>
											<div class="controls">
												<input type="text" name="I_no" id="sn"  class="span8"><label id="snmsg"></label>
										
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
												<input type="text" name="ad" id="ad"  class="span8">
										
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="basicinput" id="lemail">Email</label>
											<div class="controls">
												<input  type="text" value="" id="email" name="email" placeholder="User_Name@****.com"  class="span8 tip"><label id="emsg"></label>
											</div>
										</div>

										
										<div class="control-group">
											<label class="control-label" >Gender</label>
											<div class="controls">
												<label class="radio">
													<input type="radio" name="Gender" value="male" checked>
													Male
												</label> 
												<label class="radio">
													<input type="radio" name="Gender" value="female">
													Female
												</label> 
	
											</div>
										</div>
										
													
										<div class="control-group">
											<label class="control-label" for="basicinput" id="ly">Year</label>
											<div class="controls">
												<select name="ye" tabindex="1" id="y"  class="span8">
													<option value="" selected>Choose Year</option>
													<script>
														for(var i=1990;i<2018;i++)
														{
															document.write("<option value="+i+">"+i+"</option>");
														}
													</script>
												</select>
											</div>
										</div>
										
										
										<div class="control-group">
											
											<label class="control-label" for="basicinput">Select Image </label>											
												<input id="uploadBtn" type="file" class="btn" name="Img_path" />
										
										</div>
				

										<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit_info" class="btn btn-primary pull-right" > Save Info <i class="menu-icon icon-save"></i></button>
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
	$rows2= $conn->query("SELECT * FROM users WHERE Flag=0 AND Name LIKE '$Name%' AND Nationality LIKE '$Nationality%' AND Priv='S'");
	
	$rows= $conn->query("SELECT * FROM users WHERE Flag=0 AND Name LIKE '$Name%' AND Nationality LIKE '$Nationality%' AND Priv='S'");
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
								<h3>Added Student Info</h3>
							</div>
							<table class="table">
											<thead>
											<tr>
												<th>#</th>
												<th>Name</th>
												<th>Nationality</th>
												<th>User Name</th>
									 
											</tr>
											</thead>
											<tbody>
									<form action="" method="post" class="form-horizontal row-fluid">
									
									
											<?
											
											while($row=$rows->fetch(PDO::FETCH_OBJ))
											{
												?>
												<label class="radio">
													<tr><td><input type="radio" name="U_noo" value="<? echo $row->U_no; ?>"></td>
													<?
																echo	"
																	
																	<td>$row->Name</td>
																	<td>$row->Nationality</td>
																	<td>$row->U_name</td>
																	</tr>";
														
													?>
													</tbody>
												</label> 
	
										
										<?
											}
											
									
										?>
								</table>
									
								
											</div>
											<div class="control-group">
												<div class="controls">
												<button type="submit" name="submitR" class="btn btn-primary pull-right"> ADD Info <i class="menu-icon icon-plus"></i></button>
												</div>
											</div>
									</form>
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