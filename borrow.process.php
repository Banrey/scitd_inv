<?php 
include_once("classes/Crud.php");
include_once("classes/Materials.php");
include("conn.php");

$_SESSION["userID"] = "1";// debugging

$crud = new Crud();
$mats = new Materials();
$bor = new Borrow();



if (!empty($_GET["action"])&& $_GET["action"] == "checkout"  ) { //checkout code

    $query =  "INSERT INTO transactions (bname, userID)
                VALUES (?, ?);";
   
    
    $bname = $_POST["fname"]." ".$_POST["lname"];
    $userID = $_SESSION["userID"];
    $crud->checkOut($query, $bname, $userID);

    

    foreach ($_SESSION["borrowList"] as $materialName => $qty) {
        $materialNameTrimmed = preg_replace('/\s+/', '_', $materialName); //replace whitespace

        $_SESSION["borrowList"][$materialNameTrimmed] = $_POST[$materialNameTrimmed."Qty"]; //add qty because of naming convention used in borrow.php
        //echo $_POST[$materialNameTrimmed."Qty"]; //debugging, show names of post variables

        $insertSql = "UPDATE materials SET availability = 'pending', transID = LAST_INSERT_ID() WHERE (availability = 'available' AND materialName = ?) LIMIT ".$_SESSION["borrowList"][$materialNameTrimmed];
        echo"".$insertSql.""; //debugging show sql
        
        $crud->search($insertSql, $materialNameTrimmed);
        

    }
    //var_dump($_POST); //debugging, show names of post variables
    echo"query successful";

    
    exit();
} elseif (!empty($_GET["action"])&& $_GET["action"] == "pickup"  ) {
    $query = "UPDATE materials SET availability = 'borrowed' WHERE materialID = ?";
    $crud->search($query, $_GET["materialID"]);
    
    ?>
    <script> window.location = "materialsList.php"; </script>
    <?php

   exit();
} else {
    
}


if (!empty($_GET["action"])&& $_GET["action"] == "clearList"  ) { //clear list code
    session_unset();
    
    ?>
    <script> window.location = "materialsList.php"; </script>

     <?php
}   else{

    if (!empty($_SESSION["borrowList"])) { //add to borrow list code
        if (in_array($_GET["materialName"],$_SESSION["borrowList"])) {
            ?>
            <script> window.location = "borrow.php"; </script>
            <?php
            exit();
        }
        $bor->set_borrowlist($_SESSION["borrowList"]);

    }
    
    $bor->add_borrowlist($_GET["materialName"],0);
    
    
    $_SESSION["borrowList"] = $bor->dumpList();
    
    print_r($_SESSION["borrowList"] ); //debugging tool

    ?>
    <script> window.location = "borrow.php"; </script>
    <?php

                   
    
}


?>


