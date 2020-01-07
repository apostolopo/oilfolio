<?php

	$p=basename(__FILE__);
	include("up.php");
 if ((@$_SESSION['login']==1) and (@$_SESSION['type']=="admin"))
  {	

	 $q2="select * from oil_stations";
	 $r2=mysqli_query($conn,$q2);
	  
	echo
	   "           <div class=\"container\">
				  <div class=\"alert alert-success\">
				  <strong>Oil Stations List</strong>
				  </div>
				  
				  <a href='addstation.php'><button type=\"button\" class=\"btn\">+</button></a>
				  <br><br>
	  <table class=\"table table-striped\">
		<thead>
		  <tr>
			<th>Station Name</th>
			<th>phone</th>
			<th>City</th>
			<th>Address</th>
			<th>Action</th>
		  </tr>
		 </thead> 
		 <tbody>";
		 while($row1=mysqli_fetch_array($r2))
	  {
		echo " 
		  <tr>
			<td>$row1[st_name]</td>
			<td>$row1[phone]</td>
			<td>$row1[city]</td>
			<td>$row1[address]</td>
			<td><a href=\"edit_station.php?id_st=$row1[id_st]\">
			  <span class=\"glyphicon glyphicon-pencil\"></span></a>&nbsp;
			<a href=\"delete_station.php?id_st=$row1[id_st]\" onclick=\"x=confirm('Do you want to delete this station?');return x;\">
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