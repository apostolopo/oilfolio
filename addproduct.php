<?php

$p=basename(__FILE__);
include("up.php");
	if ((@$_SESSION['login']==1) and (@$_SESSION['type']=="admin"))
    {	 
          if(@$_GET['p']==2)
		  {
			  echo "	<div class=\"container\">
							  <div class=\"alert alert-success\">
							  <strong>Το προιόν καταχωρήθηκε επιτυχώς</strong>
							</div><a href='products.php'>Πίσω στην Λίστα Προιόντων.</a></div> ";
							die();
							
		  }


			if(@isset($_POST['lgnbtn1']))
			{    
				$q4="insert into products (pr_name,description)
				values ('$_POST[pr_name]','$_POST[descr]')";
				if(mysqli_query($conn,$q4))
				{   
			             unset($_POST); 
						 header('Location: addproduct.php?p=2');			
						   
				}
				else
				{
					echo "	<div class=\"container\">
							  <div class=\"alert alert-success\">
							  <strong>Δεν καταχωρήθηκε το προιόν!!<br>
							  Το προιόν χρησιμοποιείται.</strong>
						</div></div> ";	
				}
				
			}
		
     
		 ?>
			<div class="container">
			  <div class="alert alert-success">
			  <strong>Add Product</strong>
			   </div>
			  <form action="" method="post">
				<div class="form-group">
				  <label for="Product Name">Product Name:</label>
				  <input type="text" class="form-control" id="pr_name" placeholder="Enter Product" name="pr_name" >
				</div>
				<div class="form-group">
				  <label for="description">Description:</label>
				  <textarea class="form-control" rows="2" id="descr" name="descr"></textarea>
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