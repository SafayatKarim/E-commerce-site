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
	   	$qn=ltrim($_POST['quan']);
	   	$pr=ltrim($_POST['pr']);
	   	$cat=($_POST['cat']);
	   	$brand=($_POST['brand']);

	   	// all inputs validation

	   	if(strlen($pname)==0){
	   		$error_msg['pname'] = "Product Name can't be empty";
	   	}
	   	else{
	            	 $con=mysqli_connect("localhost","root","","test");
				if(!$con)
				{
					die("Connection Error: ".mysqli_connect_error()."<br/>");
				}

				$sql="SELECT * FROM pro_duct WHERE name='$pname' ";
	            $result=mysqli_query($con,$sql);
	            if(mysqli_num_rows($result)==0)
	               {
	               	$error_msg['pname']="No product available now !!";

	               }


	            }

	   	 if (!is_numeric($qn)){

            $error_msg['quan'] = "Quantity must be numaric";

	   } 
	    if (!is_numeric($pr)){

            $error_msg['pr'] = "Price must be numaric";

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
				$quan=$_POST['quan'];
				$pr=$_POST['pr'];
				$sp=$_POST['sp'];
			
				$dsc=$_POST['dsc'];
				

      
				$sql="UPDATE pro_duct SET details='$sp' , price='$pr', discount='$dsc',quantity='$quan' where name='$pname'";
				
				 mysqli_query($con,$sql);
          echo "Successfully upadate data ";
				
			
            }
            mysqli_close($con);	

        
    }

	  

	


 ?>




<html>
<head>
	<title>Product Details</title>
</head>
<body bgcolor="#708090" >
	
   <h2 align="center">Product Details</h2>

<form action="<?= htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data">
	<table align="center">
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

		<tr class="row">
			<td class="label"></td>
		</tr>
		<tr class="row">
			<td class="label"></td>
		</tr>

		<!-- creat lastname colum  -->

		<tr class="row">
			<td class="label"><label for="sp">Spacification</label></td><br/>
			<td> <textarea rows="4" cols="20" name="sp" id="sp" /> </textarea>

			</td>
		</tr>

		<tr class="row">
			<td class="label"></td>
		</tr>
		<tr class="row">
			<td class="label"></td>
		</tr>

		<!-- create email colum  -->

        <tr class="row">
			<td class="label"><label for="quantity">Quantity</label></td>
			<td><input type="text" name="quan" id="quan" />
              <?php
				if (isset($error_msg['quan'])) 
				{
					echo $error_msg['quan'];
				}
				?>
			</td>
		</tr>

		<tr class="row">
			<td class="label"></td>
		</tr>
		<tr class="row">
			<td class="label"></td>
		</tr>


		<!-- create phone colum  -->

        <tr class="row">
			<td class="label"><label for="pr">Price </label></td>
			<td><input type="text" name="pr" id="pr" />
            
            <?php
				if (isset($error_msg['pr'])) 
				{
					echo $error_msg['pr'];
				}
				?>

			</td>
		</tr>
		<tr class="row">
			<td class="label"></td>
		</tr>
		<tr class="row">
			<td class="label"></td>
		</tr> 
         
         




         <tr class="row">
			<td class="label"></td>
		</tr>
		<tr class="row">
			<td class="label"></td>
		</tr>


		<!-- Insert Image of product  -->
		

		 <tr class="row">
			<td class="label"></td>
		</tr>
		<tr class="row">
			<td class="label"></td>
		</tr> 


		
		<!-- create confirm password colum  -->
		
		<tr class="row">
			<td class="label"><label for="dsc">Discount</label></td><br/>
			<td><input type="text" name="dsc" id="dsc" />

				

			</td>
		</tr>

		 <tr class="row">
			<td class="label"></td>
		</tr>
		<tr class="row">
			<td class="label"></td>
		</tr> 

		

       <tr>
       	<td colspan="2"><input type="submit" name="submit" value="update"/></td>
       	
       	<td></td>
       	
       </tr>
      
			
	
	</table>

	
</form>

</body>
</html>


<?php 


} ?>