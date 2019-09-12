<?php
error_reporting(0);
session_start();





	if($_SESSION['adminuser']!="valid") 

	{
       header("location: ../user_login.php");
   }

   else
   {

require "adminlogo.php";



 if (isset($_POST['submit'])) 
	   { 
                 

	   	$pname=ltrim($_POST['pname']);
	   	

	   	if(strlen($pname)==0){
	   		$error_msg['pname'] = "Product Name can't be empty";
	   	}
	   	else{
	            	 $con=mysqli_connect("localhost","root","","test");
				if(!$con)
				{
					die("Connection Error: ".mysqli_connect_error()."<br/>");
				}

				$str="SELECT * from pro_duct WHERE  name='$pname'";

				
	            $result=mysqli_query($con,$str);
	            if(mysqli_num_rows($result)==0)
	               {
	               	$error_msg['pname']="No product available now !!";

	               }


	            }





        if(!$error_msg)
	   {
		   //database connection
	   
	         	$con=mysqli_connect("localhost","root","","test");
				if(!$con)
				{
					die("Connection Error: ".mysqli_connect_error()."connection error <br/>");
				}

				$pname=$_POST['pname'];

				$sql= "DELETE  FROM pro_duct WHERE name='$pname'";
				
				if( mysqli_query($con,$sql)){
          echo "Successfully deleted Product";
      }
      else{
      	echo "failed";
      }
				
			
            }
            mysqli_close($con);	

        
    }

	  

	


 ?>




<html>
<head>
	<title>Product Details</title>
</head>
<body bgcolor="#708090" >
	
   <h2 align="center">Product Name</h2>

<form action="<?= htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data">
	<table align="center">

		<a href="availableproduct.php">Back</a>
		<!-- creat Firtname colum  -->
		<tr class="row">
			<td class="label"><label for="pname">Product Name</label></td><br/>
			<td><input type="text" name="pname" id="pname" />

				<?php
				if (isset($error_msg['pname'])) 
				{
					echo $error_msg['pname'];
				}
				?>

			</td>
		</tr>

       <tr>
       	<td colspan="2"><input type="submit" name="submit" value="Delete"/></td>
       	
       	<td></td>
       	
       </tr>
      
			
	
	</table>

	
</form>

</body>
</html>


<?php 


} ?>