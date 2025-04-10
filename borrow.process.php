<?php 
include_once("classes/Crud.php");
include_once("classes/Materials.php");
include("conn.php");

$_SESSION["userID"] = "1";// debugging

$crud = new Crud();
$mats = new Materials();
$bor = new Borrow();
$res = new Reserve();



if (!empty($_GET["action"])&& $_GET["action"] == "checkout"  ) { //checkout code
    
    $time_startString = $_POST["date"]." ".$_POST["timeStart"];
    $time_endString =  $_POST["date"]." ".$_POST["timeEnd"];

    echo $time_endString;

    $end_d=strtotime($time_endString);
    $start_d=strtotime($time_startString);

    $startDate = date("Y-m-d g:i:s", $start_d);
    $endDate = date("Y-m-d g:i:s", $end_d);




    $query =  "INSERT INTO transactions (bname, userID, time_start, time_end)
                VALUES (?, ?, '".$startDate."', '".$endDate."');";

    echo $query;
   
    
    $bname = $_POST["fname"]." ".$_POST["lname"];
    $userID = $_SESSION["userID"];
    $crud->checkOut($query, $bname, $userID);
    $insertSql = "SET @ctr = LAST_INSERT_ID();"; 

    

    foreach ($_SESSION["borrowList"] as $materialName => $qty) { //show borrow list as table
        $materialNameTrimmed = preg_replace('/\s+/', '_', $materialName); //replace whitespace with _ for accurate key names

        $_SESSION["borrowList"][$materialNameTrimmed] = $_POST[$materialNameTrimmed."Qty"]; //add qty because of naming convention used in borrow.php
        //echo $_POST[$materialNameTrimmed."Qty"]; //debugging, show names of post variables

        

        $insertSql = $crud->addListSql($insertSql, $materialNameTrimmed, $_SESSION["borrowList"][$materialNameTrimmed]) ;
        
    

        // = 'pending', transID = LAST_INSERT_ID() WHERE (availability = 'available' AND materialName = ?) LIMIT ".$_SESSION["borrowList"][$materialNameTrimmed]; old code
         

    }
    //var_dump($_POST); //debugging, show names of post variables
    echo"".$insertSql.""; //debugging show sql
    $crud->insertMultiple($insertSql);
    echo"query successful";
    exit();

} elseif (!empty($_GET["action"])&& $_GET["action"] == "pickup"  ) {
    $query = "UPDATE materials SET availability = 'borrowed' WHERE materialID = ?";
    $crud->search($query, $_GET["materialID"]);
    
    ?>
    <script> window.location = "materialsList.php"; </script>
    <?php

   exit();
} elseif (!empty($_GET["action"])&& $_GET["action"] == "searchbydate"  ) {
    $date = strtotime($_POST["date"]) ;
    $date2 = $date;

    exit;
}else {
    
}


if (!empty($_GET["action"])&& $_GET["action"] == "clearList"  ) { //clear list code
    session_unset();
    
    ?>
    <script> window.location = "materialsList.php"; </script>

     <?php
}   else{

    if (!empty($_SESSION["borrowList"])) { //check if borrow lst is empty
        if (in_array($_GET["materialName"],$_SESSION["borrowList"])) {
            ?>
            <script> window.location = "borrow.php"; </script>
            <?php
            exit();
        }
        $bor->set_borrowlist($_SESSION["borrowList"]);

    }
    
    $bor->add_borrowlist($_GET["materialName"],0); //add to borrow list 
    
    
    $_SESSION["borrowList"] = $bor->dumpList();
    
    print_r($_SESSION["borrowList"] ); //debugging tool

    ?>
    <script> window.location = "borrow.php"; </script>
    <?php                 
    
}


?>


