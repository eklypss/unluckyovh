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
				<li class="active"><a href="commands.php"><i class="fa fa-database"></i> Commands</a></li>
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
	<h1>Commands list<span class="label label-default"></span></h1>
	<span class="label label-info">List of all built-in commands</span>
	<hr />
	
	<h1>Owner<span class="label label-default"></span></h1>
	<p>!restart -- Restarts the bot</p>
	<p>!join #<i>[channel]</i> -- joins the specified channel and adds it to the autojoin list</p>
	<p>!addnuttariuser <i>[user]</i> -- Adds user to nuttari user list</p>

	<h1>Nuttari users<span class="label label-default"></span></h1>
	<p>!nuttariusers -- Lists all nuttari users</p>
	<p>!channels -- Lists all the channels where the bot is currently</p>
	<p>!randomgame -- Displays random casino game from GameFile</p>
	<p>!addbulfcommand <i>![command] [action]</i>  -- Adds a dynamic command and saves it to a file</p>
	<p>!delbulfcommand <i>![command]</i> -- Deletes the specified dynamic command</p>
	<p>!tempjoin  <i>#[channel]</i> -- Temporary joins the channel, reset on startup</p>
	<p>!mutebot --  Mutes the bot globally</p>
	<p>!unmutebot --  Unmutes the bot </p>
	<p>!randomemote -- Displays a random Twitch emote</p>
	<p>!nuttaritest <i>[name]</i> -- Displays whether <i>[name]</i> is a nuttari user or not</p>
	<p>!randomfish -- Returns a random fish color (1-3) (for Koi)</p>
	<p>!randomflsh -- A  rigged version of the above</p>

	<h1>Normal users<span class="label label-default"></span></h1>
	<p>!count <i>[word]</i> -- Displays the amount of <i>[word]</i> posted in the chat since bot startup</p>
	<p>!time -- Displays current time</p>
	<p>!pamp2 -- Timeouts the command sender for 1 second</p>
	<p>!urban <i>[word]</i> -- Displays definition for the given word from Urban Dictionary</p>
	<p>!define <i>[word]</i> -- Displays definition for the given word from the Wordnik API</p>
	<p>!randoms -- Displays 3 random numbers from the range of 1-20 (for kivipeli)</p>
	<p>!bulfcommands2 -- Lists all the dynamic commands available on the channel</p>


	<h1>Riot API commands<span class="label label-default"></span></h1>
	<p>!lastgame <i>[user]</i> -- Displays data about the specified player's last game</p>
	<p>!rank <i>[user]</i> -- Displays the rank of the specified player</p>

	<h1>Hearthstone API commands<span class="label label-default"></span></h1>
	<p>!cardinfo <i>[search term for card]</i> -- Displays basic info about the specified card</p>

	<h1>Twitch API commands<span class="label label-default"></span></h1>
	<p>!online <i><i>[channel]</i></i> -- Displays whether the specified channel (stream) is online or not</p>
	<p>!averagefps <i>[channel]</i> -- Displays the average FPS of the specified stream</p>
	<p>!joindate <i>[user]</i> -- Displays the join date of the specified user</p>
	<p>!followers <i>[user]</i> -- Displays the amount of followers the specified user has</p>
	<p>!views <i>[user]</i> -- Displays the total amount of views the specified user has</p>
	<p>!following <i>[user1]</i> <i>[user2]</i> -- Displays whether user1 is following user2 or not</p>
	<p>!comparefollowers <i>[user1]</i> <i>[user2]</i> -- Displays who has more followers, user1 or user2</p>
	<p>!bttvemotes -- Displays all custom BTTV emotes used by the channel</p>
	<p>!followage -- Shows how long you have been following the streamer</p>
	<p>!followage <i>[user1]</i> <i>[user2]</i> -- Shows how long user1 has followed user2</p>
</div>
</body>
</html>
