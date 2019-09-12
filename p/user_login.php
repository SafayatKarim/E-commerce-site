<?php
error_reporting(0);
session_start();





$hdr="";
 if (isset($_POST['submit']))
 {
 	

 	
 	$con=mysqli_connect("localhost","root","","test");
	if(!$con)
	{
		die("Connection Error: ".mysqli_connect_error()."<br/>");
	}
	//Retrieve Data

	$password=$_POST['password'];
	$email=$_POST['email'];
	$sql="SELECT * FROM registrationtable WHERE email='$email' AND password='$password'";
	$result=mysqli_query($con,$sql);	
	if(mysqli_num_rows($result)>0)
	{
		$row=mysqli_fetch_array($result);
		$_SESSION['firstname']=$row['firstname'];
		$_SESSION['lname']=$row['lastname'];
		$_SESSION['status']=$row['status'];
		$_SESSION['id']=$row['id'];
		if($_SESSION['status']==1){

			if(isset($_POST["remember_me"]))
						{
							setcookie("email",$_POST["email"],time()+3600);
							setcookie("password",$_POST["password"],time()+3600);
							$_SESSION['user']="valid";
							$_SESSION['user2']=$_POST["email"];
							
						}
			            $_SESSION['user']="valid";
			            $_SESSION['user2']=$_POST["email"];
			header("Location:rhome.php");



		}


		else if($_SESSION['status']==2)
		{
			if(isset($_POST["remember_me"]))
						{
							setcookie("email",$_POST["email"],time()+3600);
							setcookie("password",$_POST["password"],time()+3600);
							$_SESSION['adminuser']="valid";
							$_SESSION['adminuser2']=$_POST["email"];
							
						}
						$_SESSION['adminuser2']=$_POST["email"];

			            $_SESSION['adminuser']="valid";
			header("Location:admin/adminhome.php");			//header("Location:worker_home.php");
		}

		else if($_SESSION['status']==0)
		{
			header("Location:admin/adminhome.php");
			$_SESSION['adminuser']="valid";
			$_SESSION['adminuser2']=$_POST["email"];
			//header("Location:admin_home.php");
		}
		//header("Location:home.php");
	}
	else
	{
		$error_msg['unvalid']="You are not registered yet !!! please register!!";
		

	}

	
      mysqli_close($con);		
      


 } 

?>




<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
<style>
	.redtext {
        color: yellow;
}
</style>
</head>
<body bgcolor="#708090">
	<h1 align="center"><a href="home.php">Biponi Bitan </a></h1>
   <h2 align="center">Login Form</h2>
  <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
  <table align="center">
  	<tr class="row">
  		<td class="label"><?php echo $hdr; ?> <label for="Email"></label></td><br/>
  		<td><input type="text" name="email" value="<?php  echo $_COOKIE["email"] ?>" placeholder="@Email" />
  		
         
  		</td>
  	</tr>
  	 <tr>
    	<td></td>
    </tr>
  	<tr class="row">
  		
  		<td class="label"><label for="password"></label></td><br/>
  		<td><input type="password" name="password" value="<?php  echo $_COOKIE["password"] ?>" placeholder="@Password" />

  		
        

		</td>		
  		
  	</tr>
    
    <tr>
    	<td></td>
    </tr>
    <tr>
       	<td colspan="4">


       		<input type="checkbox" name="remember_me" value="" />Save password
       		



       		  <input type="submit" name="submit" value="Login"/>
       			

       			don't have an account ? <a href="userRegistration.php"><input type="button" name="register_btn" value="Register !!"/> </a>
       			<a href="delpass.php" class="redtext">  Delete save password</a>
       			</td>

       			








       	
       	<td>
       		<?php
				if (isset($error_msg['unvalid'])) 
				{
					echo $error_msg['unvalid'];
				}
			?>
					
				</td>


       	
       </tr>
       
       <tr>
       
       </tr>
    
    

  </table>
  
  </form>	
</body>
</html>

