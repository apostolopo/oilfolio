<?php

$p=basename(__FILE__);
include("up.php");
	if ((@$_SESSION['login']==1) and (@$_SESSION['type']=="admin"))
    {	 
			if(@isset($_POST['lgnbtn2']))
			{    
				$q6="update users set username= '$_POST[username]',password='$_POST[pwd]',id_st='$_POST[id_st]',type='$_POST[type]' where id_usr=$_GET[id_usr] ";
				
				//$qr4=mysqli_query($conn,$q4);
				if(mysqli_query($conn,$q6))
				{   
			             
						   
					  
						echo "	<div class=\"container\">
							  <div class=\"alert alert-success\">
							  <strong>Ο χρήστης ενημερώθηκε επιτυχώς</strong>
							</div></div> ";
							
							
						   
				}
				else
				{
					echo "	<div class=\"container\">
							  <div class=\"alert alert-success\">
							  <strong>Δεν ενημερώθηκεε ο χρήστης!!<br>
							  Το όνομα Χρήστη που επιλέξατε στο συγκεκριμένο κατάστημα χρησιμοποιείται.</strong>
						</div></div> ";
					
						
				}
				
			}
			
		$q5="select * from oil_stations inner join users on oil_stations.id_st=users.id_st where users.id_usr=$_GET[id_usr]" ;
		$q3="select distinct oil_stations.id_st, oil_stations.st_name from oil_stations left join users on oil_stations.id_st=users.id_st ";
		$r3=mysqli_query($conn,$q3);
		$r5=mysqli_query($conn,$q5);
		
		$qr5=@mysqli_fetch_array($r5);
        
			
     
		 ?>
			<div class="container">
			  <div class="alert alert-success">
			  <strong>Edit User</strong>
			   </div>
			  <form action="" method="post">
				<div class="form-group">
				  <label for="Username">Username:</label>
				  <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username"  value='<?php echo "$qr5[username]";?>' >
				</div>
				<div class="form-group">
				  <label for="pwd">Password:</label>
				  <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" value='$r3[password]' value='<?php echo "$qr5[password]";?>'>
				</div>
				<div class="form-group">
				  <label for="sel1">Work in Oil Station:</label>
				  <select class="form-control" id="sel1" name="id_st">
				  
				  
				  <?php 
					
					    
					   while($qr3=mysqli_fetch_assoc($r3)) 
						{
						 if($qr3['id_st']==$qr5['id_st'])
						 {
						
						echo " <option value='$qr3[id_st]' selected='selected'>$qr3[st_name]</option>";
						 }
						 else
						 {
							 echo " <option value='$qr3[id_st]'>$qr3[st_name]</option>";
						 }
						
						}						
					
					
					
					
				  
				  ?>
				  </select>
				  </div>
				 <div class="form-group">
				  <label for="type">Type:</label><br>
				  <input type="radio" name="type" class="form-group" value="admin" <?php if($qr5['type']=="admin") {echo "checked";}?>> admin
				  <input type="radio" name="type" class="form-group" value="user" <?php if($qr5['type']=="user") {echo "checked";}?>> user
				</div>
				<button type="submit" class="btn btn1" name="lgnbtn2">Save</button>&nbsp;&nbsp;&nbsp;<a href="userslist.php"><button type="button" class="btn btn1" name="lgnbtn3">Back to User List</button></a>
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