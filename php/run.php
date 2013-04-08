<?php

header('Content-Type:text/html; charset=UTF-8');

function next_weather() {
	$conn = mysql_connect("localhost","sanguosha","sanguosha");
	mysql_set_charset("UTF8",$conn);
	$db = mysql_select_db("sanguosha",$conn);
	$sql = mysql_query("SELECT * FROM weather ORDER BY -LOG(1.0-RAND())/p LIMIT 1") or die(mysql_error());
	while($row=mysql_fetch_array($sql)) {
		$w_name = $row["name"];
		$w_des = $row["effect"];
	}
	$a = array($w_name,$w_des);
	mysql_close($conn);
	return $a;

}

function load_sc($id) {
	$conn = mysql_connect("localhost","sanguosha","sanguosha");
	mysql_set_charset("UTF8",$conn);
	$db = mysql_select_db("sanguosha",$conn);
	if($id==0){
		$sql = mysql_query("SELECT * FROM scenario ORDER BY RAND() LIMIT 1") or die(mysql_error());
	} else {
		$sql = mysql_query("SELECT * FROM scenario WHERE id=".$id);
	}
	while($row=mysql_fetch_array($sql)) {
		$w_name = $row["name"];
		$w_des = $row["rules"];
	}
	$a = array($w_name,$w_des);
	mysql_close($conn);
	return $a;
}

$m = $_GET["m"];

if ($m=="w") {
	$response = "这个月的天气是: <span class=\"des_name\">";
	$a = next_weather();
	$w = $a[0];
	$wdes = $a[1];
	$response .= $w."</span><br>效果为: <span class=\"des_effect\">";
	$response .= $wdes."</span>";
}

else if ($m=="sc") {
	$response = "本次的战场为: <span class=\"des_name\">";
	$n = $_GET["n"];
	$a = load_sc($n);
	$n = $a[0];
	$des = explode(' ',$a[1]);
	$response .= $n."</span><br>效果为: ";
	$c = 1;
	foreach($des as $val) {
		if ($c>1) {
			$response .= "<span class=\"des_effect\">&emsp;&emsp;&emsp;&nbsp;&nbsp;".$val."</span><br>";
		} else {
			$response .= "<span class=\"des_effect\">".$val."</span><br>";
		}
		$c+=1;
	}
}

echo $response;

?>
