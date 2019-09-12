<?php
error_reporting(0);
session_start();

//varification of admin user


	if($_SESSION['adminuser']!="valid") 

	{
       header("location: ../user_login.php");
   }

   else
   {
         
	  if (isset($_POST['submit'])) 
	   {       
		        
			   	if($_POST['fname'] == "")
			   	{
			   		
			       $error_msg['fname'] = "first Name can't be empty";

			       
			   	}
		        else{}

		        	

		        $fname=ltrim($_POST['fname']);
		        $fname2=ltrim($_POST['fname']);

			   	if(strlen($fname)==0)
			   	{
			   		
			       $error_msg['fname'] = "first Name can't be empty";

			       
			   	}
		        else{}

		        if(strlen($fname2)==0)
			   	{
			   		
			       $error_msg['fname'] = "first Name can't be empty";

			       
			   	}
		        else{}

		        	 if(strlen($fname2)<2)
			   	{
			   		
			       $error_msg['fname'] = "must be least 2 characters";

			       
			   	}
		        else{}


		        if(!preg_match("/^[a-zA-Z -]*$/",$fname))
		        {
		        	
		        	$error_msg['fname']="Only letters are allowed";
		        	
		        	 
		        }
		        else{}



		        	 	if($_POST['lname'] == "")
			   	{
			   		
			       $error_msg['flname'] = "last Name is require";

			       
			   	}
		        else{}

		        //$name=$_POST['lname'];

		    $name=ltrim($_POST['lname']);
		     $name2=ltrim($_POST['lname']);

			   	if(strlen($name)==0)
			   	{
			   		
			       $error_msg['lname'] = "last Name can't be empty";

			       
			   	}
		        else{}

		        	 	if(strlen($name2)==0)
			   	{
			   		
			       $error_msg['lname'] = "last Name can't be empty";

			       
			   	}
		        else{}

		        	 if(strlen($name2)<2)
			   	{
			   		
			       $error_msg['lname'] = "must be least 2 characters";

			       
			   	}
		        else{}


		        if(!preg_match("/^[a-zA-Z -]*$/",$name))
		        {
		        	
		        	$error_msg['lname']="Only letters are allowed";
		        	
		        	 
		        }
		        else{}


		        $phone=$_POST['phone'];
		        if($_POST['phone'] == "")
			   	{
			   		
			       $error_msg['phone'] = "Phone Num is require";
			       
			       
			   	}
			    else if (!is_numeric($phone)) 
			   	{
			   		
			   		
			   		$error_msg['phone']="Only Number input";
			   		
			   	}
			   	else if(strlen($phone) !=11)
			   	{
			   		
			   		
			   		$error_msg['phone']="Only input 11 digits number";
			   		
			   	}
			   
		        

	             $pass=trim($_POST['pass']);
	             $pass2=trim($_POST['pass2']);
	              if(empty($pass))
	            {
	            	
	            	
	            	$error_msg['pass']="Password is require";
	            	
	            }

	             if(empty($pass2))
	            {
	            	
	            	$error_msg['pass2']="Confirm Password is require";
	            	
	            }



	            if ($pass!=$pass2) 
	            {
	            	
	            	$error_msg['pass3']="You need to give password and Confirm Password both are same";
	            	
	            }
	            else if(strlen($pass)<5) 
	            {
	            
	            	$error_msg['pass4']="Password at least 5 Length";
	            	
	            }
	             
	            $email=$_POST['email'];
	            if(!filter_var($email,FILTER_VALIDATE_EMAIL))
	            {
	            	
	            	$error_msg['email']="Invalid email number";
	            
	            } 
	            else{
	            	 $con=mysqli_connect("localhost","root","","test");
				if(!$con)
				{
					die("Connection Error: ".mysqli_connect_error()."<br/>");
				}

				$sql="SELECT * FROM registrationtable WHERE email='$email' ";
	            $result=mysqli_query($con,$sql);
	            if(mysqli_num_rows($result)>0)
	               {
	               	$error_msg['email']="Alread used this email";

	               }


	            }

			       
          
	   if(!$error_msg)
	   {
	   	//connect to database
			     $con=mysqli_connect("localhost","root","","test");
				if(!$con)
				{
					die("Connection Error: ".mysqli_connect_error()."<br/>");
				}
				//Row Insert
				$fname=$_POST['fname'];
				$lname=$_POST['lname'];
				$phoneNumber=$_POST['phone'];
				

				$password=$_POST['pass'];

				$email=$_POST['email'];
				$status=2;
				$type="admin";

				$sql="INSERT INTO registrationtable (firstname,lastname,email,phone,password,type,status) VALUES('$fname','$lname','$email','$phoneNumber','$password','$type',$status)";
				if(mysqli_query($con,$sql))
				{
					echo "Successfully admin added !!!";
				}
				else
				{
					echo "Error in inserting: ".mysqli_error($con);
				}
			mysqli_close($con);	

		}	

	           
   }


 
   
  

?>



<!DOCTYPE html>
<html>
<!-- create addadmin registration page -->
<head>
	<title>Registration</title>
</head>
<body style="background-color:palegreen;">
	<a href="adminhome.php" align="center">My Home Page</a>
	<h1 align="center">Biponi Bitan</h1>
   <h2 align="center" >Admin Registration</h2>


<form action="<?= htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data">
	<table align="center">
		<!-- creat Firtname colum  -->
		<tr class="row">
			<td class="label"><label for="fname">First Name</label></td><br/>
			<td><input type="text" name="fname" id="fname" placeholder="First Name"/>

				<?php
				if (isset($error_msg['fname'])) 
				{
					echo $error_msg['fname'];
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
			<td class="label"><label for="lname">Last Name</label></td><br/>
			<td><input type="text" name="lname" id="lname" placeholder="Last Name"/>

				<?php
				if (isset($error_msg['lname'])) 
				{
					echo $error_msg['lname'] ;
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

		<!-- create email colum  -->

        <tr class="row">
			<td class="label"><label for="email">Email</label></td>
			<td><input type="text" name="email" id="email" placeholder="*@gmail.com"/>
              <?php
				if (isset($error_msg['email'])) 
				{
					echo $error_msg['email'];
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
			<td class="label"><label for="phone">Phone Number</label></td>
			<td><input type="text" name="phone" id="phone" placeholder="@01XXXXXXXXX)"/>
            
            <?php
				if (isset($error_msg['phone'])) 
				{
					echo $error_msg['phone'];
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
         
         <!-- create type colum  -->
        

       <!-- <tr class="row">
        	<td class="label"><label for="type">Type</label></td>
        	<td>
        		<select class="text" name="type" id="type">
        			<option value="NULL">--*Select Type--</option>
        			<option value="customers">Customers</option>
        			
        			<option value="employee">Employee</option>

        		</select>
        		 <?php
				//if (isset($error_msg['type'])) 
				{
					//echo $error_msg['type'];
				}
				?>
        	</td>
        	
        </tr>
    -->

         <tr class="row">
			<td class="label"></td>
		</tr>
		<tr class="row">
			<td class="label"></td>
		</tr>

		<!-- create password colum  -->

		<tr class="row">
			<td class="label"><label for="pass">Password</label></td>
			<td><input type="text" name="pass" id="pass" placeholder="*Password"/>
             <?php
				if (isset($error_msg['pass'])) 
				{
					echo $error_msg['pass'];
				}
				/*else if (isset($error_msg['pass3'])) 
				{
					echo $error_msg['pass3'];
				}*/
				else if (isset($error_msg['pass4'])) 
				{
					echo $error_msg['pass4'];
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

		<!-- create confirm password colum  -->
		
		<tr class="row">
			<td class="label"><label for="pass2">Confirm Password</label></td>
			<td><input type="password" name="pass2" id="pass2" placeholder="*Confirm Password"/>
             
             <?php
				if (isset($error_msg['pass2'])) 
				{
					echo $error_msg['pass2'];
				}
				else if (isset($error_msg['pass3'])) 
				{
					echo $error_msg['pass3'];
				}
				 else if (isset($error_msg['pass4'])) 
				{
					echo $error_msg['pass4'];
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
		

       <tr>
       	<td colspan="2"><input type="submit" name="submit" value="SUBMIT"/>
       	
       	</td>
       	
       	<td></td>
       	<tr>
       		<td></td>
       	</tr>
       </tr>
       
			
	
	</table>


	
</form>

</body>
</html>

<?php 

} ?>
