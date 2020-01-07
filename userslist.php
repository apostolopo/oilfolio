<?php

	$p=basename(__FILE__);
	include("up.php");
 if ((@$_SESSION['login']==1) and (@$_SESSION['type']=="admin"))
  {	

	 $q2="select * from users inner join oil_stations on users.id_st=oil_stations.id_st";
	 $r2=mysqli_query($conn,$q2);
	  
	echo
	   "           <div class=\"container\">
				  <div class=\"alert alert-success\">
				  <strong>Users List</strong>
				  </div>
				  
				  <a href='adduser.php'><button type=\"button\" class=\"btn\">+</button></a>
				  <br><br>
	  <table class=\"table table-striped\">
		<thead>
		  <tr>
			<th>Username</th>
			<th>type</th>
			<th>Oil Station</th>
			<th>Action</th>
		  </tr>
		</thead> 
		 <tbody>";
		 while($row1=mysqli_fetch_array($r2))
	  {
		echo " 
		  <tr>
			<td>$row1[username]</td>
			<td>$row1[type]</td>
			<td>$row1[st_name]</td>
			<td><a href=\"edit_user.php?id_usr=$row1[id_usr]\">
			  <span class=\"glyphicon glyphicon-pencil\"></span></a>&nbsp;
			<a href=\"delete_user.php?id_usr=$row1[id_usr]\" onclick=\"x=confirm('Do you want to delete this user?');return x;\">
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