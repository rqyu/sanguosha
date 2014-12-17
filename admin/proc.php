<?
session_name('apple');
session_start();

if(session_is_registered('password')) {
	if($_GET['uc']) {
		if($_GET['ws']) {
			$uc = $_GET['uc'];
			$ws = $_GET['ws'];

			$conn=mysql_connect('localhost','sanguosha','sanguosha');
			mysql_set_charset('UTF-8', $conn);
			$db=mysql_select_db('sanguosha', $conn);
			if($ws=='w') {
				$sql = mysql_query('SELECT * FROM weather');
			}
		}
	}
?>

<? } else { ?>

<? } ?>
