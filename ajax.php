<?php

$p=basename(__FILE__);
include ("connect.php");

           $s=@$_GET['s'];
							 
			$cr="concat(st_name,' ',city) like '%$s%' ";		 

 				  
		 
		  $s1="select * from oil_stations where $cr ";
		  $rs1=mysqli_query($conn,$s1);
		  $r1=@mysqli_fetch_array($rs1);
		  header("Location: index.php?id_st='$r1[id_st]'");
       
		 
		   
   
		?> 
		
		 


