
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
       

       

        
        <!-- Load Scripts Bootstrap, Jquery, Parsley-->
        <script language="javascript" src="bootstrap/js/bootstrap.js"></script>
        <script language="javascript" src="js/jquery.js"></script>
       
        <script src="js/parsley.min.js"></script>
    </head>

    <body>
        <div class="container-fluid p-3">
            <div class="card card-login col-lg-6 col-md-8">
                <div class="card-body">
                <h2>Register New Type</h2>

                    <p class="lead"> 
                        <!-- Materials page dialogue here --> 
                    </p>
                    <!-- Register backend code start -->

                    <?php $TI = 1; ?> <!-- tab index tracker cuz im lezy -->                    
                    <form data-parsley-validate autocomplete="on"  action="materials.process.php?action=addtype" id="register_form" method="post"> <!-- auto complete, process is in: [register.process.php] -->
                    
                        <div class="form-group">                            
                            <label for="Matname">Type Name</label>
                            <!-- form validation alphanumeric -->
                            <input type="matname" id="Matname" name="typeName" class="form-control rounded" placeholder="Type Name" data-parsley-pattern="/([a-Z])\w\d+" required tabindex= "<?php echo $TI, $TI++;?>" >
                        </div>

                        <div class="form-group">
                        
                            <label for="Mattype">Description</label>
                            <!-- form validation alphanumeric -->
                            <textarea id="Mattype" name="description" placeholder="Description" class="form-control rounded" data-parsley-pattern="/([a-Z])\w\d+"  data-parsley-maxlength = "80" required tabindex="<?php echo $TI, $TI++;?>">
                            </textarea>
                                <button class="btn btn-warning my-2" tabindex="<?php echo $TI, $TI++;?>">
                                    Register New Type
                                </button>

                                
                            

                    </form>
                    <!-- Register backend code -->


                </div>
            </div>
        </div>
       
    </body>						
				
</html>