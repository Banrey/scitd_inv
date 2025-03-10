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
            <div class="card card-login col-lg-6 col-md-12">
                <div class="card-body">
                <h2>Login</h2>
                    <p class="lead">Before you get started, you must login or register if you don't already have an account.</p>

                    <!-- Login backend code star -->
                    <form data-parsley-validate autocomplete="off" action="login.process.php" id="login_form" method="post">
                    
                        <div class="form-group">
                        
                            <label for="Username">Username</label>
                            <!-- form validation alphanumeric -->
                            <input type="username" id="Username" name="username" class="form-control rounded" placeholder="Username" data-parsley-type="alphanum" required tabindex="1">
                        </div>

                        <div class="form-group">
                            <label class="d-block" for="password">
                                Password
                            </label>

                            <!-- form validation alphanumirec + symbols -->
                            <input type="password" id="Password" name="password" class="form-control rounded" placeholder="Password" data-parsley-minlength = "6" data-parsley-maxlength = "12" data-parsley-pattern="/^[a-zA-Z\s]+$/" required tabindex="2">
                        </div>

                        <div class="form-group text-right">
                            
                            <!-- login button -->
                            <button class="btn btn-warning my-2" tabindex="3">
                                Login 
                            </button>
                        </div>
                    </form>
                    <!-- Login backend code -->
                    <?php
                    include("users.php");
$apple = new users();
$apple->set_username('h');
echo $apple->get_username();
?>


                </div>
            </div>
        </div>
    </body>

						
							
						
</html>