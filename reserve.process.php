<?php 
include_once("classes/Crud.php");
include_once("classes/Materials.php");
include("conn.php");

$_SESSION["userID"] = "1";// debugging

$crud = new Crud();
$mats = new Materials();
$res = new Reserve();



if (!empty($_GET["action"])&& $_GET["action"] == "reserve"  ) {
        
        if (!empty($_SESSION["reserveList"])) { //check if reserve list is empty
            if (in_array($_GET["materialName"],$_SESSION["reserveList"])) {
                ?>
                <script> window.location = "reserve.php"; </script>
                <?php
                exit();
            }
            $res->set_reservelist($_SESSION["reserveList"]);
    
            }
    
            $res->add_reservelist($_GET["materialName"],0); //add to reserve list 
        
        
            $_SESSION["reserveList"] = $res->dumpList();
            
            print_r($_SESSION["reserveList"] ); //debugging tool
            ?>
                <!-- <script> window.location = "reserve.php"; </script> -->
                    <?php                 
    
    
        }