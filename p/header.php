<?php
	//if((isset($_SESSION['adminuser'])) || (isset($_COOKIE["adminuser"])))

	//{
?>
<html>

			<form method="post" action="home.php">
				<br/>
					<table border="0" cellpadding="0" style="width: 50%; background-color: #D3D3D3; ">
				<tr>

					<tr bgcolor="#378bad">
					<STYLE>A {text-decoration: none;} </STYLE>
					<td height="50" style="text-align: center; vertical-align: middle;"><a href='home.php'><b><font color="white">Home</font></b></a></td>
					<td style="text-align: center; vertical-align: middle;"><a href='reg.php'><b><font color="white">Add Admin</font></b></a></td>
					<td style="text-align: center; vertical-align: middle;"><a href='UserBlock.php'><b><font color="white">User Block</font></b></a></td>
					<td style="text-align: center; vertical-align: middle;"><a href='product.php'><b><font color="white">Product</font></b></a></td>
					<td style="text-align: center; vertical-align: middle;"><a href='logout.php'><b><font color="white">Logout</font></b></a></td>
							
				</tr>
				
			</table>	
			</form>

</html>

<?php
//}else{
		//header("location: ../login.php");
		//}	
?>