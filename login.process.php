<?php

 if(!file_exists("conn.php")){  //check for database connection
    echo "unable to locate <strong>connect.php</strong>";
    exit();
}
include("conn.php");

$sql_check = "SELECT COUNT(userID) AS ctr, 
    userID, username
FROM 
    users 
WHERE   
    username = ? AND password = ?" ;
    
    if ($statement_check = mysqli_prepare($conn, $sql_check)){
        mysqli_stmt_bind_param($statement_check, "ss", $username, $password);
        
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        
        mysqli_stmt_execute($statement_check);
        
        mysqli_stmt_bind_result($statement_check, $ctr, $userID, $username);
        while(mysqli_stmt_fetch($statement_check)){
            if($ctr == 1){
                session_start();
                $_SESSION['session_id'] = session_id();
                $_SESSION['userID'] = $userID;
                $_SESSION['username'] = $username;
                header("location: dashboard.php");
                

            
            }
            else{
                $url = "location: index.php?login=failed".$password;
                header($url);
            }
        }

    }