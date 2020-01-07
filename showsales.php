<?php

	$p=basename(__FILE__);
	include("up.php");
 if ((@$_SESSION['login']==1) and (@$_SESSION['type']=="user"))
  {	

	 $q2="select * from sales  where id_st=$_SESSION[id_st]";
	 $q3="select * from sales inner join products  on sales.id_pr=products.id_pr where sales.id_st=$_SESSION[id_st] order by date1 asc";
	 $r3=mysqli_query($conn,$q3);
	 $r2=mysqli_query($conn,$q2);
	  
	echo
	   "           <div class=\"container\">
				  <div class=\"alert alert-success\">
				  <strong>Show Sales</strong>
				  </div>
				  
	  <table class=\"table table-striped\">
		<thead>
		  <tr>
			<th>Email</th>
			<th>Phone</th>
			<th>Product</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Date</th>
		  </tr>
		</thead> 
		 <tbody>";
		 while($row1=mysqli_fetch_array($r3))
	    {
		
		echo " 
		  <tr>
			<td>$row1[email]</td>
			<td>$row1[phone]</td>
			<td>$row1[pr_name]</td>
			<td>$row1[quantity] kg</td>
			<td>$row1[price] €</td>
			<td>$row1[date1]</td>
			
		  </tr> ";
		 
	    }
	 echo "    </tbody>
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