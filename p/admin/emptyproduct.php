<?php
error_reporting(0);
session_start();


require "adminlogo.php";

	if($_SESSION['adminuser']!="valid") 

	{
       header("location: ../user_login.php");
   }

   else
   {


//require "adminhome.php";
$con=mysqli_connect("localhost","root","","test");
$type="customers";
$str="SELECT name,quantity,type,brand from pro_duct WHERE quantity=='0'";
$res=mysqli_query($con,$str);

$list="";
$rows = array();
        while($row = mysqli_fetch_array($res))
            $rows[] = $row;

           if(mysqli_num_rows($res)>0){

foreach($rows as $row )
        {


				$list.="<br/>".$row["name"]."<br/>".$row["quantity"]."<br/>".$row["type"]."<br/>".$row["brand"];
				$pro_name=$row["name"];
				$pro_image=$row["quantity"];
				$pro_sellprice=$row["type"];
				$pro_id=$row["brand"];
				//$pro_type=$row["type"];
				//$pro_brand=$row["brand"];
				//$pro_discount=$row["discount"];
				//$pro_details=$row["details"];


				   echo "Product name :". $pro_name .'&nbsp;&nbsp;&nbsp; '."Quantity :". $pro_image. '&nbsp;&nbsp;&nbsp;'.  "Type :" . $pro_sellprice. ' &nbsp;&nbsp;&nbsp; '."Brand :". $pro_id ."</br>" ."</br>" ."</br>";
		                    


			}
    }
    else {


      echo '<span style="color:green;text-align:center;">  <h1>There is no Empty Product !!! </h1> </span>';

     echo ' <span style="padding-right:10px; padding-top: 10px  align:center;">

    <img class="manImg" src="angry-512.png"></img>

    </span>

    ';
    }


  ?>

  <!DOCTYPE html>
  <html>
  <head>
  	<title></title>
  </head>
  <body bgcolor="#708090">
  
  </body>
  </html>

  <?php


  } 

   ?>


