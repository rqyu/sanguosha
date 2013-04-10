<? require("./php/utility.php"); ?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<script src="script/script.js" type="text/javascript"></script>
	<script src="script/jquery-1.9.1.min.js" type="text/javascript"></script>

</head>

<body>
<div id="main">
	<div id="new_game" align="center">
		<div id="sc_sel" align="center">
			<? new_game_bundle("new_game_sel"); ?>
		</div>
	</div>
</div>
<div id="game_container">
	<div id="game">
		<div id="sun_menu_btn" align="center">
			<? sun_menu(); ?>
		</div>
		<div id="weather">
			<div id="weather_des">
			</div>
			<div id="weather_chg" align="center">
				<? new_weather_bundle("w_chg_btn"); ?>
			</div>
		</div>
		<div id="sc">
			<div id="sc_des">
			</div>
		</div>
	</div>
</div>
</body>
</html>
