<?php



if(!file_exists("../conn.php")){
    echo "unable to locate <strong>conn.php</strong>";
    exit();
}
include("../conn.php");

echo $_POST['email'];

$sql_check = "SELECT count(userID) AS ctr FROM users WHERE email LIKE ?";
if ($statement_check = mysqli_prepare($conn, $sql_check)){
	mysqli_stmt_bind_param($statement_check, "s", $email);
	
	$email_address = $_POST['email'];
    str_replace("@","_",$email_address);
	mysqli_stmt_execute($statement_check);
	
	mysqli_stmt_bind_result($statement_check, $ctr);
	while(mysqli_stmt_fetch($statement_check)){
		if($ctr > 0){
            echo "Email already registered";           
            header("location: registration.php?account=registered");
			exit();
		}
	}
	
}


$sql_insert = "INSERT INTO users
            (username,
            fname,
            lname,
            age,
            contactno,
            email,
            password
            )
            VALUES (?, ?, ?, ?, ?, ?, ?)";

            if ($statement = mysqli_prepare($conn, $sql_insert)) {
                mysqli_stmt_bind_param($statement, "sssiiss",
                    $username, $fname, $lname, $age, $contactno, $email, $password);

                $username = $_POST['username'];
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $age = $_POST['age'];
                $contactno = $_POST['contactno'];
                $email = $_POST['email'];
                $password = md5($_POST['password']);

        
				
				mysqli_stmt_execute($statement);
                echo "Registered Successfully";
                                         

               ?>
                    <script>      
                window.location = "index.php?status=registered";
                
                
            </script>
                    <?php
                    
                } 


            else {
                echo "Unable to prepare query:". $sql_insert . " " .mysqli_error($conn). "<br />";
                exit();
            }?>

            