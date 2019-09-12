<?php
//|| (isset($_COOKIE["adminuser"])))
error_reporting(0);
session_start();
require "adminlogo.php";
require "are_you_sure.php";


	if($_SESSION['adminuser']!="valid") 

	{
       header("location: ../user_login.php");
   }
   else{

      $_SESSION['admin']=$_SESSION['adminuser2'];




?>
<html>
	<head>
		<style >

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

			


		</style>
		</head>
		<body>
			<!-- create admin home page -->
			<form method="post" action="adminhome.php">
				<br/>
					<table border="0" cellpadding="0" style="width: 50%; background-color: #D3D3D3; ">
				<tr>
                  
					<tr bgcolor="#378bad">
					<STYLE>A {text-decoration: none;} </STYLE>
					
					<td height="50" style="text-align: center; vertical-align: middle;"><a href='addadmin.php'><b><font color="white">Add Admin</font></b></a></td>
					<td style="text-align: center; vertical-align: middle;"><a href='user.php'><b><font color="white">Users</font></b></a></td>
					
					<td style="text-align: center; vertical-align: middle;"><a href='addproduct.php'><b><font color="white">Add Product</font></b></a></td>
					<td style="text-align: center; vertical-align: middle;"><a href='availableproduct.php'><b><font color="white">Available Product</font></b></a></td>
					<td style="text-align:center; vertical-align: middle;"><a href='emptyproduct.php'><b><font color="white">Empty Product</font></b></a></td>
					<td style="text-align:center; vertical-align: middle;"><a href='profile.php'><b><font color="white">Profile</font></b></a></td>
					

					
							
				</tr>
				
				
			</table>

			



				<tr></tr>
				<tr></tr>
				<tr></tr>
				<tr></tr>
				<tr>
					<td>
						<td align="right"><a href='review.php'><b><font color="blue">Riview</font></b></a></td>
					</td>
				</tr>


				
			</table>
				
			</form>

</html>

<?php 
}

?>


		


		
