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
				<li class="active"><a href="index.php"><i class="fa fa-home"></i> Home <span class="sr-only">(current)</span></a></li>
				<li><a href="commands.php"><i class="fa fa-database"></i> Commands</a></li>
				<li><a href="dyncommands.php"><i class="fa fa-database"></i> Dynamic commands</a></li>
				<li><a href="stats.php"><i class="fa fa-bar-chart"></i> Stats</a></li>
				<li><a href="graphs.php"><i class="fa fa-line-chart"></i> Graphs</a></li>		
				<li><a href="https://www.twitch.tv/bulftrik"><i class="fa fa-eye"></i> Twitch</a></li>		
				<li><a href="http://steamcommunity.com/groups/unluckyru"><i class="fa fa-steam"></i> Steam</a></li>		
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>

<div class="Content">
	<h1>HukkaBot commands, stats & more<span class="label label-default"></span></h1>
	<hr>
	<h3>Latest activity<span class="label label-default"></span></h3>
	<span class="label label-info">Shows last 10 used commands</span> 
	<hr />
	<div class="panel panel-primary">
		<!-- Default panel contents -->
		 <div class="panel-heading">Latest commands</div>

		  <!-- Table -->
		<table class="table ">
			<thead>
				<tr>
					<th>Time</th>
					<th>User</th>
					<th>Channel</th>
					<th>Command</th>
				</tr>
			</thead>
			<tbody>
			<?php // Get last user commands
			
				$ConnectionHandle = mysql_connect("", "", "");
				if(!$ConnectionHandle)
				{
					die("Could not connect to the MySQL database: " . mysql_error());
				}
				mysql_select_db("hukkabot");
				$Query = mysql_query("SELECT * FROM `commands`ORDER BY ID DESC  LIMIT 10 ");
				if(!$Query) die(mysql_error());
				while($Row = mysql_fetch_assoc($Query))
				{
					$Timestamp = $Row['Timestamp'];
					$User = $Row['User'];
					$Channel = $Row['Channel'];
					$Command = $Row['Command'];
					echo "<tr><td>$Timestamp</td><td><a href='https://www.twitch.tv/$User/profile'>$User</a></td><td><a href='https://www.twitch.tv/$Channel'>$Channel</a></td><td>$Command </td></tr>";
				}		

			?>
			</tbody>
		</table>
	</div>
	<div class="box">
		<span class="label label-info">Autojoin list</span> 
		<hr>
		<ul class="list-group">
			<?php // Get autojoin list
		
					$Channels = file_get_contents("/home/ubuntu/proj/bIRC3/bin/Debug/bulfbot/autojoin.ini");
				$words = explode(" ", $Channels);
				foreach ($words as $word) 
				{
					$Channels .= substr($word,0,2);  
					$Final =  str_replace('#','', $word);
					echo "<li class='list-group-item'>$Final</li>";
				}
		?>
		</ul>
		<span class="label label-info">Nuttari users</span> 
		<hr>
		<ul class="list-group">

		<?php // Get nuttari users list
					$Channels = file_get_contents("/home/ubuntu/proj/bIRC3/bin/Debug/bulfbot/nuttariusers.ini");
				$words = explode(" ", $Channels);
				foreach ($words as $word) 
				{
					$Channels .= substr($word,0,2);  
					echo "<li class='list-group-item'>$word</li>";
				}
		?>
		</ul>
	</div>
<!--- end of content -->
</div>
</body>
</html>
