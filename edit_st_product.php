<?php

$p=basename(__FILE__);
include("up.php");
	if ((@$_SESSION['login']==1) and (@$_SESSION['type']=="user"))
    {	 
			if(@isset($_POST['lgnbtn2']))
			{    
				$q6="update station_product set id_pr= '$_POST[id_pr]',quantity='$_POST[quantity]',cost_per_kilo='$_POST[costpk]' where id_st_pr=$_GET[id_st_pr] ";
				
				//$qr4=mysqli_query($conn,$q4);
				if(mysqli_query($conn,$q6))
				{   
			             
						   
					  
						echo "	<div class=\"container\">
							  <div class=\"alert alert-success\">
							  <strong>Το ενημερώθηκε επιτυχώς</strong>
							</div></div> ";
							
							
						   
				}
				else
				{
					echo "	<div class=\"container\">
							  <div class=\"alert alert-success\">
							  <strong>Δεν ενημερώθηκεε το προιόν!!<br>
							  </strong>
						</div></div> ";
					
						
				}
				
			}
		 $q3="select distinct products.id_pr,products.pr_name from products left join station_product on products.id_pr=station_product.id_pr ";
          $r3=mysqli_query($conn,$q3);
		  $q5="select * from station_product inner join oil_stations where id_st_pr=$_GET[id_st_pr]";
          $r5=mysqli_query($conn,$q5);
		  $row=@mysqli_fetch_assoc($r5);
    
		
     
		 ?>
			<div class="container">
			  <div class="alert alert-success">
			  <strong>Edit Product in Station <?php echo $row['st_name'];?></strong>
			   </div>
			  <form action="" method="post">
				<div class="form-group">
				  <label for="sel1">Product Name:</label>
				  <select class="form-control" id="sel1" name="id_pr" >
				  <?php while($qr3=mysqli_fetch_array($r3))
				   {
					   if($qr3['id_pr']==$row['id_pr'])
					   {
						   echo " <option value='$qr3[id_pr]' selected='selected'>$qr3[pr_name]</option>";
					   }
				       else
					   {
						   
					   	  echo " <option value='$qr3[id_pr]'>$qr3[pr_name]</option>";
					   }
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
				  <input type="text" class="form-control" id="quantity"  name="quantity" value='<?php echo "$row[quantity]";?>'>
				</div>
				<div class="form-group">
				  <label for="Cost Per Kilo">Cost Per Kilo:</label>
				  <input type="text" class="form-control" id="costpk"  name="costpk" value='<?php echo "$row[cost_per_kilo]";?>'>
				</div>
				<button type="submit" class="btn btn1" name="lgnbtn2">Save</button>&nbsp;&nbsp;&nbsp;<a href="putproduct.php"><button type="button" class="btn btn1" name="lgnbtn3">Back to Products</button></a>
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