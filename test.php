echo "	<div class=\"container\">
				  <div class=\"alert alert-success\">
				  <strong>Add User</strong>
				   </div>
					<form action=\"\" method=\"post\">
						<div class=\"form-group\">
						  <label for=\"Username\">Username:</label>
						  <input type=\"text\" class=\"form-control\" id=\"username\" placeholder=\"Enter Username\" name=\"username\" value='$_POST[username]'>
						</div>
						<div class=\"form-group\">
						  <label for=\"pwd\">Password:</label>
						  <input type=\"password\" class=\"form-control\" id=\"pwd\" placeholder=\"Enter password\" name=\"pwd\" value='$_POST[pwd]'>
						</div>
						<div class=\"form-group\">
						  <label for=\"sel1\">Work in Oil Station:</label>
						  <select class=\"form-control\" id=\"sel1\" name=\"id_st\" value='$_POST[id_st]'> ";
						   while($qr3=mysqli_fetch_array($r3))
						   {
						   echo " <option value='$qr3[id_st]'>$qr3[st_name]</option>";
							
							}
						  
						  echo "
						  </select>
						  </div>
						 <div class=\"form-group\">
						  <label for=\"type\">Type:</label><br>
						  <input type=\"radio\" name=\"type\" class=\"form-group\" value=\"admin\" > admin
						  <input type=\"radio\" name=\"type\" class=\"form-group\" value=\"user\" > user
						</div>
					 <button type=\"submit\" class=\"btn btn1\" name=\"lgnbtn1\">Add</button>
				   </form>
				 </div>	  ";
				  else
			 {
				 echo "	<div class=\"container\">
							  <div class=\"alert alert-success\">
							  <strong>Πρέπει να συνδεθείτε!!</strong>
							</div></div> ";
			 }
		 
		 
		 if(@isset($_POST['lgnbtn1']))
			{