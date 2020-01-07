<?php

$p=basename(__FILE__);
include("up.php");
							
					        $s=@$_GET['s'];
							$cr="concat(st_name,' ',city) like '%$s%' ";		 

							  $s1="select * from oil_stations where $cr ";
							  $r1=mysqli_query($conn,$s1);
							  $row=@mysqli_fetch_assoc($r1);
							 
								 $id_st=$row['id_st'];
							     
							  
							//  echo $row['id_st'];
							//  $id_st=$row['id_st'];
							  echo $id_st;
							  
							
                 
		             
						if(@isset($_POST['lgnbtn2']))
							{  	
							
								
							  header("Location: index_map.php?id_st=$_POST[id_st]");
							}  
						
					
		 
		
     
		 ?>
		
			<div class="container">
			  <div class="alert alert-success">
			  <strong>Search a Station</strong>
			   </div>
			  <form action="" method="post">
				<div class="form-group">
				  <label for="sel1">Oil Station:</label>
				 <input type='text' class='form-control' name=search id='search1' placeholder='Search' onKeyup='loadDoc();'>
				 </div>
				 <div class="form-group">
				 </div>
				 <button type="submit" class="btn btn1" name="lgnbtn2" >Search</button>
				  <div id=list style="visibility: hidden">
				  <input type=varchar name='id_st' value='<?php echo "$row[id_st]";?>' >
				  </div>
			   </form>
				 
			  </div> 
			<script>
				 function loadDoc() {
						 
					  var xhttp = new XMLHttpRequest();
				  xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
					   document.getElementById("list").innerHTML = this.responseText;
					}
				  };
				  
				  v=document.getElementById('search1').value;
				 
				 
				  xhttp.open("GET", "srcshop.php?s="+v, false);
				  xhttp.send();
				}
				 
				//loadDoc();
		</script>	
             
			 





			  
			 <?php
	     
		 include("footer.php");
		 ?>
     
 </body>
</html>