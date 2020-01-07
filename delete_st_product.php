<?php
$p=basename(__FILE__);
include("up.php");
$q5="delete from station_product where id_st_pr=$_GET[id_st_pr]";
if(@mysqli_query($conn,$q5))
{
   echo "<div class='container'><div class='alert alert-success'>Το προιόν διαγράφτηκε!</div><a href='putproduct.php'>Back to Products</a></div>";
}
				
  include("footer.php");            
?>
 </body>
</html>