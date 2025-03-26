<?php 
include_once("classes/Materials.php");
include("conn.php");



$mats = new Materials();
$bor = new Borrow();
if (!empty($_GET["action"])&& $_GET["action"] == "clearList"  ) {
    session_unset();
    
    ?>
    <script> window.location = "materialsList.php"; </script>
     <?php
} else{

    if (!empty($_SESSION["borrowList"])) {
        if (in_array($_GET["materialName"],$_SESSION["borrowList"])) {
            ?>
            <script> window.location = "borrow.php"; </script>
            <?php
            exit();
        }
        $bor->set_borrowlist($_SESSION["borrowList"]);

    }
    
    $bor->add_borrowlist($_GET["materialName"]);
    
    
    $_SESSION["borrowList"] = $bor->dumpList();
    
    print_r($_SESSION["borrowList"] );

    ?>
    <script> window.location = "borrow.php"; </script>
    <?php

                   
    
}


?>


