
<?php


$fname=$_SESSION['firstname'];
$lname=$_SESSION['lname'];

if($_SESSION['adminuser']!="valid" ) 

	{
       header("location: ../user_login.php");
   }

   else
   {


  ?>



<html>
	<head>
		<!-- create admin logo -->
		<title>Adminhompage</title>
	
	</head>
		<body  bgcolor="#708090" >
			
		<form>
		<table>

				<center>
					<h1>Welcome <?php echo $fname."  ".$lname ;  ?></h1>
					</center>
				<table ><!--first table !-->
			
				<tr>
					<td>
						<a href="adminhome.php"><h2>My Home page</h2></a>
					</td>
				  </tr>
				</table>
		</form>
	</body>
</html>

<?php } ?>