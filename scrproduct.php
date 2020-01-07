<?php

$p=basename(__FILE__);
include("up.php");
		 

		 
			if(@isset($_POST['lgnbtn2']))
			{   
		      
				header("Location: index.php?id_pr='$_POST[id_pr]'");
				
			}
		  $q3="select * from products";
          $r3=mysqli_query($conn,$q3);
		 
		
     
		 ?>
		
			<div class="container">
			  <div class="alert alert-success">
			  <strong>Search a Product</strong>
			   </div>
			  <form action="" method="post">
				<div class="form-group">
				  <label for="sel1">Product:</label>
				  <select class="form-control" id="sel1" name="id_pr">
				  <?php while($qr3=mysqli_fetch_array($r3))
				   {
						echo " <option value='$qr3[id_pr]'>$qr3[pr_name]</option>";
				   }
				  
				  ?>
				   </select>
				  </div>
				<button type="submit" class="btn btn1" name="lgnbtn2">Search</button>
			   </form>
			  </div>  
			 <?php
	     
		 include("footer.php");
		 ?>
     
 </body>
</html>