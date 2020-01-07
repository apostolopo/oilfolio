<?php

	$p=basename(__FILE__);
	include("up.php");
 if ((@$_SESSION['login']==1) and (@$_SESSION['type']=="user"))
  {	

	 $q2="select * from station_product inner join products on station_product.id_pr=products.id_pr where station_product.id_st=$_SESSION[id_st]";
	 $r2=mysqli_query($conn,$q2);
	 $q5="SELECT SUM(st_bank) FROM station_product WHERE id_st=$_SESSION[id_st]";
	 $r5=mysqli_query($conn,$q5);
	 $qr5=@mysqli_fetch_assoc($r5);
	 $sum = $qr5['SUM(st_bank)'];
	  
	 
	echo
	   "           <div class=\"container\">
				  <div class=\"alert alert-success\">
				  <strong>Statistics</strong>
				  </div>
				  
	  <table class=\"table table-striped\">
		<thead>
		  <tr>
			<th>Product</th>
			<th>Quantity</th>
			<th>Earnings</th>
			<th>Station Total Bank</th>
		  </tr>
		</thead> 
		 <tbody>";
		 $i=0;
		 while($row1=@mysqli_fetch_array($r2))
	  {
		echo " 
		  <tr>
			<td>$row1[pr_name]</td>
			<td>$row1[quantity] kg</td>
			<td>$row1[st_bank] €</td>";
			if($i==0)
			{
				echo "  <td>$sum €</td> ";
			}
			else echo "<td></td>";
			$i++;
		echo "  </tr> ";
	   }
	 echo "  
           
         	 </tbody>
				</table>
				
				 </div>";
	  

	
	
}	 else
			 {
				 echo "	<div class=\"container\">
							  <div class=\"alert alert-success\">
							  <strong>Πρέπει να συνδεθείτε!!</strong>
							</div></div> ";
			 }
		 include("footer.php");
		 ?>



 </body>
</html>