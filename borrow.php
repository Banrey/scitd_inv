<?php

include_once("classes/Crud.php");
include_once("classes/Materials.php");
include("conn.php");

$crud = new Crud();
$mats = new Materials();

//echo '<pre>'; print_r($result); exit;
?>


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
                <h2>Borrow Material</h2>

                    <p class="lead"> 
                        <!-- Materials page dialogue here --> 
                    </p>
                    <!-- Register backend code start -->

                    <?php $TI = 1; ?> <!-- tab index tracker cuz im lezy -->                    
                    <form data-parsley-validate autocomplete="on" action="materials.process.php" method="POST" id="register_form" > <!-- auto complete, process is in: [register.process.php] -->
                    
                    <div class="form-group">
                            
                            <label for="Matname">First Name</label>
                            <!-- form validation alphanumeric + symbols -->
                            <input type="fname" id="Fname" name="fname" class="form-control rounded" placeholder="First Name" data-parsley-pattern="/[a-zA-Z\s]+/gm" required tabindex= "<?php echo $TI, $TI++;?>" >
                        </div>     

                    <div class="form-group">
                            
                            <label for="Matname">Last Name</label>
                            <!-- form validation alphanumeric + symbols -->
                            <input type="lname" id="Lname" name="lname " class="form-control rounded" placeholder="Last Name" data-parsley-pattern="/[a-zA-Z\s]+/gm" required tabindex= "<?php echo $TI, $TI++;?>" >
                        </div>    


                    <div class="form-group col-3">                            
                    <label for="Available">Material Name</label>
                        <input type="number" id="Available" name="available" class="form-control rounded col-3" placeholder="Available Qty" data-parsley-pattern="/\w+/gm">
                    </div>
                    

                    <div id="materialDetails" class="container">


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
           // document.getElementById("MatModelDiv").innerHtml = "hi"

    
        };

        function newModel() {
        window.location.assign("searchAvailable.php"); 
        };  

        function matChange(){     
            document.getElementById("materialID").value = document.getElementById("material").value  

            document.getElementById("materialDetails").innerHTML = `
            <div class="form-group col-6">                            
                                <label for="Matname">Material Type</label>
                                <input type="materialType" id="materialType" name="materialType" class="form-control rounded" placeholder="<?php echo $models[1];?>" disabled>
                        </div>
                        
                        <div class="form-group col-6">                            
                                <label for="Matname">Material Model</label>
                                <input type="materialModel" id="materialModel" name="materialModel" class="form-control rounded" placeholder="Material Model" disabled>
                        </div>
            `
        } 

    </script>

    <script>    
        $(document).ready(function() {
        $('.js-example-basic-single').select2();
        });      
                                  
    </script>


 
   

						
							
						
</html>
