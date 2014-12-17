<?php

session_name('apple');
session_start();

$pwd='04fef5d64b39eb7527044b96273c66e4';

if(md5($_POST['password'])==$pwd){
	session_register('password');
	header('location:access.php');
} else {
	echo 'Wrong password';
}

?>
<br><a href="index.php">back and try again</a>
