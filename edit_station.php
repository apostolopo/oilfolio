<?php

$p=basename(__FILE__);
include("up.php");
	if ((@$_SESSION['login']==1) and (@$_SESSION['type']=="admin"))
    {	 
			if(@isset($_POST['lgnbtn2']))
			{    
				$q6="update oil_stations set st_name= '$_POST[st_name]',phone='$_POST[phone]',city='$_POST[city]',address='$_POST[address]',longitude='$_POST[longitude]',latitude='$_POST[latitude]' where id_st=$_GET[id_st] ";
				
				//$qr4=mysqli_query($conn,$q4);
				if(mysqli_query($conn,$q6))
				{   
			             
						   
					  
						echo "	<div class=\"container\">
							  <div class=\"alert alert-success\">
							  <strong>Το κατάστημα ενημερώθηκε επιτυχώς</strong>
							</div></div> ";
							
							
						   
				}
				else
				{
					echo "	<div class=\"container\">
							  <div class=\"alert alert-success\">
							  <strong>Δεν ενημερώθηκεε το κάταστημα!
							  strong>
						</div></div> ";
					
						
				}
				
			}
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
			  <strong>Add Oil Station</strong>
			   </div>
			  <form action="" method="post">
			  <div class="row">
			   <div class="col-md-4">
                <div id="map" style="width:100%; height:300px;"></div>
			   
			   </div>
			    <div class="col-md-8">
				<div class="form-group">
				  <label for="Product Name">Station Name:</label>
				  <input type="text" class="form-control" id="st_name" placeholder="Enter station name" name="st_name" value='<?php echo "$qr5[st_name]";?>'>
				</div>
				<div class="form-group">
				  <label for="phone">Phone:</label>
				  <input type="text" class="form-control" id="phone" placeholder="Enter Phone" name="phone" value='<?php echo "$qr5[phone]";?>'>
				</div>
				<div class="form-group">
				  <label for="city">City:</label>
				  <input type="text" class="form-control" id="city" placeholder="Enter city" name="city" value='<?php echo "$qr5[city]";?>'>
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
				<button type="submit" class="btn btn1" name="lgnbtn2">Save</button>&nbsp;&nbsp;&nbsp;<a href="oilstations.php"><button type="button" class="btn btn1" name="lgnbtn3">Back to Oil Stations</button></a>
				
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