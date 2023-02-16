<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Computer Science</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
	<?
include_once ("connection.php");
function View($conn)
{
	
	extract($_POST);
	$ID=$_SESSION['ID'];
	$Name=$_SESSION['Name'];
//test       	
	
	if($Sem!='0')
	{
			$test=$conn->query("SELECT * FROM Result,Semester,Course  WHERE Result.I_no='$ID' AND  Result.S_no='$Sem' AND Result.S_no=Semester.S_no AND Result.C_no=Course.C_no ORDER BY Result.S_no  ");			
							
			if(! $test2=$test->fetch(PDO::FETCH_OBJ))
			{
				Form($conn);
				return;
			}
	}


// end test	
	
	
	
	
	?>
	
		<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								Student : <? echo $Name; ?><br> ID :  <? echo $ID; ?>
							</div>
							
							<div class="module-body">

	
		<?
		if($Sem=='0')
		{
			$rows=$conn->query("SELECT * FROM Result,Semester,Course WHERE Result.I_no='$ID' AND Result.S_no=Semester.S_no AND Result.C_no=Course.C_no ORDER BY Result.S_no");
						
									$count=0;
									
								 while($row=$rows->fetch(PDO::FETCH_OBJ))
								 {
									 
									 if( ($count!=$row->S_no))
									 {
										 ?>
											</tbody>
											</table>
												
												<br><strong>Semester Number : <? echo $row->S_no ; ?><br>Start Semester : <? echo $row->Start_date; ?>
												<br>End Semester : <? echo $row->End_date; ?>
												<br>Semester :  <? echo $row->Sem; ?><br></strong>	<br>
										 		<table class="table table-striped table-bordered table-condensed">
												<thead>
												<tr>
												<th>Course Name</th>
												<th>Credits</th>
												<th>Grade</th>
												</tr>
												</thead>		 
												<tbody>
												
												<?
									 }	//End If
										
									
									echo  	"<tr><td>$row->C_no</td>
											<td>$row->Credits</td>
											<td>$row->Grade</td></tr>";
											
									  
									  $count=$row->S_no;
								 }// End While
							
		}
		else
		{
		
			$rows=$conn->query("SELECT * FROM Result,Semester,Course  WHERE Result.I_no='$ID' AND  Result.S_no='$Sem' AND Result.S_no=Semester.S_no AND Result.C_no=Course.C_no ORDER BY Result.S_no  ");			
							
									$row=$rows->fetch(PDO::FETCH_OBJ);
					?>
												<br><strong>Semester Number: <? echo $row->S_no ; ?><br>Start Semester : <? echo $row->Start_date; ?>
												<br>End Semester : <? echo $row->End_date; ?>
												<br>Semester :  <? echo $row->Sem; ?><br></strong>	<br>
										 		<table class="table table-striped table-bordered table-condensed">
												<thead>
												<tr>
												<th>Course Name</th>
												<th>Credits</th>
												<th>Grade</th>
												</tr>
												</thead>
								  	<tbody>							 

										<?
											echo  	"<tr><td>$row->C_no</td>
													<td>$row->Credits</td>
													<td>$row->Grade</td></tr>";
								 ?>
									</tr>
									<?
									while($row=$rows->fetch(PDO::FETCH_OBJ))
									{
											echo  	"<tr><td>$row->C_no</td>
													<td>$row->Credits</td>
													<td>$row->Grade</td></tr>";										
										
									}
									
									?>
									</tbody>
								</table>				
			<?

		
		
		}//End Else


}//End Function
function Form($conn)
{
	$rows=$conn->query("SELECT DISTINCT S_no FROM Result ");
	?>
	<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>View Result</h3>
							</div>
							  <div class="module-body">

									<form class="form-horizontal row-fluid" action="" method="post">
									
									
													<div class="control-group">
											<label class="control-label" for="basicinput">Semester Number</label>
											<div class="controls">
												<select name="Sem" tabindex="1"  class="span8">
													<option  value="0" >All Semester</option>
												<? 
												while($row=$rows->fetch(PDO::FETCH_OBJ))
												{
													echo "<option  value='$row->S_no'>$row->S_no</option>";
												}
													
												?>
													
												</select>
										

										<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn btn-primary pull-right">View</button>
											</div>
										</div>
									</form>
							</div>
						</div>
		 <div class="footer">
            <div class="container">
                <b class="copyright"><i class="icon-tag"></i> 2017 Assignment - Tripoli University / Computer Science.com </b>
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
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="homeStudent.php"><b class="copyright">Computer Seience</b></a>
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
							<?  session_start(  ); $ID=$_SESSION['ID'] ;$Name=$_SESSION['Name'];?>
							<li><a href=""><? echo $ID; ?> </a></li>
                            <li><a href=""><? echo $Name; ?> </a></li>
                            <li class="nav-user dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown">
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
        
		
<?
	if(isset($_POST['submit']))
	{
		View($conn);	
	}
	else 
	{
		Form($conn);
	}
		
?>
		
		
		

        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>
      
    </body>
