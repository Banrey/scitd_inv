<!DOCTYPE html>
    <html>
    <head>
        <!-- character encoding -->
        <meta charset="utf-8">
        
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>SC-ITD-IMS</title>
        
        <!-- Load bootstrap stylesheet -->
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css" />
        <!-- Load login stylesheet -->
        <link rel="stylesheet" href="login/css/login.css">

        
        <!-- Load Scripts Bootstrap, Jquery, Parsley-->
        <script language="javascript" src="../bootstrap/js/bootstrap.js"></script>
        <script language="javascript" src="../js/jquery.js"></script>
        <script src="../js/parsley.min.js"></script>
    </head>

    <body>
        <div class="container-fluid p-3">
            <div class="card card-login col-lg-6 col-md-12">
                <div class="card-body">
                <h2>Register New User</h2>
                    <p class="lead">Before you get started, you must login or register if you don't already have an account.</p>

                    <!-- Register backend code star -->
                    <form data-parsley-validate autocomplete="off" action="register.process.php" id="register_form" method="post">
                    
                        <div class="form-group">
                        
                            <label for="Username">Username</label>
                            <!-- form validation alphanumeric -->
                            <input type="username" id="Username" name="username" class="form-control rounded" placeholder="Username" data-parsley-type="alphanum" required tabindex="1">
                        </div>
                        
                        <div class="form-group" >
                                 <label class="required">Email *</label>   
                                 <!-- form validation Email -->
                                <input type="email" id="Email" name="email" class="form-control rounded" placeholder="E-mail" required tabindex="2"> 
                        </div>

                        <div class="form-group">
                            <label class="d-block" for="password">
                                Password
                            </label>

                            <!-- form validation alphanumirec + symbols -->
                            <input type="password" id="Password" name="password" class="form-control rounded" placeholder="Password" data-parsley-minlength = "6" data-parsley-maxlength = "12" data-parsley-pattern="/([a-Z])\w\d+" required tabindex="3">
                        </div>

                        <div class="form-group">
                            <label class="d-block" for="passwordcon">
                                Password Confirm
                            </label>

                            <!-- form validation password confirmation -->
                            <input type="password" id="PasswordConfirm" class="form-control rounded" placeholder="Password Confirmation" data-parsley-minlength = "6" data-parsley-maxlength = "12" data-parsley-pattern="/^[a-zA-Z\s]+$/" data-parsley-equalto="#Password" required tabindex="3">
                        </div>

                        <div class="form-group">
                            <label class="d-block" for="fname">
                            First Name
                            </label>

                            <!-- form validation letters only -->
                            <input type="fname" id="Fname" name="fname" class="form-control rounded" placeholder="First Name" data-parsley-pattern="/^[a-zA-Z ]*$/" required tabindex="4">
                        </div>

                        <div class="form-group">
                            <label class="d-block" for="lname">
                            Last Name
                            </label>

                            <!-- form validation letters only -->
                            <input type="lname" id="Lname" name="lname" class="form-control rounded" placeholder="Last Name" data-parsley-pattern="/^[a-zA-Z ]*$/" required tabindex="5">
                        </div>

                        <div class="form-group">
                            <label class="d-block" for="age">
                            Age
                            </label>

                            <!-- form validation digits only -->
                            <input type="age" id="Age" name="age" class="form-control rounded" placeholder="Age" data-parsley-type="digits" required tabindex="6">
                        </div>

                        <div class="form-group">
                            <label class="d-block" for="position">
                            Position
                            </label>

                            <!-- form validation alphabet only -->
                            <input disabled value= "Supervisor" type="position" id="Position" name="position" class="form-control rounded" placeholder="position" required tabindex=""7>
                        </div>

                        <div class="form-group">
                            <label class="d-block" for="contactno">
                            Contact Number
                            </label>

                            <!-- form validation numbers only -->
                            <input type="contactno" id="Contactno" name="contactno" class="form-control rounded" placeholder="Contact Number" data-parsley-type="digits" required tabindex="8">
                        </div>

                        <div class="form-group text-right">
                            
                            <!-- register button -->
                            <button class="btn btn-warning my-2" tabindex="9">
                                Register 
                            </button>
                        </div>
                    </form>
                    <!-- Register backend code -->
                    


                </div>
            </div>
        </div>
    </body>

						
							
						
</html>