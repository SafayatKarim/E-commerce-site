
<?php


$fname=$_SESSION['firstname'];
$lname=$_SESSION['lname'];

if($_SESSION['user']!="valid" ) 

	{
       header("location:user_login.php");
   }

   else
   {


  ?>



<html>
	<head>
	
	
	</head>
		<body   bgcolor="#ADD8E6" >

	
			
		<form>
		<table>

				<center>
					<h1>Welcome <?php echo $fname."  ".$lname ;  ?></h1>
					</center>

				
				</table>
		</form>
	
	</body>

</html>

<?php } ?>