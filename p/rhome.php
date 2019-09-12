<?php 
error_reporting(0);
session_start();

//require to external page
require "logo.php";
require "are_you_sure.php";




 ?>

<!DOCTYPE html>
<html>
<!--create register homw page -->
	<head>
		<style>
	
		*{
			margin:0;    
			padding:0;
			font-family:Century Cothic;
			
		}
		header
		{
			//background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(photo/1.jpg);
			background-color: #ADD8E6;
			height:170vh;
			background-size:cover;
			background-position:center;
		}
		header padding{
			color: black;
			font-size:25px;
			line-height:55px;
		}
		ul
		{
			float:right;
			list-style-type;none;
		}
		ul li{
			display:inline-block;
		}
		ul li a{
			text-decoration:none;
			color:#fff;
			padding:5px 20px;
			border: 1px solid transparent;
			transition:0.6s ease; 
			
		}
		ul li a:hover
		{
			background-color:#008B8B;
			color:black;
		}

		.logo img
		{
			float:left;
			width:150px;
			height:auto;
		}
		.main
		{
			max-width:1200px;
			margin:auto;
		}

		}
		
		.main ul li a 
		{
			font-family:arial;
			color:white;
			font-size:15px;
			padding:25px 15px;
			//border: 1px solid transparent;

		}


.topnav {
  overflow: hidden;
  background-color:none;

}

.topnav a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #008B8B;
  color: black  ;
}

.button {
  background-color: none;
  border: none;
  color: black;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
.button:hover
		{
			background-color:#008B8B;
			color:black;
		}

.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}

@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #008B8B;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 100px;
}



.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: black;
  display: block;
  transition: 0.3s;
}


.sidenav a:hover {
  color: #FFFFFF;
}
.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
  color:#FFFFFF;
}
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
		</style>
				<title> Home page</title>
				
	</head>
	<body >
		
		<header >
		<table width="1050" height="200">
		<tr><td>
				<div class="main">
				<div class="logo">
				<a href="rhome.php"><img src="logo.png.png"></a></div>
				</td>
		
				<td>
				
			</div>
			</td>
			</tr>

			<tr>
				<td width="90">
					<!-- create sidebar -->

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&#9776;</a>
  <a href="userprofilr.php">Profile</a>
  <a href="#">Order List</a>
  <a href="#">Cart</a>
  <a href="#">Transactions</a>
  
</div>

<span style="color:white;font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Click</span>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
				</td>
			</tr>

		<tr>
		<td colspan="2">
	

    </form>
  </div>
</div>
</td>


		</table>
		
			
		

	</header>
		</body>
<html>

<?php 

require "aboutus.php";

 ?>