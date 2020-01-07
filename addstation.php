<?php

$p=basename(__FILE__);
include("up.php");
	if ((@$_SESSION['login']==1) and (@$_SESSION['type']=="admin"))
    {	 
          if(@$_GET['p']==3)
		  {
			  echo "	<div class=\"container\">
							  <div class=\"alert alert-success\">
							  <strong>Το κατάστημα καταχωρήθηκε επιτυχώς</strong>
							</div><a href='oilstations.php'>Πίσω στα καταστήματα.</a></div> ";
							die();
							
		  }


			if(@isset($_POST['lgnbtn1']))
			{    
				$q4="insert into oil_stations (st_name,phone,city,address,longitude,latitude)
				values ('$_POST[st_name]','$_POST[phone]','$_POST[city]','$_POST[address]','$_POST[longitude]','$_POST[latitude]')";
				//$qr4=mysqli_query($conn,$q4);
				if(mysqli_query($conn,$q4))
				{   
			             unset($_POST); 
						 header('Location: addstation.php?p=3');			
						   
				}
				else
				{
					echo "	<div class=\"container\">
							  <div class=\"alert alert-success\">
							  <strong>Δεν καταχωρήθηκε το κατάστημα!
							  </strong>
						</div></div> ";	
				}
				
			}
			 
		
     
		 ?>
		 <script>
				 function initMap() {
					 var myLatLng= {lat: 38.245812, lng: 21.735333};
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
			  <strong>Add Oil Station</strong>
			   </div>
			  <form action="" method="post">
			  <div class="row">
			   <div class="col-md-4">
                <div id="map" style="width:100%; height:300px;"></div>
			   
			   </div>
			    <div class="col-md-8">
				<div class="form-group">
				  <label for="Product Name">Product Name:</label>
				  <input type="text" class="form-control" id="st_name" placeholder="Enter station name" name="st_name" >
				</div>
				<div class="form-group">
				  <label for="phone">Phone:</label>
				  <input type="text" class="form-control" id="phone" placeholder="Enter Phone" name="phone" >
				</div>
				<div class="form-group">
				  <label for="city">City:</label>
				  <input type="text" class="form-control" id="city" placeholder="Enter city" name="city" >
				</div>
				<div class="form-group">
				  <label for="Address">Address:</label>
				  <input type="text" class="form-control" id="address" placeholder="Enter Address" name="address" >
				</div>
				<div class="form-group" style="display:none;" >
				<label for="Address">Longitude:</label>
				<input type="text" class="form-control" id="longi"  name="longitude" >
				</div>
				<div class="form-group" style="display:none;" >
				<label for="Address">latitude:</label>
				<input type="text" class="form-control" id="lati"  name="latitude" >
				</div>
				<button type="submit" class="btn btn1" name="lgnbtn1">Add</button>
				
			  </div>	
			 </div>
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