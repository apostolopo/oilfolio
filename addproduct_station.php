<?php

$p=basename(__FILE__);
include("up.php");
	if ((@$_SESSION['login']==1) and (@$_SESSION['type']=="user"))
    {	 
          if(@$_GET['p']==2)
		  {
			  echo "	<div class=\"container\">
							  <div class=\"alert alert-success\">
							  <strong>Το προιόν καταχωρήθηκε επιτυχώς</strong>
							</div><a href='putproduct.php'>Πίσω στα Προιόντα μου.</a></div> ";
							die();				
		  }
          $q3="select * from products";
          $r3=mysqli_query($conn,$q3);
		  $q5="select * from oil_stations where id_st=$_SESSION[id_st]";
          $r5=mysqli_query($conn,$q5);
		  $row=mysqli_fetch_assoc($r5);
		  
			if(@isset($_POST['lgnbtn1']))
			{    
				$q4="insert into station_product (id_st,id_pr,quantity,cost_per_kilo,st_bank)
				values ('$_SESSION[id_st]','$_POST[id_pr]','$_POST[quantity]','$_POST[costpk]','0')";
				
				if(mysqli_query($conn,$q4))
				{   
			             unset($_POST); 
						 header('Location: addproduct_station.php?p=2');			
						   
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
			  <strong>Add Product in Station</strong>
			   </div>
			  <form action="" method="post">
				<div class="form-group">
				  <label for="sel1">Product Name:</label>
				  <select class="form-control" id="sel1" name="id_pr">
				  <?php while($qr3=mysqli_fetch_array($r3))
				   {
				   echo " <option value='$qr3[id_pr]'>$qr3[pr_name]</option>";
					
					}
				  
				  ?>
				  </select>
				  </div>
				 <div class="form-group">
				  <label for="Station">Station:</label>
				  <input type="text" class="form-control" id="st_name"  name="st_name" value='<?php echo "$row[st_name]";?>'  style="background-color:#eee;">
				</div> 
				<div class="form-group">
				  <label for="Quantity">Quantity:</label>
				  <input type="text" class="form-control" id="quantity"  name="quantity" >
				</div>
				<div class="form-group">
				  <label for="Cost Per Kilo">Cost Per Kilo:</label>
				  <input type="text" class="form-control" id="costpk"  name="costpk">
				</div>
				<button type="submit" class="btn btn1" name="lgnbtn1">Add Product</button>
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