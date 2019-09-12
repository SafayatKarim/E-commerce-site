

<body bgcolor="#708090">

<form>
<style>
  table {
   border-collapse: collapse;
   width: 100%;
   color: #00167a;
   font-family: monospace;
   font-size: 25px;
   text-align: left;
     } 
  th {
   background-color: #00167a;
   color: white;
    }
  tr:nth-child(even) {background-color: #858ac4}
 </style>

 <a href="adminhome.php" > <h2 align="center"> My Home Page</h2></a>
 <a href="../logout.php" > <h2 align="right"> Logout</h2></a>

<fieldset>
    <legend>
        <h2 ><b>Availabe Product</b> </h2>
        </legend>
    
<br/>
<table>
  <!-- available product home page -->
<td> <a href="updateproduct.php"> <h2>Update</h2></a> </td> 
 <td> <a href="deleteproduct.php"> <h2>Delete</h2></a></td> </table>


<table width="100%" cellspacing="0" border="1" cellpadding="3">
    <tr>
        <th align="left">Name</th>
        <th align="left">Quantity</th>
        <th align="center">Type </th>
        <th align="center">Brand</th>
       
    </tr>





<?php
error_reporting(0);
session_start();


//require "adminlogo.php";

	if($_SESSION['adminuser']!="valid") 

	{
       header("location: ../user_login.php");
   }

   else
   {


//require "adminhome.php";
$con=mysqli_connect("localhost","root","","test");
if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    } 


$str="SELECT name,quantity,type,brand from pro_duct WHERE quantity!='0'";


$result = $con->query($str);

if ($result -> num_rows > 0) {

 
   

    while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["name"]. "</td><td>" . $row["quantity"]. "</td><td>"  . $row["type"] . "</td><td>"
    . $row["brand"]. "</td>  </tr>";
    }
    echo "</table>";
    } else { echo "0 results"; }
    $conn->close();





         


  ?>

  </table>

    
   

</fieldset>
</form>
 </body>


  <?php


  } 

   ?>


