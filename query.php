<?php
include("connect.php");

	if($_GET['q']==1)
	{
	      
		$qr2="select id_usr,username,type,id_st from users where username='$_GET[username]' and password='$_GET[password]'";
		$qrr2=mysqli_query($conn,$qr2);
		 
		$data=array();
		$i=0;
		
        while(@$row=mysqli_fetch_assoc($qrr2))
		{
			$data[$i]=$row; // εισαγωγη δεδομένων στο πίνακα $data
			$i++;
		}
	
		$js=json_encode($data);
		
		echo ($js);
	}
if($_GET['q']==2)
	{
	      
		$qr2="select distinct id_sale,date1,email,phone,id_pr,quantity,price from sales left outer join users on sales.id_st=users.id_st where users.id_st=$_GET[id_st] order by date1 asc";
		$qrr2=mysqli_query($conn,$qr2);
		 
		$data=array();
		$i=0;
        while($row=mysqli_fetch_assoc($qrr2))
		{
			$data[$i]=$row;
			$i++;
		}
	
		$js=json_encode($data);
		echo ($js);
	}
	
	if($_GET['q']==3)
	{
	      
		$s3="select * from oil_stations";
		$rs3=mysqli_query($conn,$s3);
		 
		$data=array();
		$i=0;
        while($row=mysqli_fetch_assoc($rs3))
		{
			$data[$i]=$row;
			$i++;
		}
	
		$js=json_encode($data);
		echo ($js);
	}
	
	
	
?>	