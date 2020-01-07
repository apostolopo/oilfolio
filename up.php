<?php
include("connect.php");
	    $p1="";
		$p2="";
		$p3="";
		$p4="";
		$p5="";
		$p6="";
		$p7="";
		$p8="";
		$p9="";
		$p10="";
		$p11="";
		$p12="";
		$p13="";
		$p14="";
		if ($p=="index.php") $p1="class=active";
		if ($p=="srcproduct.php") $p2="class=active";
		if ($p=="srcshop.php") $p3="class=active";
		if ($p=="buy.php") $p4="class=active";
		if ($p=="login.php") $p5="class=active";
		if ($p=="logout.php") $p6="class=active";
		if ($p=="oilstations.php") $p7="class=active";
		if ($p=="products.php") $p8="class=active";
		if ($p=="userslist.php") $p9="class=active";
		if ($p=="index_user.php") $p10="class=active";
		if ($p=="putproduct.php") $p11="class=active";
		if ($p=="showsales.php") $p12="class=active";
		if ($p=="statistics.php") $p13="class=active";
			if(isset($_POST['lgnbtn']))
			{
				$q1="select* from users where username='$_POST[username]' and password='$_POST[pwd]'";
				$r1=mysqli_query($conn,$q1);
					if(@mysqli_num_rows($r1)>0)
					{
						
						$_SESSION['login']=1;
						$qr1=mysqli_fetch_array($r1);
						$_SESSION['type']=$qr1['type'];
						$_SESSION['id_st']=$qr1['id_st'];
						
					}
					else
					{
						$_SESSION['login']=0;
					}
					
				
			}

		?>

		<html lang="en">
		<head>
		  <title>OilFolio</title>
		  <meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		  <link rel="icon" type="image/png" href="olive-oil-icon.png">
		  <link rel="stylesheet" href="mycss.css">
			 
		</head>
		
		<body>

		<nav class="navbar navbar-inverse navbar-fixed-top">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <a class="navbar-brand" href="#">OilFolio</a>
			</div>
			<ul class="nav navbar-nav">
		<?php	
		   if(@$_SESSION['login']!=1)
		  {
		 echo "	
			
			      <li $p1><a href=\"index.php\">Home</a></li>
				  <li $p2><a href=\"scrproduct.php\">Search Product </a></li>
				  <li $p3><a href=\"srcshop.php\">Search Shop</a></li>
				</ul>
				<ul class='nav navbar-nav navbar-right'>
				  <li $p5><a href='login.php'><span class=\"glyphicon glyphicon-log-in\"></span> Login</a></li>
				</ul>
			   </div>
			  </nav> ";
			
		   }
		 else if(@$_SESSION['login']==1) 
		 {  
				 if(@$_SESSION['type']=="admin")
					{
					echo "	
						  <li $p1><a href='index.php'>Home</a></li>
						  <li $p7><a href='oilstations.php'>Oil Stations </a></li>
						  <li $p8><a href='products.php'>Products</a></li>
						  <li $p9><a href='userslist.php'>Users List</a></li>
						  
						</ul>
						<ul class='nav navbar-nav navbar-right'>
						  <li $p6><a href='logout.php' onclick=\"x=confirm('Do you want to logout?');return x;\"><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>
						</ul>
					  </div>
					</nav> ";
					}
					 else
					 {
						 echo "	
						  <li $p10><a href='index_user.php'>Home</a></li>
						  <li $p11><a href='putproduct.php'>Put Product </a></li>
						  <li $p12><a href='showsales.php'>Show Sales </a></li>
						  <li $p13><a href='statistics.php'>Statistics</a></li>
						</ul>
						<ul class='nav navbar-nav navbar-right'>
						  <li $p6><a href='logout.php' onclick=\"x=confirm('Do you want to logout?');return x;\"><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>
						</ul>
					   </div>
					  </nav> ";
					 }
			   }
		 ?>
		<div class="img1">
		  <img src="olive_oil.jpg" width="100%;" height="300px;">
		</div> 
			<script async defer
				src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYKh9qbxI-D_3FH2WJq-4pUdMw62DyfQI&callback=initMap">
				</script>