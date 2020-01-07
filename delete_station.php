<?php
$p=basename(__FILE__);
include("up.php");
$q5="delete from oil_stations where id_st=$_GET[id_st]";
if(@mysqli_query($conn,$q5))
{
   echo "<div class='container'><div class='alert alert-success'>Το κατάστημα διαγράφτηκε!</div><a href='oilstations.php'>Back to Oil Stations</a></div>";
}
				
  include("footer.php");            
?>
 </body>
</html>