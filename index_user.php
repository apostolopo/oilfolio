<?php
$p=basename(__FILE__);
include("up.php");
 
    if ((@$_SESSION['login']==1) and (@$_SESSION['type']=="user"))
	 {
		  
		          
?>  
    <script>
	   function initMap() 
	   {            
	                          
		   
		    <?php
		            $s3="select * from oil_stations where id_st=$_SESSION[id_st]";
					  $q3=mysqli_query($conn,$s3);
				      $row=@mysqli_fetch_assoc($q3);
					
				 ?> 	 
						
								
								var myLatLng = new google.maps.LatLng(<?php echo $row['latitude'];?>,<?php echo $row['longitude']; ?>);
								var marker; 
							    
								
								 var map = new google.maps.Map(document.getElementById('map'), {
										  center: myLatLng,
										  zoom: 10
					                      
									});
							marker = new google.maps.Marker({  
								position: myLatLng,  
								map: map  
									});
							
							
							 var infowindow = new google.maps.InfoWindow({
							  content: <?php echo " \"<a href='buy.php?id_st=$row[id_st]'><b>$row[st_name]</b></a><br>Phone: $row[phone]<br>City: $row[city]<br>Address: $row[address]\" ";?>
							});

						   
							marker.addListener('click', function() {
							  infowindow.open(map, marker);
							});
							 
		   	   
		   
	    }
	</script>
		<div class="container" style="margin-top:1%;">
		 <div id="map" style="width:100%; height:400px; margin-left:0%;"></div>
		</div>
	<?php
     }
     else
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