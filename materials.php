materials.php
<p id="demo"></p>


<!DOCTYPE html>
    <html>
    <head>
        <!-- character encoding -->
        <meta charset="utf-8">
        
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>SC-ITD-IMS</title>
        
        <!-- Load bootstrap stylesheet -->
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
        <!-- Load Select2 stylesheet -->
        <link rel="stylesheet" href=" css/select2.min.css">

        
        <!-- Load Scripts Bootstrap, Jquery, Parsley, Select2-->
        <script language="javascript" src="bootstrap/js/bootstrap.js"></script>
        <script language="javascript" src="js/jquery.js"></script>
        <script src="js/parsley.min.js"></script>        
        <script src="js/select2.min.js"></script>
    </head>

    <body>
        <div class="container-fluid p-3">
            <div class="card card-login col-lg-6 col-md-8">
                <div class="card-body">
                <h2>Register New Material</h2>

                    <p class="lead"> 
                        <!-- Materials page dialogue here --> 
                    </p>
                    <!-- Register backend code start -->

                    <?php $TI = 1; ?> <!-- tab index tracker cuz im lezy -->                    
                    <form data-parsley-validate autocomplete="on" action="materials.process.php" method="post" id="register_form" > <!-- auto complete, process is in: [register.process.php] -->
                    
                        <div class="form-group">
                            
                            <label for="Matname">Material Name</label>
                            <!-- form validation alphanumeric + symbols -->
                            <input type="matname" id="Matname" name="materialName" class="form-control rounded" placeholder="Material Name" data-parsley-pattern="/([a-Z])\w\d+" required tabindex= "<?php echo $TI, $TI++;?>" >
                        </div>

                        <div class="form-group">
                            
                        <label for="Mattype">Material Type</label><br>
                        <input hidden value="1" id="typeID" name="typeID">
                        

                            <select onchange="typeChange()" class="js-example-basic-single col-3 " name="type[]" id="type">
                            
                            <!--  -->
                            <?php
                            if(!file_exists("conn.php")){
                                echo "unable to locate <strong>conn.php</strong>";
                                exit();
                            }
                            include("conn.php");
                            ?>
                            <?php $sql_model = "
                                            SELECT typeID, typeName
                                            FROM materialtype 
                                            ORDER BY typeID ASC";
                                            ?>   
                                            <!-- SQL for type names from material type database -->
                                            
                            <?php $qry_model = mysqli_query($conn, $sql_model); ?>
                            <?php while($get_model = mysqli_fetch_array($qry_model)){ ?> <!-- option loop for dropdown using Select2 -->

                            <option value =<?php echo $get_model["typeID"]; ?>><?php echo $get_model["typeName"]; ?></option>
                            <?php } ?>


                            <!--  -->

                            </select>  
                        
                            <!-- form validation alphanumeric -->
                            <a href="">
                                <button onClick= "newType()" class="btn btn-warning my-2" tabindex="<?php echo $TI, $TI++;?>">
                                    Register New Type
                                </button>
                            </a>
                            
                        </div>

                        <div class="form-group">
                        
                            <label for="Username">Material Model</label><br>
                            <input hidden value="1" id="modelID" name="modelID">

                            <select onchange="modChange()" class="js-example-basic-single col-3 " name="model[]" id="model">
                                   

                            <!--  -->
                            
                            <?php $sql_model = "
                                            SELECT modelID, modelName
                                            FROM materialmodel
                                            ORDER BY modelID ASC";
                                            ?>   
                                            <!-- SQL for type names from material type database -->
                                            
                            <?php $qry_model = mysqli_query($conn, $sql_model); ?>
                            <?php while($get_model = mysqli_fetch_array($qry_model)){ ?> <!-- option loop for dropdown using Select2 -->

                            <option value =<?php echo $get_model["modelID"]; ?>><?php echo $get_model["modelName"]; ?></option>
                            <?php } ?>
                    
                            </select>  
                            <!-- end of select -->

                                <button class="btn btn-warning my-2" onclick="newModel()" tabindex="<?php echo $TI, $TI++;?> ">
                                    Register New Model
                                </button>
                            
                        </div>

                        <div class="form-group col-3">
                        
                            <label for="Username">Material Quantity</label>
                            <!-- form validation digits -->
                            <input type="number" id="Quantity" name="quantity" class="form-control rounded " placeholder="Quantity" data-parsley-type="digits" required tabindex="<?php echo $TI, $TI++;?>">
                        </div>

                        <div class="form-group text-right">
                            
                            <!-- register button -->
                            <button class="btn btn-warning my-2" tabindex="<?php echo $TI, $TI++;?>">
                                Register 
                            </button>
                        </div>
                    </form>
                    <!-- Register backend code -->

                    
                    


                </div>
            </div>
        </div>
       
    </body>

    <script>    
           
        
        function newType() {
           
        let typeLink = "newType.php";
            
        window.location.assign(typeLink); 
    
        };

        function newModel() {
        window.location.assign("newModel.php"); 
        };  

        function typeChange(){
            document.getElementById("typeID").value = document.getElementById("type").value
           // Match typeID to typeName to display onto the selection
        } 

        function modChange(){
            document.getElementById("modelID").value = document.getElementById("model").value
           // Match modelID to modelName to display onto the selection
        }

        


    </script>

    <script>    
        $(document).ready(function() {
        $('.js-example-basic-single').select2();
        });      
                                  
    </script>

    <!-- <script>       
		
        $("#BtnAddMaterial").on("click", function() {
                
    
                var materialname = $("#Matname").val();
                var model = $("#model").val();
                var type = $("#type").val();
        
                        if (materialname == null || materialname == "") {
                            $("#materialname").focus();
                        }
                        
                        
                        else {
                            alert(materialname);
                            alert(model);
                            alert(type);
                            
                            $.post("materials.process.php", {
                                materialName: materialname,
                                modelID: model,
                                typeID: type
                            }, function(data,status) {                      
                            
                                if(status == "success"){  
                                    alert(data);
                                    
                                
                                
                                } 
                            })
                        }
                    });
    </script> -->
 
   

						
							
						
</html>