<?php

 $p=basename(__FILE__);
 include("up.php");
 ?>
 <div class=myform>
 <?php
	if(@$_SESSION['login']==1)
	{
		
		echo "<div class=\"container\"><center><div class=\"alert alert-success\">
  <strong>You are login!</strong> 
</div></div>";
	}
    else
		  echo "<div class=\"container\"><center><div class=\"alert alert-success\">
  <strong>You are not connected!</strong><a href='login.php' class='alert-link'>Back to Login page</a></div></div>";
?>
  </div>
  <br>
 <?include("footer.php");?>
 </body>
</html>