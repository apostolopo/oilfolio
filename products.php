<?php

	$p=basename(__FILE__);
	include("up.php");
 if ((@$_SESSION['login']==1) and (@$_SESSION['type']=="admin"))
  {	

		 $q2="select * from products ";
		 $r2=mysqli_query($conn,$q2);
		  
		echo
		   "           <div class=\"container\">
					  <div class=\"alert alert-success\">
					  <strong>Oil Products</strong>
					  </div>
					  
					  <a href='addproduct.php'><button type=\"button\" class=\"btn\">+</button></a>
					  <br><br>
		  <table class=\"table table-striped\">
			<thead>
			  <tr>
				<th>Product Name</th>
				<th>Description</th>
				<th>Action</th>
			  </tr>
			</thead> 
			 <tbody>";
			 while($row1=mysqli_fetch_array($r2))
		  {
			echo " 
			  <tr>
				<td>$row1[pr_name]</td>
				<td>$row1[description]</td>
				<td><a href=\"delete_product.php?id_pr=$row1[id_pr]\" onclick=\"x=confirm('Do you want to delete this product?');return x;\">
				  <span class=\"glyphicon glyphicon-trash\" ></span>
				</a></td>
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