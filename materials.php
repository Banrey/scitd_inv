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
        <!-- Load login stylesheet -->
        <link rel="stylesheet" href="login/css/login.css">

        
        <!-- Load Scripts Bootstrap, Jquery, Parsley-->
        <script language="javascript" src="bootstrap/js/bootstrap.js"></script>
        <script language="javascript" src="js/jquery.js"></script>
        <script src="js/parsley.min.js"></script>
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
                    <form data-parsley-validate autocomplete="on"  action="materials.process.php" id="register_form" method="post"> <!-- auto complete, process is in: [register.process.php] -->
                    
                        <div class="form-group">
                            
                            <label for="Matname">Material Name</label>
                            <!-- form validation alphanumeric -->
                            <input type="matname" id="Matname" name="matname" class="form-control rounded" placeholder="Material Name" data-parsley-type="alphanum" required tabindex= "<?php echo $TI, $TI++;?>" >
                        </div>

                        <div class="form-group">
                        
                            <label for="Mattype">Material Type</label>
                            <!-- form validation alphanumeric -->
                            <input type="mattype" id="Mattype" onClick= "newType" name="mattype" class="form-control rounded" placeholder="Material Type" data-parsley-type="alphanum" required tabindex="<?php echo $TI, $TI++;?>">
                            <a href="">
                                <button class="btn btn-warning my-2" tabindex="<?php echo $TI, $TI++;?>">
                                    Register New Type
                                </button>
                            </a>
                        </div>

                        <div class="form-group">
                        
                            <label for="Username">Material Model</label>
                            <!-- form validation alphanumeric -->
                            <input type="matmodel" id="Matmodel" name="matmodel" class="form-control rounded" placeholder="Material Model" data-parsley-type="alphanum" required tabindex="<?php echo $TI, $TI++;?>">
                        
                    
                            
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

        let typeLink = "newType.php?type=";
        let typeVal = document.getElementById("Matmodel").value;

        function newType() {
            //;
        window.location.assign(typeLink.concat(typeVal)); 
        };
           
        let modLink = "newModel.php?model=";
        let modVal = document.getElementById("Matmodel").value;

        function newModel() {
            //;
        window.location.assign(modLink.concat(modVal)); 
        };  

    </script>
   

						
							
						
</html>