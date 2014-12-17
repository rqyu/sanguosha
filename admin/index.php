<html>
	<head>
		<title>Admin login</title>
		<style>
			body{
				background-color: black;
			}
			div#login{
				position:absolute;
				left:45%;
				top:45%;
				box-shadow: 0px 0px 10px 5px #FF0000, 0px 0px 10px 10px #FF0000 inset;
			}
		</style>
	</head>

	<body>
		<div id="login" align='center'>
			<form method="post" action="login.php" align="center">
				<input type='password' name='password' id='pwd' />
				<input type='submit' name='submit' id='submit' value='Log in' />
			</form>
		</div>
	</body>
</html>
