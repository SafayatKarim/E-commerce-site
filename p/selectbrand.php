<html>
    <head>
        <!-- select brand by ajax -->
        <title>ComboBox with AJAX</title>
    </head>
    <body>
        <select id="city" onchange="loadArea()">
            <option>--Please select City--</option>
            <option>Dhaka</option>
            <option>Chittagong</option>
        </select>

        <select id="area">
            <option>--Please select Area--</option>
            
        </select>
        <p></p>
        <hr>
        <input type="text" onkeyup="searchArea(this.value)">
        <br/>
        <p id="par"></p>
        <script>
            function searchArea(str){
                let para=document.getElementById('par');
                para.innerHTML="";
                let ajax=new XMLHttpRequest();
                ajax.onreadystatechange=function(){
                    if(this.readyState==4 && this.status==200)
                    {
                       
                        let areaData=JSON.parse(ajax.responseText); 
                        for (let index = 0; index < areaData.length; index++) {
                            para.innerHTML+=areaData[index]+",";
                        }
                        
                    }
                }
                
                    ajax.open("GET","server.php?str="+str,true);
                    ajax.send();
                
            }
            function clearCombo(){
                
                let len=area.length;
                for (let index = 0; index <len ; index++) {
                    area.remove(area[index]);

                }
                //area.length=0;
            }
            function loadArea(){
                let city=document.getElementById('city');
                let area=document.getElementById('area');
                clearCombo();
                let ajax=new XMLHttpRequest();
                ajax.onreadystatechange=function(){
                    if(this.readyState==4 && this.status==200)
                    {
                        let areaData=JSON.parse(ajax.responseText);
                        for (let index = 0; index < areaData.length; index++) {
                            let option=document.createElement("option");
                            if(city.value=="Dhaka"){
                                option.text=areaData[index];
                                
                            }
                            else if(city.value=="Chittagong"){
                                option.text=areaData[index].area;
                            }
                            area.add(option);
                            
                            
                            
                        }
                        
                    }
                }
                if(city.value=="Dhaka"){
                    ajax.open("GET","server.php",true);
                    ajax.send();
                }
                else if(city.value=="Chittagong"){
                    ajax.open("GET","chittagong.json",true);
                    ajax.send();
                }
                else{}
               
            }
        </script>
    </body>
</html>