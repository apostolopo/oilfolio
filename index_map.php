<?php
$p=basename(__FILE__);
include("up.php");
       if(isset($_GET['id_st']))
	   { 
           ?>
	 <script>
		   function initMap() 
		   {
				 var marker;
				 var mLatLng = new google.maps.LatLng(38.069987,21.886262);
				 var markers=new Array();
				 var map = new google.maps.Map(document.getElementById('map'), {
						  zoom: 9,
						  center: mLatLng,
						});
				<?php
			
						$s3="select * from oil_stations where id_st=$_GET[id_st]";
						$rs3=mysqli_query($conn,$s3);
						$i=0;
						while ($row = mysqli_fetch_array($rs3))
							if ($row>0)
							{
								{
									echo"
										var myLatLng$i = {lat: $row[latitude], lng: $row[longitude]};
										
										marker$i = new google.maps.Marker({  
											position: myLatLng$i,  
											map: map  
												});
										
										
										 var infowindow$i = new google.maps.InfoWindow({
										  content: \"<a href='buy.php?id_st=$row[id_st]'><b>$row[st_name]</b></a><br>Phone: $row[phone]<br>City: $row[city]<br>Address: $row[address]\"
										});

									   
										marker$i.addListener('click', function() {
										  infowindow$i.open(map, marker$i);
										});
										
										map.setCenter(myLatLng$i);
									   ";
									
									$i++;
							   }
							}
							else
							{
								map.setCenter(mLatLng);
							}
			 ?> 
				   
			   
		   }
	</script>

		  <?php
	   }else{
	 ?>     
    <script>
	   function initMap() 
	   {
		     var marker;
			 var markers=new Array();
		     var map = new google.maps.Map(document.getElementById('map'), {
					  zoom: 6.2,
					  
					});
		    <?php
		
					$s3="select * from oil_stations";
					$rs3=mysqli_query($conn,$s3);
					$i=0;
					while ($row = mysqli_fetch_array($rs3))
					{
						echo"
							var myLatLng$i = {lat: $row[latitude], lng: $row[longitude]};
							
							marker$i = new google.maps.Marker({  
								position: myLatLng$i,  
								map: map  
									});
							
							
							 var infowindow$i = new google.maps.InfoWindow({
							  content: \"<a href='buy.php?id_st=$row[id_st]'><b>$row[st_name]</b></a><br>Phone: $row[phone]<br>City: $row[city]<br>Address: $row[address]\"
							});

						   
							marker$i.addListener('click', function() {
							  infowindow$i.open(map, marker$i);
							});
							
							map.setCenter(myLatLng$i);
						   ";
						
						$i++;
				   }
	   
	     ?> 
		   	   
		   
	   }
	</script>
	   <?php }   // end id_pr
	  
	
	  
	  
	  
	   ?>
		<div class="container" style="margin-top:1%;">
		 <div id="map" style="width:100%; height:400px; margin-left:0%;"></div>
		</div>
	<?php
      include("footer.php");
      ?>	  
 </body>
</html>