<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<script src="script/script.js" type="text/javascript"></script>
	<script src="script/jquery-1.9.1.min.js" type="text/javascript"></script>

</head>

<?
function generate_sc_selection($id){
	$conn = mysql_connect("localhost","sanguosha","sanguosha");
	mysql_set_charset("UTF8",$conn);
	$db = mysql_select_db("sanguosha",$conn);
	$sql = mysql_query("SELECT * FROM scenario");
	$sel = "<select id=\"".$id."\"><option value=0>随机</option>";
	while($row=mysql_fetch_array($sql)){
		$sel = $sel."<option value=".$row["id"].">".$row["name"]."</option>";
	}
	$sel = $sel."</select>";
	echo $sel;
}

function generate_weather_selection($id){
	$conn = mysql_connect("localhost","sanguosha","sanguosha");
	mysql_set_charset("UTF8",$conn);
	$db = mysql_select_db("sanguosha",$conn);
	$sql = mysql_query("SELECT * FROM weather");
	$sel = "<select style=\"visibility:inherit\" id=\"".$id."\"><option value=0>随机</option>";
	while($row=mysql_fetch_array($sql)){
		$sel = $sel."<option value=".$row["id"].">".$row["name"]."</option>";
	}
	$sel = $sel."</select>";
	echo $sel;
}

function new_game_bundle($id){
	generate_sc_selection($id);
	echo "<button class=\"new\" onclick=\"new_game('".$id."')\">新游戏</button>";
}

?>

<body>
<div id="main">
	<div id="new_game">
		<div id="sc_sel" align="center">
			<? new_game_bundle("new_game_sel"); ?>
		</div>
	</div>
</div>
<div id="game_container">
	<div id="game">
		<div id="game_cont" align="center">
			<? new_game_bundle("cont_game"); ?>
		</div>
		<div id="weather">
			<div id="weather_w">
				<p id="w_des" class="des_fmat"></p>
			</div>
			<div onclick="w()" id="weather_chg">
			</div>
		</div>
		<div id="sc">
			<div id="sc_des">
				<p id="s_des" class="des_fmat"></p>
			</div>
		</div>
	</div>
	<div id="back" onclick="back_to_main()">Back</div>
</div>
</body>
</html>
