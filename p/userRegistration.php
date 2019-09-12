<?php 
error_reporting(0);
 ?>

 <script type="text/javascript">
  //vlidation by javascript

        function validation(){

      var user = document.getElementById('user').value.trim();
      var lastname = document.getElementById('lastname').value.trim();
      var pass = document.getElementById('pass').value.trim();
      var confirmpass = document.getElementById('conpass').value.trim();
      var mobileNumber = document.getElementById('mobileNumber').value.trim();
      var emails = document.getElementById('emails').value.trim();
      if(user.length == 0){
        document.getElementById('username').innerHTML =" *Required*";
        return false;
      }
      if(user.length < 2) {
        document.getElementById('username').innerHTML ="*more length required ";
        return false; 
      }
      if(!isNaN(user)){
        document.getElementById('username').innerHTML =" ** only characters are allowed";
        return false;
      }

      if(lastname.length ==0){
        document.getElementById('last').innerHTML =" *Required*";
        return false;
      }
      if(lastname.length < 2) {
        document.getElementById('last').innerHTML ="*more length required ";
        return false; 
      }
      if(!isNaN(lastname)){
        document.getElementById('last').innerHTML =" ** only characters are allowed";
        return false;
      }

      if(pass.length == 0){
        document.getElementById('passwords').innerHTML =" *Required";
        return false;
      }
      if(pass.length <= 5) {
        document.getElementById('passwords').innerHTML =" *more length required";
        return false; 
      }


      if(pass!=confirmpass){
        document.getElementById('confrmpass').innerHTML =" ** Password does not match the confirm password";
        return false;
      }



      if(confirmpass.length == 0){
        document.getElementById('confrmpass').innerHTML =" ** Please fill the confirmpassword field";
        return false;
      }


      if(mobileNumber.length == 0){
        document.getElementById('mobileno').innerHTML =" *Required";
        return false;
      }
      if(isNaN(mobileNumber)){
        document.getElementById('mobileno').innerHTML =" * only numeric allow";
        return false;
      }
      if(mobileNumber.length!=11){
        document.getElementById('mobileno').innerHTML =" ** Mobile Number must be 11 digits only";
        return false;
      }

      if(emails.length == 0){
        document.getElementById('emailids').innerHTML =" *Required";
        return false;
      }
      if(emails.indexOf('@') <= 0 ){
        document.getElementById('emailids').innerHTML =" ** @ Invalid Position";
        return false;
      }

      
      return true;
      
    }

  </script>
   
<?php
//get data from html file

if ($_SERVER['REQUEST_METHOD']=="POST") {

  $ph=$_POST['mobile'];

  if($ph[0]!='0'|| $ph[2]=='0'||$ph[2]=='2'){
     $error_msg['mobileNo'] = "Choose valid phone number"; 

  }  
	

   $email=$_POST['email'];
   //$lname=$_POST['email']
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error_msg['email'] = "Invalid email format"; 
    }
             
         $con=mysqli_connect("localhost","root","","test");
        if(!$con)
        {
          die("Connection Error: ".mysqli_connect_error()."<br/>");
        }

        $sql="SELECT * FROM registrationtable WHERE email='$email' ";
              $result=mysqli_query($con,$sql);
              if(mysqli_num_rows($result)>0)
                 {
                  $error_msg['email']="already exist's  use another";

                 }


  
     if(!$error_msg){
           $con=mysqli_connect("localhost","root","","test");


        $fname=$_POST['user'];
        $lname=$_POST['lastname'];
        $phoneNumber=$_POST['mobile'];
        

        $password=$_POST['pass'];

        $email=$_POST['email'];
        $status=1;
        $type="customers";



     
       if(!$con)
        {
          die("Connection Error: ".mysqli_connect_error()."<br/>");
        }
        //Row Insert
        $fname=$_POST['user'];
        $lname=$_POST['lastname'];
        $phoneNumber=$_POST['mobile'];
        

        $password=$_POST['pass'];

        $email=$_POST['email'];
        $status=1;
        $type="customers";
        //insert data

        $sql="INSERT INTO registrationtable (firstname,lastname,email,phone,password,type,status)". " VALUES ('$fname','$lname','$email','$phoneNumber','$password','$type','$status')";
        if(mysqli_query($con,$sql))
        {
          header("Location:user_login.php");
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
<html lang="en">
<head>
  <!-- create registration page -->

  <link rel="stylesheet"  href="style.css">
    
</head>
<body   bgcolor="#708090">
  <a href="home.php"><h1 align="center">Biponi Bitan</h1> </a>
  <div id="wrapper"> 

    
  <div class="container"><br>
    
    <div class="col-lg-6 m-auto d-block">
      
      <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']);?>"   onsubmit="return validation()" class="bg-light" method="POST">


        <div class="form-group">
          <label > <h2> Sign Up Form </h2>  </label>
       
        </div>
        
        <div class="form-group">
          <label for="user" class="font-weight-bold">  </label>
          <input type="text" name="user" class="form-control" id="user" autocomplete="off" placeholder="@First Name" >
          <span id="username" class="text-danger font-weight-bold" style="color:blue"> </span>
        </div>

        <div class="form-group">
          <label for="user" class="font-weight-bold">  </label>
          <input type="text" name="lastname" class="form-control" id="lastname" autocomplete="off" placeholder="@Last Name" >
          <span id="last" class="text-danger font-weight-bold" style="color:blue"> </span>
        </div>

        
        

        <div class="form-group">
          <label class="font-weight-bold">  </label>
          <input type="password" name="pass" class="form-control" id="pass" autocomplete="off" placeholder="@Password">
          <span id="passwords" class="text-danger font-weight-bold" style="color:blue"> </span>
        </div>

        <div class="form-group">
          <label class="font-weight-bold"> </label>
          <input type="text" name="password" class="form-control" id="conpass" autocomplete="off" placeholder="@Confirm Password">
          <span id="confrmpass" class="text-danger font-weight-bold" style="color:blue"> </span>
        </div>

        

         <div class="form-group">
          <label class="font-weight-bold"> </label>
          <input type="text" name="mobile" class="form-control" id="mobileNumber" autocomplete="off" placeholder="@Mobile Number:">
          <span id="mobileno" class="text-danger font-weight-bold" style="color:blue"> </span>
           <?php
        if (isset($error_msg['mobileNo'])) 
        {
          echo $error_msg['mobileNo'];
        }
        ?>
        </div>

        <div class="form-group">
          <label class="font-weight-bold">  </label>
          <input type="text" name="email" class="form-control" id="emails" autocomplete="off" placeholder="@Email address">
           <span id="emailids" class="text-danger font-weight-bold" style="color:blue"> </span> 
          <?php
        if (isset($error_msg['email'])) 
        {
          echo $error_msg['email'];
        }
        ?>
        </div>

       
<!-- create submit method -->
        

        <input type="submit" name="submit" value="submit" class="btn btn-success"   autocomplete="off">


      </form><br><br>


    </div>
  </div>
</div>
</body>

     <!--class="btn btn-success"   Defination of all validation by java script  -->


</body>
</html>