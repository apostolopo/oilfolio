<?php
$p=basename(__FILE__);
include("up.php");
$q5="delete from products where id_pr=$_GET[id_pr]";
if(@mysqli_query($conn,$q5))
{
   echo "<div class='container'><div class='alert alert-success'>Το προιόν διαγράφτηκε!</div><a href='products.php'>Back to Products</a></div>";
}
				
  include("footer.php");            
?>
 </body>
</html>