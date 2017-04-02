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
	
	<!-- Chart.js -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
	
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
				<li><a href="stats.php"><i class="fa fa-bar-chart"></i> Stats</a></li>
				<li class="active"><a href="graphs.php"><i class="fa fa-line-chart"></i> Graphs</a></li>		
				<li><a href="https://www.twitch.tv/bulftrik"><i class="fa fa-eye"></i> Twitch</a></li>		
				<li><a href="http://steamcommunity.com/groups/unluckyru"><i class="fa fa-steam"></i> Steam</a></li>					
			</ul>
		</div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="Content">

	<h1>Graphs<span class="label label-default"></span></h1>
	<span class="label label-info">Daily command usage (last 7 days)</span> 
	<hr />
	 <?php // Get data
			$Date7 = date("Y-m-d", strtotime("-7 days"));
			$Date6 = date("Y-m-d", strtotime("-6 days"));
			$Date5 = date("Y-m-d", strtotime("-5 days"));
			$Date4 = date("Y-m-d", strtotime("-4 days"));
			$Date3 = date("Y-m-d", strtotime("-3 days"));
			$Date2 = date("Y-m-d", strtotime("-2 days"));
			$Date1 = date("Y-m-d", strtotime("-1 days"));
			$Date0 = date("Y-m-d", strtotime("now"));
			
	        $ConnectionHandle = mysql_connect("", "", "");
            if(!$ConnectionHandle)
            {
                die("Could not connect to the MySQL database: " . mysql_error());
            }
            mysql_select_db("hukkabot");
			$Query = mysql_query("SELECT COUNT(*) AS cnt FROM commands pm WHERE DATE(Timestamp) = '$Date0'");
            if(!$Query) die(mysql_error());
            while($Row = mysql_fetch_assoc($Query))
            {
                $Count0Days = $Row['cnt'];
            }

			$Query = mysql_query("SELECT COUNT(*) AS cnt FROM commands pm WHERE DATE(Timestamp) = '$Date1'");
            if(!$Query) die(mysql_error());
            while($Row = mysql_fetch_assoc($Query))
            {
                $Count1Days = $Row['cnt'];
            }

			$Query = mysql_query("SELECT COUNT(*) AS cnt FROM commands pm WHERE DATE(Timestamp) = '$Date2'");
            if(!$Query) die(mysql_error());
            while($Row = mysql_fetch_assoc($Query))
            {
                $Count2Days = $Row['cnt'];
            }

			$Query = mysql_query("SELECT COUNT(*) AS cnt FROM commands pm WHERE DATE(Timestamp) = '$Date3'");
            if(!$Query) die(mysql_error());
            while($Row = mysql_fetch_assoc($Query))
            {
                $Count3Days = $Row['cnt'];
            }

			$Query = mysql_query("SELECT COUNT(*) AS cnt FROM commands pm WHERE DATE(Timestamp) = '$Date4'");
            if(!$Query) die(mysql_error());
            while($Row = mysql_fetch_assoc($Query))
            {
                $Count4Days = $Row['cnt'];
            }

			$Query = mysql_query("SELECT COUNT(*) AS cnt FROM commands pm WHERE DATE(Timestamp) = '$Date5'");
            if(!$Query) die(mysql_error());
            while($Row = mysql_fetch_assoc($Query))
            {
                $Count5Days = $Row['cnt'];
            }

			$Query = mysql_query("SELECT COUNT(*) AS cnt FROM commands pm WHERE DATE(Timestamp) = '$Date6'");
            if(!$Query) die(mysql_error());
            while($Row = mysql_fetch_assoc($Query))
            {
                $Count6Days = $Row['cnt'];
            }

			$Query = mysql_query("SELECT COUNT(*) AS cnt FROM commands pm WHERE DATE(Timestamp) = '$Date7'");
            if(!$Query) die(mysql_error());
            while($Row = mysql_fetch_assoc($Query))
            {
                $Count7Days = $Row['cnt'];
            }					
		?>	
	<canvas id="buyers" width="600" height="400"></canvas>
    <!-- Display data using Chart.js -->
	<script>
					var buyerData = {
					labels : ["<?php echo $Date7; ?>", "<?php echo $Date6; ?>", "<?php echo $Date5; ?>", "<?php echo $Date4; ?>", "<?php echo $Date3; ?>", "<?php echo $Date2; ?>", "<?php echo $Date1; ?>", "<?php echo $Date0; ?>"],
				datasets : [
					{
						fillColor : "rgba(172,194,132,0.4)",
						strokeColor : "#ACC26D",
						pointColor : "#fff",
						pointStrokeColor : "#9DB86D",
						data : ["<?php echo $Count7Days; ?>", "<?php echo $Count6Days; ?>", "<?php echo $Count5Days; ?>", "<?php echo $Count4Days; ?>", "<?php echo $Count3Days; ?>", "<?php echo $Count2Days; ?>", "<?php echo $Count1Days; ?>", "<?php echo $Count0Days; ?>" ]
					}
				]
			}
			var buyers = document.getElementById('buyers').getContext('2d');
			new Chart(buyers).Line(buyerData);
    </script>
</div>

</body>
</html>
