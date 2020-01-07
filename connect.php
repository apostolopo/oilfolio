<?php

if (session_id()=='')
{
	session_start();
}

/*if(isset($_SESSION['time']))
{
	
//Τερματιζει την session μεταβλητη μετα απο συγκεκριμένο χρόνο.
	/*if(time()-$_SESSION['time']>30)
	{
	session_destroy();
	session_start();
	}
}*/

$conn=mysqli_connect("localhost","root","","oilfolio");
if(mysqli_connect_errno()){
	echo "Connection to database failed:".mysqli_connect_error();
    exit();
}
mysqli_query($conn,"set names 'utf8'");

?>