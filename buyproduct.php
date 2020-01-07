<?php

$p=basename(__FILE__);
include("up.php");
		 
		  if(@$_GET['p']==2)
		  {
			 echo "	<div class=\"container\">
							  <div class=\"alert alert-success\">
							  <strong>Η αγορά πραγματοποιήθηκε επιτυχώς!</strong>
							</div>
							<a href='index.php?'>Πίσω στον χάρτη αγορών.</a></div></div>  
							 ";
							die();
		  }
		 
		 
		 
			if(@isset($_POST['lgnbtn2']))
			{    
		         $date1 = date('Y-m-d H:i:s');
				 
				$q6="insert into sales (email,phone,id_st,id_pr,quantity,price,date1)
                    values ('$_POST[email]','$_POST[phone]','$_GET[id_st]','$_GET[id_pr]','$_POST[quantity]','$_POST[price]','$date1') ";
				$q7="update station_product set st_bank=(st_bank +'$_POST[price]'),quantity=(quantity-'$_POST[quantity]') where id_st=$_GET[id_st] and id_pr=$_GET[id_pr]";
				 mysqli_query($conn,$q7);
				
				if(mysqli_query($conn,$q6))
				{   
			            
						   
					  
						 unset($_POST); 
						 header('Location: buyproduct.php?p=2&id_st=$_GET[id_st]');
						   
				}
				else
				{
					echo "	<div class=\"container\">
							  <div class=\"alert alert-success\">
							  <strong>Η αγορά δεν πραγματοποιήθηκε!<br>
							  </strong>
						</div></div> ";
					    die();	
				} 
				
			}
		  $q3="select * from oil_stations where id_st=$_GET[id_st]";
          $r3=mysqli_query($conn,$q3);
		  $row1=@mysqli_fetch_array($r3);
		  $q5="select * from station_product inner join products on station_product.id_pr=products.id_pr where station_product.id_pr=$_GET[id_pr] and station_product.id_st=$_GET[id_st] ";
          $r5=mysqli_query($conn,$q5);
		  $row=@mysqli_fetch_assoc($r5);
    
		
     
		 ?>
		 <script>
		  function CalcPrice()
		  {
			 
			  quant=document.getElementById("quantity").value/1;
			   cost_per_kilo='<?php echo "$row[cost_per_kilo]";?>'
			   price=quant * cost_per_kilo;
			   document.getElementById("price").value=price;
			   
          } 		 
		 </script>
			<div class="container">
			  <div class="alert alert-success">
			  <strong>Buy a Product</strong>
			   </div>
			  <form action="" method="post">
				<div class="form-group">
				  <label for="sel1">Email:</label>
				  <input type="email" class="form-control" id="email" required name="email">
				  </div>
				  <div class="form-group">
				  <label for="sel1">Phone:</label>
				  <input type="text" class="form-control" id="phone" required  name="phone">
				  </div>
				 <div class="form-group">
				  <label for="Station">Station:</label>
				  <input type="text" class="form-control" id="st_name"  name="st_name" value='<?php echo "$row1[st_name]";?>'  style="background-color:#eee;">
				</div> 
				<div class="form-group">
				  <label for="Product">Product:</label>
				  <input type="text" class="form-control" id="pr_name"  name="pr_name"  value='<?php echo "$row[pr_name]";?>'  style="background-color:#eee;" >
				</div> 
				<div class="form-group">
				  <label for="Quantity">Quantity:</label>
				  <input type="text" class="form-control" id="quantity"  name="quantity"  onchange="CalcPrice();">
				</div>
				<div class="form-group">
				  <label for="price">Price:</label>
				  <input type="text" class="form-control" id="price"  name="price">
				</div>
				
				<button type="submit" class="btn btn1" name="lgnbtn2">Buy</button>
			   </form>
			  </div>  
			 <?php
	     
		 include("footer.php");
		 ?>
     
 </body>
</html>