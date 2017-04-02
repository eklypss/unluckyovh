<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<title>unlucky.ovh</title>
	<link rel="stylesheet" href="css/main.css" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- JQuery 2.2.3 minified  -->
	<script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
	
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
</head>
<body>

<nav class="navbar navbar-default">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">unlucky.ovh</a>
		</div>


		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a href="index.php"><i class="fa fa-home"></i> Home <span class="sr-only">(current)</span></a></li>
				<li><a href="commands.php"><i class="fa fa-database"></i> Commands</a></li>
				<li><a href="dyncommands.php"><i class="fa fa-database"></i> Dynamic commands</a></li>
				<li class="active"><a href="stats.php"><i class="fa fa-bar-chart"></i> Stats</a></li>
				<li><a href="graphs.php"><i class="fa fa-line-chart"></i> Graphs</a></li>		
				<li><a href="https://www.twitch.tv/bulftrik"><i class="fa fa-eye"></i> Twitch</a></li>		
				<li><a href="http://steamcommunity.com/groups/unluckyru"><i class="fa fa-steam"></i> Steam</a></li>					
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>

<div class="Content">

<h1>Stats<span class="label label-default"></span></h1>
	<hr />
	<div class="panel panel-primary">
		<div class="panel-heading">Command usage</div>
	
		<table class="table">
		<thead>
			<tr>
				<th>Time</th>
				<th>Count</th>
		</thead>
		<tbody>
		  <?php  // Get command stats
					$ConnectionHandle = mysql_connect("", "", "");
				if(!$ConnectionHandle)
				{
					die("Could not connect to the MySQL database: " . mysql_error());
				}
				mysql_select_db("hukkabot");
				$Query = mysql_query("SELECT COUNT(*) AS cnt FROM commands pm WHERE pm.Timestamp >= DATE_SUB(NOW(), INTERVAL 1 DAY)");
				$Query2 = mysql_query("SELECT COUNT(*) AS cnt2 FROM commands pm WHERE pm.Timestamp >= DATE_SUB(NOW(), INTERVAL 7 DAY)");
				$Query3 = mysql_query("SELECT COUNT(*) AS cnt3 FROM commands pm WHERE pm.Timestamp >= DATE_SUB(NOW(), INTERVAL 31 DAY)");
				$Query4 = mysql_query("SELECT COUNT(*) AS cnt4 FROM commands");

				if(!$Query) die(mysql_error());
				while($Row = mysql_fetch_assoc($Query))
				{
					$Count = $Row['cnt'];
					echo "<td>Today</td><td>$Count</td></tr>";
				}					
			   if(!$Query2) die(mysql_error());
				while($Row = mysql_fetch_assoc($Query2))
				{
					$Count2 = $Row['cnt2'];
					echo "<td>This week</td><td>$Count2</td></tr>";
				}		
				if(!$Query3) die(mysql_error());
				while($Row = mysql_fetch_assoc($Query3))
				{
					$Count3 = $Row['cnt3'];
					echo "<td>This month</td><td>$Count3</td></tr>";
				}	
				if(!$Query3) die(mysql_error());
				while($Row = mysql_fetch_assoc($Query4))
				{
					$Count4 = $Row['cnt4'];
					//echo "<p>Commands used in last 24 hours: $Count | Last 7 days: $Count2 | Last 31 days: $Count3 | All time: $Count4</p>";
					echo "<td>All time</td><td>$Count4</td></tr>";
				}					
		  
		  ?>
		</tbody>
	  </table>
	</div>
	
	<div class="panel panel-primary">
		<div class="panel-heading">Most used commands</div>
			<!-- Table -->
			<table class="table">
				<thead>
					<tr>
						<th>Command</th>
						<th>Count</th>
				</thead>
				<tbody>
				  <?php // Get command info
						
						$ConnectionHandle = mysql_connect("", "", "");
						if(!$ConnectionHandle)
						{
							die("Could not connect to the MySQL database: " . mysql_error());
						}
						mysql_select_db("hukkabot");
						$Query = mysql_query("SELECT Command, COUNT(Command) AS CommandCount FROM commands GROUP BY Command ORDER BY CommandCount DESC  LIMIT 5");
						if(!$Query) die(mysql_error());
						while($Row = mysql_fetch_assoc($Query))
						{
							$Command = $Row['Command'];
							$Count = $Row['CommandCount'];
							echo "<td>$Command</td><td>$Count</td></tr>";
						}		

				  ?>
				</tbody>
			</table>
	</div>
	  
	  
	<div class="panel panel-primary">
	  <!-- Default panel contents -->
	  <div class="panel-heading">Most commands used (Users)</div>

		<!-- Table -->
		<table class="table">
			<thead>
				<tr>
					<th>User</th>
					<th>Count</th>
				</tr>
			</thead>
			<tbody>
			<?php // Get command info
			
	        $ConnectionHandle = mysql_connect("", "", "");
            if(!$ConnectionHandle)
            {
                die("Could not connect to the MySQL database: " . mysql_error());
            }
            mysql_select_db("hukkabot");
            $Query = mysql_query("SELECT User, COUNT(User) AS UserCount FROM commands GROUP BY User ORDER BY UserCount DESC LIMIT 5 ");
            if(!$Query) die(mysql_error());
            while($Row = mysql_fetch_assoc($Query))
            {
                $User = $Row['User'];
				$Count = $Row['UserCount'];
				echo "<td><a href='https://www.twitch.tv/$User/profile'>$User</a></td><td>$Count</td></tr>";
            }		

	  ?>
			</tbody>
		</table>
	</div>
	
	<div class="panel panel-primary">
		<!-- Default panel contents -->
		<div class="panel-heading">Most commands used (Channels)</div>

		<!-- Table -->
		<table class="table">
			<thead>
				<tr>
					<th>Channel</th>
					<th>Count</th>
				</tr>
			</thead>
			<tbody>
			<?php // Get command info
			
	        $ConnectionHandle = mysql_connect("", "", "");
            if(!$ConnectionHandle)
            {
                die("Could not connect to the MySQL database: " . mysql_error());
            }
            mysql_select_db("hukkabot");
            $Query = mysql_query("SELECT Channel, COUNT(Channel) AS ChannelCount FROM commands GROUP BY Channel ORDER BY ChannelCount DESC LIMIT 5 ");
            if(!$Query) die(mysql_error());
            while($Row = mysql_fetch_assoc($Query))
            {
                $Channel = $Row['Channel'];
				$Count = $Row['ChannelCount'];
				echo "<td><a href='https://www.twitch.tv/$Channel'>$Channel</a></td><td>$Count</td></tr>";
            }		

	  ?>
			</tbody>
		</table>
	</div>
</body>
</html>
