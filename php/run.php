<?php

header('Content-Type:text/html; charset=UTF-8');

require("utility.php");

$response='';

if($_GET['m']) {
	$m = $_GET['m'];
	if ($m=="w") {
		$response = "<div style=\"margin: 100% auto auto auto;width:80%;height:10%;\"><p align=\"center\" class=\"des_fmat\"><span class=\"des_name\">";
		$n = $_GET["n"];
		$a = next_weather($n);
		$w = $a[0];
		$wdes = $a[1];
		$response .= $w."</span><br><br><span class=\"des_effect\">";
		$response .= $wdes."</span></p></div>";
	}

	else if ($m=="sc") {
		$response = "<p align=\"center\" class=\"des_fmat\"><span class=\"des_name\">";
		$n = $_GET["n"];
		$a = load_sc($n);
		$n = $a[0];
		$des = explode(' ',$a[1]);
		$response .= "$n</span></p><p>";
		$c = 1;
		foreach($des as $val) {
			if ($c>1) {
				$response .= "<span class=\"des_effect\">&emsp;&emsp;&emsp;$val</span><br><br>";
			} else {
				$response .= "<span class=\"des_effect\">&emsp;&emsp;&emsp;$val</span><br><br>";
			}
			$c+=1;
		}
		$response .= "</p>";
	}
}

if($_GET['img_lnk']){
	$lnk = $_GET['img_lnk'];
	$lnk_m = $_GET['img_lnk_m'];
	if($lnk_m=='sc'){

	} else if ($lnk_m == 'w') {

	}
}

echo $response;

?>
