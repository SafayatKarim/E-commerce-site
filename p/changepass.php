<?php 
error_reporting(0);
 ?>

 <script type="text/javascript">
  //change password home page

        function validation(){

      var np = document.getElementById('npass').value.trim();
      var cp= document.getElementById('cpass').value.trim();
      
    


      if(np.length == 0){
        document.getElementById('npasswords').innerHTML =" *Required";
        return false;
      }
      if(np.length < 5) {
        document.getElementById('npasswords').innerHTML =" *more length required";
        return false; 
      }


      if(np!=cp){
        document.getElementById('cpasswords').innerHTML =" ** Password does not match the confirm password";
        return false;
      }

      
      return true;
      
    }

  </script>
   
<?php

if ($_SERVER['REQUEST_METHOD']=="POST") {

  

   $email=$_POST['email'];
   //$lname=$_POST['email']
   $password=$_POST['opass'];
  
             
         $con=mysqli_connect("localhost","root","","test");
        if(!$con)
        {
          die("Connection Error: ".mysqli_connect_error()."<br/>");
        }

        $sql="SELECT * FROM registrationtable WHERE email='$email' ";
              $result=mysqli_query($con,$sql);
              if(mysqli_num_rows($result)>0)
                 {
                  

                 $password=$_POST['opass'];
               
                 $row = $result->fetch_assoc();
                 $matchpass=$row['password'];
                if($password!=$matchpass){
                  $error_msg['notify']="Wrong old password";

                }



  
          else if(!$error_msg){

     $con=mysqli_connect("localhost","root","","test");
        if(!$con)
        {
          die("Connection Error: ".mysqli_connect_error()."<br/>");
        }


        $npass=$_POST['npass'];

        //update values of empInfo table
          $data="UPDATE registrationtable SET password='$npass' WHERE email='$email'";
          mysqli_query($con,$data);
          echo "Successfully password change ";

        }
        
      mysqli_close($con); 

      
  }

  else
  {
    $error_msg['notify']="Wrong email typed";
  }
  

}


?>


<!DOCTYPE html>
<html lang="en">
<head>

  <link rel="stylesheet"  href="style.css">
    
</head>
<body   bgcolor="#708090">
  <a href="home.php"><h1 align="center">Biponi Bitan</h1> </a>
  <div id="wrapper"> 

    
  <div class="container"><br>
    
    <div class="col-lg-6 m-auto d-block">
      
      <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']);?>"   onsubmit="return validation()" class="bg-light" method="POST">


        <div class="form-group">
          <label > <h2>Change Password </h2>  </label>
       
        </div>
        
       

        

         <div class="form-group">
          <label class="font-weight-bold">  </label>
          <input type="text" name="email" class="form-control" id="emails" autocomplete="off" placeholder="@Email address">
           <span id="emailids" class="text-danger font-weight-bold" style="color:blue"> </span> 
        
        </div>
  
      <div class="form-group">
          <label class="font-weight-bold">  </label>
          <input type="text" name="opass" class="form-control" id="opass" autocomplete="off" placeholder="@Old Password">
          <span id="err_pass" class="text-danger font-weight-bold" style="color:blue"> </span>
        </div>
         

         <div class="form-group">
          <label class="font-weight-bold">  </label>
          <input type="password" name="npass" class="form-control" id="npass" autocomplete="off" placeholder="@New Password">
          <span id="npasswords" class="text-danger font-weight-bold" style="color:blue"> </span>
        </div>
         <?php
        if (isset($error_msg['np'])) 
        {
          echo $error_msg['np'];
        }
        ?>
        

        <div class="form-group">
          <label class="font-weight-bold">  </label>
          <input type="password" name="cpass" class="form-control" id="cpass" autocomplete="off" placeholder="@Confirm Password">
          <span id="cpasswords" class="text-danger font-weight-bold" style="color:blue"> </span>
        </div>
         <?php
        if (isset($error_msg['cp'])) 
        {
          echo $error_msg['cp'];
        }
        ?>


        <?php
        if (isset($error_msg['notify'])) 
        {
          echo $error_msg['notify'];
        }
        ?>

       

        <input type="submit" name="submit" value="submit" class="btn btn-success"   autocomplete="off">


      </form><br><br>


    </div>
  </div>
</div>
</body>

     <!--class="btn btn-success"   Defination of all validation by java script  -->


</body>
</html>