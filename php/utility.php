<?

$host='199.195.141.236';

function generate_sc_selection($id){
	$conn = mysql_connect($host,"sanguosha","sanguosha");
	mysql_set_charset("UTF8",$conn);
	$db = mysql_select_db("sanguosha",$conn);
	$sql = mysql_query("SELECT * FROM scenario");
	$sel = "<select id=\"".$id."\"><option value=0>随机</option>";
	while($row=mysql_fetch_array($sql)){
		$sel = $sel."<option value=".$row["id"].">".$row["name"]."</option>";
	}
	$sel = $sel."</select>";
	mysql_close($conn);
	echo $sel;
}

function generate_weather_selection($id){
	$conn = mysql_connect($host,"sanguosha","sanguosha");
	mysql_set_charset("UTF8",$conn);
	$db = mysql_select_db("sanguosha",$conn);
	$sql = mysql_query("SELECT * FROM weather");
	$sel = "<select style=\"visibility:inherit\" id=\"$id\"><option value=0>随机</option>";
	while($row=mysql_fetch_array($sql)){
		$sel = $sel."<option value=".$row["id"].">".$row["name"]."</option>";
	}
	$sel = $sel."</select>";
	mysql_close($conn);
	echo $sel;
}

function new_game_bundle($id,$value=120){
	generate_sc_selection($id);
	echo "<button class=\"new_btn\" onclick=\"new_game('$id',$value)\">新游戏</button>";
}

function new_weather_bundle($id,$value=5) {
	generate_weather_selection($id);
	echo "<button class=\"w_chg_btn\" onclick=\"w('$id',$value)\">风云变幻</button>";
}

function sun_menu(){
	$conn = mysql_connect($host,"sanguosha","sanguosha");
	mysql_set_charset("UTF8",$conn);
	$db = mysql_select_db("sanguosha",$conn);
	$sql = mysql_query("SELECT * FROM scenario");
	mysql_close($conn);
	echo "<div><ul><li>新游戏&raquo;<ul>";
	echo "<li onclick=\"cont_new_game(0)\">随机</li>";
	while($row=mysql_fetch_array($sql)){
		echo "<li onclick=\"cont_new_game(".$row["id"].")\">".$row["name"]."</li>";
	}
	echo "</ul></li>";
	echo "<li onclick=\"back_to_main()\">回主页</li></ul></div>";
}


function next_weather($id) {
	$conn = mysql_connect($host,"sanguosha","sanguosha");
	mysql_set_charset("UTF8",$conn);
	$db = mysql_select_db("sanguosha",$conn);
	if($id==0) {
		$sql = mysql_query("SELECT * FROM weather ORDER BY -LOG(1.0-RAND())/p LIMIT 1") or die(mysql_error());
	} else {
		$sql = mysql_query("SELECT * FROM weather WHERE id=$id");
	}
	mysql_close($conn);
	while($row=mysql_fetch_array($sql)) {
			$w_name = $row["name"];
			$w_des = $row["effect"];
		}
	$a = array($w_name,$w_des);
	return $a;

}

function load_sc($id) {
	$conn = mysql_connect($host,"sanguosha","sanguosha");
	mysql_set_charset("UTF8",$conn);
	$db = mysql_select_db("sanguosha",$conn);
	if($id==0){
		$sql = mysql_query("SELECT * FROM scenario ORDER BY RAND() LIMIT 1") or die(mysql_error());
	} else {
		$sql = mysql_query("SELECT * FROM scenario WHERE id=$id");
	}
	mysql_close($conn);
	while($row=mysql_fetch_array($sql)) {
		$w_name = $row["name"];
		$w_des = $row["rules"];
	}
	$a = array($w_name,$w_des);
	return $a;
}

?>
