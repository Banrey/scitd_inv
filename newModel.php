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

       

        
        <!-- Load Scripts Bootstrap, Jquery, Parsley-->
        <script language="javascript" src="bootstrap/js/bootstrap.js"></script>
        <script language="javascript" src="js/jquery.js"></script>
       
        <script src="js/parsley.min.js"></script>
        <script src="js/select2.min.js"></script>
    </head>

    <body>
        <div class="container-fluid p-3">
            <div class="card card-login col-lg-6 col-md-8">
                <div class="card-body">
                <h2>Register New Model</h2>

                    <p class="lead"> 
                        <!-- Materials page dialogue here --> 
                    </p>
                    <!-- Register backend code start -->

                    <?php $TI = 1; ?> <!-- tab index tracker cuz im lezy -->                    
                    <form data-parsley-validate autocomplete="on"  action="materials.process.php?action=addmodel" id="register_form" method="post"> <!-- auto complete, process is in: [register.process.php] -->
                    
                        <div class="form-group">                            
                            <label for="Madname">Model Name</label>
                            <!-- form validation alphanumeric -->
                            <input type="modname" id="Modname" name="modName" class="form-control rounded" placeholder="Model Name" data-parsley-pattern="/([a-Z])\w\d+" required tabindex= "<?php echo $TI, $TI++;?>" >
                        </div>

                        <div class="form-group">
                        
                            <label for="Matmod">Description</label>
                            <!-- form validation alphanumeric -->
                            <textarea type="modDesc" id="Moddesc" name="description" class="form-control rounded" placeholder="Model Description" data-parsley-pattern="/([a-Z])\w\d+"  data-parsley-maxlength = "80" required tabindex="<?php echo $TI, $TI++;?>">
                            </textarea>
                                <button class="btn btn-warning my-2" tabindex="<?php echo $TI, $TI++;?>">
                                    Register New Model
                                </button>
                            

                    </form>
                    
                    <!-- Register backend code -->


                </div>
            </div>
        </div>
       
    </body>						
