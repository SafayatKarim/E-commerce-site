

<script  >
  
function getData(str)
{
	//retrive data form database

    if(str.length==0){
        
        document.getElementById("sug").innerHTML="";
    }
    else{
        
        var xHttp=new XMLHttpRequest();
        xHttp.onreadystatechange=function()
        {
            if(this.readyState==4 && this.status==200)
            {
                document.getElementById("sug").innerHTML=this.responseText;
                //window.location.replace("search.php?data="+this.responseText);
                
            }
            
        };
        
        xHttp.open("GET","data.php?q="+str,true);
        xHttp.send();
    }
    
}



function getDataBrand(str)
{

    if( str=="abc"){
        
        document.getElementById("brand").innerHTML="";
    }
    else{
        
        var xHttp=new XMLHttpRequest();
        xHttp.onreadystatechange=function()
        {
            if(this.readyState==4 && this.status==200)
            {
                document.getElementById("brand").innerHTML=this.responseText;
                //window.location.replace("search.php?data="+this.responseText);
                
            }
            
        };

        
        
        xHttp.open("GET","data.php?q="+str,true);
        xHttp.send();
    }
    
}

</script>
<html>
<!-- create home page -->
	<head>
		<title>Homepage</title>

	
	</head>
		<body  bgcolor="#E6E6FA" >
			
			
			
		<form>
			<table >

			   <h1 align="middle">Welcome to Biponi Bitan<h1>


			    <div class='panel-body'>
	
					<img src="logo.png.png" width="200" height="150" align="right" > 
				</div>



			<div class="main">
			<div class="logo">

				<tr>
          	       <td>
          	       	<!-- send data to retrive data from database --> 
          		<select onclick ="getDataBrand(this.value)">

                                          <option value="abc">Mobile</option>
                                          <option value="Samsung">Samsung</option>
                                          <option value="oneplus">One plus</option>
                                          <option value="Iphone">Iphone</option>
                                          <option value="Nokia">Nokia</option>

                                          </select>
          		
          	</td>
          	    <td>
          		<select onclick ="getDataBrand(this.value)">

                                          <option value="abc">Computer</option>
                                          <option value="hp">HP</option>
                                          <option value="dell">Dell</option>
                                          <option value="apple">Apple</option>
                                          <option value="asus">asus</option>

                                          </select>
          		
          	</td>

          	  <td>
          		<select onclick ="getDataBrand(this.value)">

                                          <option value="abc">Electronic</option>
                                          <option value="tv">TV</option>
                                          <option value="friedge">Fridge</option>
                                          <option value="ac">AC</option>
                                         

                                          </select>
          		
          	</td>


					<td align="center" height="150" width="800">  
						<div   >
							
						<input type="text"  style="height:40px;font-size:25pt;"  onkeyup="getData(this.value)"> 
						</div>
						</td>
						<td><h3> Search </h3>  </td>

          </tr>

          <tr>
					<td>
						<div id ="brand"></div>
					</td>
					</tr>

				<tr>
					<td>
						<div id ="sug"></div>
					</td>
					</tr>
					<!-- link create -->

				<ul>
					<li><a href="home.php"> Home </a></li>
					<li><a href="userRegistration.php"> SigUp</a></li>
					<li><a href="user_login.php"> LogIn </a></li>
					<li><a href="changepass.php"> Change Password </a></li>
					
				</ul>
			</div>
			</div>
			
					

		  </table>

	
		</form>	
	
	</body>

</html>


<?php

require 'homedata.php';
include_once 'foter/fot.php';
?>