<?php
$p=basename(__FILE__);

session_start();
session_destroy();
if (@$_SESSION['login']==1){
	include "up.php";


			


  echo " 	
		
					<div class='container'>
				<div class=\"alert alert-success\">
	  <strong>Info!</strong> You have been logout.
	</div>
			</div>		"; 

 
	 
 }	
 else
 {
	 include "up.php";
	 echo "	<div class=\"container\">
							  <div class=\"alert alert-success\">
							  <strong>Πρέπει να συνδεθείτε!!</strong>
							</div></div> ";
 }
		 
?>


</body>
</html>