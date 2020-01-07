<?php
$p=basename(__FILE__);
include("up.php");
 
    if ((@$_SESSION['login']==1) and (@$_SESSION['type']=="user"))
	 {
		   $q2="select * from oil_stations where id_st='$_SESSION[id_st]'";
		   $r2=mysqli_query($conn,$q2);
		   $row=@mysqli_fetch_array($r2);
		   $q3="select * from station_product inner join products where id_st=$_SESSION[id_st] and station_product.id_pr=products.id_pr";
		   $r3=mysqli_query($conn,$q3);
		   echo
		   "           <div class=\"container\">
					  <div class=\"alert alert-success\">
					  <strong>Oil Products of $row[st_name]</strong>
					  </div>
					  
					  <a href='addproduct_station.php'><button type=\"button\" class=\"btn\">+</button></a>
					  <br><br>
		  <table class=\"table table-striped\">
			<thead>
			  <tr>
				<th>Product Name</th>
				<th>Quantity</th>
				<th>Cost Per Kilo</th>
				<th>Action</th>
			  </tr>
			</thead> 
			 <tbody>";
			 while($row1=mysqli_fetch_assoc($r3))
		  {
			echo " 
			  <tr>
				<td>$row1[pr_name]</td>
				<td>$row1[quantity]</td>
				<td>$row1[cost_per_kilo]</td>
				<td><a href=\"edit_st_product.php?id_st_pr=$row1[id_st_pr]\">
			  <span class=\"glyphicon glyphicon-pencil\"></span></a>&nbsp;
			<a href=\"delete_st_product.php?id_st_pr=$row1[id_st_pr]\" onclick=\"x=confirm('Do you want to delete this Product?');return x;\">
			  <span class=\"glyphicon glyphicon-trash\" ></span>
			</a></td>
			  </tr> ";
		   }
		 echo "    </tbody>
					</table>
					
					 </div>";     
     }
     else
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