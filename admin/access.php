<?

session_name('apple');
session_start();

if (session_is_registered('password')) {

?>

<html><head><title>Admin config page</title>
	<style>
		body{background-color: #000}
	</style>
	<script src="../script/jquery-1.9.1.min.js" type="text/javascript"></script>
	</head>
<body>
	<script>
		function get(){
			alert($('#121').find('input=[name="uc"]').val());
		}
	</script>
	<div style="height:100px;width:1000px;margin:100 100;color:white;">
		<form id='121' onsubmit='get()'>
			U/C: <input type='radio' name='uc' value='u'>Upload
				<input type='radio' name='uc' value='c'>Change<br>
			W/S: <input type='radio' name='ws' value='w'>Weather
				<input type='radio' name='ws' value='s'>Scenario<br>
				<input type='submit' name='submit' value='submit'>
		</form>
	</div>
	<div id="rlt" style="margin:210 100">
	</div>
</body>
</html>

<?
} else {
	echo 'You have not logged in';
?>
<a href="index.php">Login here</a>
<?}?>
