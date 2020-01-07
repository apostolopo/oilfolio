<?php
$p=basename(__FILE__);
include("up.php");
$q5="delete from users where id_usr=$_GET[id_usr]";
if(@mysqli_query($conn,$q5))
{
   echo "<div class='container'><div class='alert alert-success'>O χρήστης διαγράφτηκε!</div><a href='userslist.php'>Back to Users List</a></div>";
}
				
  include("footer.php");            
?>
 </body>
</html>