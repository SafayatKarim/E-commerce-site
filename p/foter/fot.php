<?php 
error_reporting(0);
if (isset($_POST['submit'])) {
	$name=trim($_POST['name']);
	   	$gm=trim($_POST['email']);
	   	$cmt=trim($_POST['comment']);
	# code...


               if(strlen($name)==0){
	   		             $error_msg['name'] = "Name can't be empty";
	          	}

		        if(!preg_match("/^[a-zA-Z -]*$/",$name))
		        {
		        	
		        	$error_msg['name']="Only letters are allowed";
		        	
		        	 
		        }
		        else{}

		        		 if(strlen($name)<2)
			   	{
			   		
			       $error_msg['fname'] = "must be least 2 characters";

			       
			   	}

			   	$email=$_POST['email'];
	            if(!filter_var($email,FILTER_VALIDATE_EMAIL))
	            {
	            	
	            	$error_msg['email']="Invalid email number";
	            
	            } 

	            if(strlen($cmt)==0){

	            	$error_msg['cmt']="Must input comment";
	            }

	            if(!$error_msg){

                    $con=mysqli_connect("localhost","root","","test");
				if(!$con)
				{
					die("Connection Error: ".mysqli_connect_error()."<br/>");
				}
				//Row Insert
				$name=$_POST['name'];
				$gmail=$_POST['email'];
				$cmt=$_POST['comment'];

				$sql="INSERT INTO feedback (name,gmail,feedback) VALUES('$name','$email','$cmt')";

				if(mysqli_query($con,$sql))
				{
					$error_msg['cmt']="Thank you for your kind information";
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
	<head>
	<style>
	
		*{
			margin:0;    
			padding:0;
			font-family:Century Cothic;
			
		}
		header
		{
			background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(photo/1.jpg);
			height:200vh;
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
	</style>
	</head >
	<body bgcolor="#E6E6FA">
		<form  action="<?= htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data">





	 <table align="center">

	 	<h2>FeedBack</h2>


   <tr class="row">
			<td class="label"><label for="name"></label></td>
			<td><input type="text" name="name" id="name" placeholder="*@name"/>
              <?php
				if (isset($error_msg['name'])) 
				{
					echo $error_msg['name'];
				}
				?>
			</td>
		</tr>

		<tr>
			<td>  <?php
				if (isset($msg['info'])) 
				{
					echo $msg['info'];
				}
				?>  </td>
		</tr>

		<tr>
			<td>
				
			</td>
		</tr>
		<tr>
			<td></td>
		</tr>

		<tr>
			<td>
				
			</td>
		</tr>


		 <tr class="row">
			<td class="label"><label for="email"></label></td>
			<td><input type="text" name="email" id="email" placeholder="*@gmail.com"/>
              <?php
				if (isset($error_msg['email'])) 
				{
					echo $error_msg['email'];
				}
				?>
			</td>
		</tr>

		<tr>
			<td></td>
		</tr>

		<tr>
			<td>
				
			</td>
		</tr>
		<tr>
			<td></td>
		</tr>

		<tr>
			<td>
				
			</td>
		</tr>

		 <tr class="row">
			<td class="label"><label for="comment"></label></td>
			<td><textarea rows="4" cols="22" name="comment" id="comment"  placeholder="@Your comment" /> </textarea>
              <?php
				if (isset($error_msg['cmt'])) 
				{
					echo $error_msg['cmt'];
				}
				?>
			</td>
		</tr>

		<tr>
			
		</tr>
		<tr>
			
		</tr>
		<tr>
			
		</tr>

		 <tr>
       	<td colspan="2"><input type="submit" name="submit" value="Comment"/></td>
       	
       	<td></td>
       	
       </tr>
      



		</table>

		<table align="right">
			<tr>
				<th weight="10" >GET TO KNOW US</th>
				<th>LET US HELP YOU</th>
				<th>GET IN TOUCH WITH US</th>
				
			</tr>
			
			<tr>
				<td ><a class="button" href="#">About us</td>
				<td><a class="button" href="#">Your Account</td>
				<td><a class="button" href="#">Contact Us</td>
				<td rowspan="3"> House 10, Road 12<br/>
						Block F, Niketan, Gulshan 1,<br/>
								Dhaka - 1212, Bangladesh<br/>

 								+8809283736645</td>
			</tr>
			
			<tr>
				<td ><a class="button" href="#">Privacy Policy</td>
				<td> <a class="button" href="magic.php">Magic</td>
				<td><a class="button" href="#">Biponi Bitan Blog</td>
				
			</tr>
			
			
			<tr>
				<td align="center"><a class="button" href="#">Cookie Policy</td>
				<td align="center"><a class="button" href="#">EMI</td>
				<td align="center"><a class="button" href="#">Biponi Bitan Club</td>
				
			</tr>



			
			
		



		


			
			<tr colspan="3" align="right" >
				<td align="center">
				FOLLOW US 
		
				
		
				 <a href="#" ><img  src="fblogo.jpg" style="width:34px;height:34px;border:0;" ></a>
				<a href="#"><img src="twitter.jpg" style="width:34px;height:34px;border:0;"  ></a>
				<a href="#"><img src="you.png"  style="width:34px;height:34px;border:0;"></a>
				<a href="#"><img src="insta.png"  style="width:52px;height:52px;border:0;"></a>
				
			</tr>

			</table>

			</form>



		
	</body>
</html>
		