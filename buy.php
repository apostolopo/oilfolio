<?php

$p=basename(__FILE__);
include("up.php");
		 
			
		$q5="select * from oil_stations where id_st=$_GET[id_st]";
		$r5=mysqli_query($conn,$q5);
		$qr5=@mysqli_fetch_array($r5);
      
		
     
		 ?>
			 <script>
				 function initMap() {
					var longi= document.getElementById('longi').value/1;
					var lati= document.getElementById('lati').value/1;
					
					// var myLatLng= {lat: longi, lng: lati};
					 var myLatLng = new google.maps.LatLng(lati,longi);
					 
					var map = new google.maps.Map(document.getElementById('map'), {
					  center: myLatLng,
					  zoom: 9
					});
					var marker = new google.maps.Marker({
						position: myLatLng,
						map: map,
						});
					
					map.addListener('click',function(e) {
						marker.setMap(null);
						document.getElementById('longi').value="";
						document.getElementById('lati').value="";
						c=e.latLng;
						marker = new google.maps.Marker({
							position: c,
							map: map,	
									
						});	
						document.getElementById('longi').value=e.latLng.lng();
						document.getElementById('lati').value=e.latLng.lat();
					}); 
					
					
				 }
		 </script>
		 
		 
			<div class="container">
			  <div class="alert alert-success">
			  <strong>Info and Buy</strong>
			   </div>
			  <div class="row">
			   <div class="col-md-4">
                <div id="map" style="width:100%; height:280px;"></div>
			   
			   </div>
			    <div class="col-md-8">
				<div class="form-group">
				  <label for="Product Name">Station Name:</label>
				  <input type="text" class="form-control" id="st_name" placeholder="Enter station name" name="st_name" value='<?php echo "$qr5[st_name]";?>' style="background-color:#eee;">
				</div>
				<div class="form-group">
				  <label for="phone">Phone:</label>
				  <input type="text" class="form-control" id="phone" placeholder="Enter Phone" name="phone" value='<?php echo "$qr5[phone]";?>'>
				</div>
				<div class="form-group">
				  <label for="city">City:</label>
				  <input type="text" class="form-control" id="city" placeholder="Enter city" name="city" value='<?php echo "$qr5[city]";?>' style="background-color:#eee;">
				</div>
				<div class="form-group">
				  <label for="Address">Address:</label>
				  <input type="text" class="form-control" id="address" placeholder="Enter Address" name="address" value='<?php echo "$qr5[address]";?>'>
				</div>
				<div class="form-group" style="display:none;" >
				<label for="Address">Longitude:</label>
				<input type="text" class="form-control" id="longi"  name="longitude" value='<?php echo "$qr5[longitude]";?>' >
				</div>
				<div class="form-group" style="display:none;" >
				<label for="Address">latitude:</label>
				<input type="text" class="form-control" id="lati"  name="latitude" value='<?php echo "$qr5[latitude]";?>'>
				</div>
				</div>
				<div>
			   <?php
			    $q6="select * from station_product inner join products on station_product.id_pr=products.id_pr where id_st=$_GET[id_st] ";
				$r6=mysqli_query($conn,$q6);
				
				echo "
	            
							  
				  <table class=\"table table-striped\">
					<thead>
					  <tr>
						<th>Product</th>
						<th>Quantity</th>
						<th>Cost Per Kilo</th>
						<th>Action</th>
					  </tr>
					</thead> 
					 <tbody>";
					while($row1=mysqli_fetch_array($r6))
					  {
						echo " 
						  <tr>
							<td>$row1[pr_name]</td>
							<td>$row1[quantity] kg</td>
							<td>$row1[cost_per_kilo]€</td>
							<td><a href=\"buyproduct.php?id_st=$_GET[id_st]&id_pr=$row1[id_pr]\">
			                <span>Buy</span></a></td>
						    </tr> ";
					   }
						echo "  
						 
						 </tbody>
							</table>
							
							" ;
				  
			   
			   ?>
			    </div>	
			   
			  </div>  
           </div>
			 <?php
		 include("footer.php");
		 ?>
     
 </body>
</html>