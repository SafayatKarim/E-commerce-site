<script src="main.js"></script>

<?php
// show data for search option
$con=mysqli_connect("localhost","root","","test");
$str="SELECT id,name,details,price,type,brand,discount,picture_dir from pro_duct WHERE name or brand LIKE '".$_REQUEST["q"]."%';";

error_reporting(0);
$res=mysqli_query($con,$str);


$list="";
// for($i=0;$i<mysqli_num_rows($res);$i++)
	
// 	{
// 		//$row[$i]=mysqli_fetch_array($res);
 
    
		$rows = array();
        while($row = mysqli_fetch_array($res))
            $rows[] = $row;
         
     


        foreach($rows as $row )
        {


				$list.="<br/>".$row["name"]."<br/>".$row["price"];
				$pro_name=$row["name"];
				$pro_image=$row["picture_dir"];
				$pro_sellprice=$row["price"];
				$pro_id=$row["id"];
				$pro_type=$row["type"];
				$pro_brand=$row["brand"];
				$pro_discount=$row["discount"];
				$pro_details=$row["details"];




				
	// print out all of product details




                  echo "
		                          <div class='col-md-4'>
		                    <div class='panel panel-info proDuct'>
		                    <div class='panel-heading'>$pro_brand $pro_name</div>
		                   <div class='panel-heading'>$ Price: $pro_sellprice.00  <div>
		                     <button pid='$pro_id' style='float:left;' id='product' class ='btn btn-primary btn-xs ' >Review</button>
		                        
		                         <div class='panel-body'>
		                             <img src='$pro_image' style='width: 170px; height: 260px;' class='img img-responsive'/>
		                          </div>
		                         <div >


		                             <button pid='$pro_id' style='float:left;' id='product' class ='btn btn-primary btn-xs ' >AddToCart</button>
		                            <div> <select>
                                          <option value=1>1</option>
                                          <option value=2>2</option>
                                          <option value=3>3</option>
                                          <option value=4>4</option>
                                          <option value=5>5</option>

                                          </select>


                                          </div>
                                          
                                       


		                         </div>

		                         

		                         </br>
		                         </br>
		                         </div>



		                         
		                </div>  
		                 
		                         
		                      
		               

					";

					


		}


		if($list==="")
					{
						echo '<span style="color:#AFA;text-align:center;"> "UPPS! No Products ! Search again with other Keywords..." </span>';
					}

?>
