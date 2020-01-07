<?php

$p=basename(__FILE__);
include("up.php");
	if ((@$_SESSION['login']==1) and (@$_SESSION['type']=="admin"))
    {	 
          if(@$_GET['p']==1)
		  {
			  echo "	<div class=\"container\">
							  <div class=\"alert alert-success\">
							  <strong>Ο χρήστης καταχωρήθηκε επιτυχώς</strong>
							</div><a href='userslist.php'>Πίσω στην Λίστα Χρηστών.</a></div> ";
							die();
		  }


			if(@isset($_POST['lgnbtn1']))
			{    
				$q4="insert into users (username,password,id_st,type)
				values ('$_POST[username]','$_POST[pwd]','$_POST[id_st]','$_POST[type]')";
				if(mysqli_query($conn,$q4))
				{   
			             unset($_POST); 
						 header('Location: adduser.php?p=1');			
						   
				}
				else
				{
					echo "	<div class=\"container\">
							  <div class=\"alert alert-success\">
							  <strong>Δεν καταχωρήθηκε ο χρήστης!!<br>
							  Το όνομα Χρήστη που επιλέξατε στο συγκεκριμένο κατάστημα χρησιμοποιείται.</strong>
						</div></div> ";
					
						
				}
				
			}
		$q3="select * from oil_stations";
		$r3=mysqli_query($conn,$q3);

		
     
		 ?>
			<div class="container">
			  <div class="alert alert-success">
			  <strong>Add User</strong>
			   </div>
			  <form action="" method="post">
				<div class="form-group">
				  <label for="Username">Username:</label>
				  <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username" >
				</div>
				<div class="form-group">
				  <label for="pwd">Password:</label>
				  <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" >
				</div>
				<div class="form-group">
				  <label for="sel1">Work in Oil Station:</label>
				  <select class="form-control" id="sel1" name="id_st">
				  <?php while($qr3=mysqli_fetch_array($r3))
				   {
				   echo " <option value='$qr3[id_st]'>$qr3[st_name]</option>";
					
					}
				  
				  ?>
				  </select>
				  </div>
				 <div class="form-group">
				  <label for="type">Type:</label><br>
				  <input type="radio" name="type" class="form-group" value="admin" > admin
				  <input type="radio" name="type" class="form-group" value="user" > user
				</div>
				<button type="submit" class="btn btn1" name="lgnbtn1">Add</button>
			   </form>
			  </div>  
			 <?php
	        



			
	}else
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