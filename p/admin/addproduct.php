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
//create picture directory
$target_dir = "uploads/";


 if (isset($_POST['submit'])) 
	   { 
                 //all short of validation 
				 $target_dir = "uploads/";
				$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
               
               //image validation

				
				      	$check="";
                              try{
                              $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                          }
                             catch(Exception $e){
                              	$error_msg['pc'] = "Select a image file";
		
                              }
							  if($check !== false)
							               {
										        $uploadOk = 1;
										    } 
								else     
								            {
										        $error_msg['pc']= "Your uploaded file is not an image.";
										        $uploadOk = 0;
										    }
					  

				// if (file_exists($target_file)) {
										 //   echo "Sorry, file already exists.";
										    //$uploadOk = 0;
										//}

									 if ($_FILES["fileToUpload"]["size"] > 500000) {
										     $error_msg['pc']= "Sorry, your file is too large.";
										    $uploadOk = 0;
										}


				 if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
										&& $imageFileType != "gif" )
										 {
										     $error_msg['pc']= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
										    $uploadOk = 0;
										 }
                  if ($uploadOk == 0) {
										    $error_msg['pc']= "Sorry, your file was not uploaded.";

										} 
  //assign the input  into php variable 

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
	            if(mysqli_num_rows($result)>0)
	               {
	               	$error_msg['pname']="It already exit .. You can update it !!";

	               }


	            }

	   	 if (!is_numeric($qn)){

            $error_msg['quan'] = "Quantity must be numaric";

	   } 
	    if (!is_numeric($pr)){

            $error_msg['pr'] = "Price must be numaric";

	   } 
	    if ($cat=="NULL"){
	   	$error_msg['cat'] = "Please select product category";

	   }
	    if ($brand=="NULL"){
	   	$error_msg['brand'] = "Please select product Brand";

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
				$cat=$_POST['cat'];
				$brand=$_POST['brand'];
				$dsc=$_POST['dsc'];
				//product add query
				//$sql="INSERT INTO pro_duct (name,details,quantity,price,type,brand,discount) VALUES('$pname','$sp','$quan','$pr','$cat','$brand',$dsc)";

            $filedir="uploads/".basename( $_FILES["fileToUpload"]["name"]);
			$filename=basename( $_FILES["fileToUpload"]["name"]);
			//image upload query
				//$sqlimg="INSERT INTO addimage(name,picture,picture_dir) VALUES ('$pname','$filename','$filedir')";
				$sql="INSERT INTO pro_duct (name,details,quantity,price,type,brand,discount,picture,picture_dir) VALUES('$pname','$sp','$quan','$pr','$cat','$brand',$dsc,'$filename','$filedir')";
				$target_dir = "uploads/";
				 $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
							
							if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file) && mysqli_query($con, $sql)) {
										        echo "Your file: <b>". basename( $_FILES["fileToUpload"]["name"]). "</b> has been uploaded and Successfully added product. </br>";
										        
										    } else {
										        echo "Sorry, there was an error uploading your file &".mysqli_error($con);
										    }
				
				
			mysqli_close($con);	
            }

        
    }

	  

	


 ?>




<html>
<head>
	<!-- create add product home page -->
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
         
         <!-- create type colum  -->
        
          <!-- applying ajax and js to implement dynamic brand selesction -->

        <tr class="row">
        	<td class="label"><label for="cat">Category</label></td>
        	<td>
        		<select class="text" name="cat" id="cat" onchange="loadBrand()">
        			<option value="NULL">--*Select Category--</option>
        			<option value="mobile">Mobile</option>
        			
        			<option value="computer">Computer</option>
        			<option value="electronics">Electornics</option>
        			

        		</select>
        		 <?php
				if (isset($error_msg['cat'])) 
				{
					echo $error_msg['cat'];
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

		<!-- create password colum  -->

		 <tr class="row">
        	<td class="label"><label for="brand">Brand</label></td>
        	<td>
        		<select class="text"  name="brand" id="brand">
        			<option value="NULL">--*Select Brand--</option>
        			

        		</select>
        		 <?php
				if (isset($error_msg['brand'])) 
				{
					echo $error_msg['brand'];
				}
				?>
        	</td>
        	
        </tr>


        <!-- java script implementation for brand selection -->

        <script >
        	function clearCombo(){
                
                let len=brand.length;
                for (let index = 0; index <len ; index++) {
                    brand.remove(brand[index]);

                }
            }


             function loadBrand(){
                let cat=document.getElementById('cat');
                let brand=document.getElementById('brand');
                clearCombo();
                let ajax=new XMLHttpRequest();
                ajax.onreadystatechange=function(){
                    if(this.readyState==4 && this.status==200)
                    {
                        let areaData=JSON.parse(ajax.responseText);
                        for (let index = 0; index < areaData.length; index++) {
                            let option=document.createElement("option");
                            if(cat.value=="mobile"){
                                option.text=areaData[index].brand;
                                
                            }
                            else if(cat.value=="computer"){
                                option.text=areaData[index].brand;
                            }
                            

                            

                             else if(cat.value=="electronics"){
                                option.text=areaData[index].brand;
                            }
                            brand.add(option);
                            
                            
                            
                        }
                        
                    }
                }
                if(cat.value=="mobile"){
                    ajax.open("GET","mobilejn.json",true);  //import mobile JSON File
                    ajax.send();
                }
                else if(cat.value=="computer"){
                    ajax.open("GET","computerjn.json",true);  ////import computer JSON File
                    ajax.send();
                }

                else if(cat.value=="electronics"){
                    ajax.open("GET","electronicsjn.json",true);  ////import electronics  JSON File
                    ajax.send();
                }
                else{}
               
            }




        </script>







         <tr class="row">
			<td class="label"></td>
		</tr>
		<tr class="row">
			<td class="label"></td>
		</tr>


		<!-- Insert Image of product  -->
		
		<tr class="row">
			<td class="label"><label for="fileToUpload">Image</label></td><br/>
			<td><input type="file" name="fileToUpload" id="fileToUpload" />
				<?php
				if (isset($error_msg['pc'])) 
				{
					echo $error_msg['pc'];
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
       	<td colspan="2"><input type="submit" name="submit" value="Add Product"/></td>
       	
       	<td></td>
       	
       </tr>
      
			
	
	</table>

	
</form>

</body>
</html>


<?php 


} ?>