<?php

include_once("classes/Crud.php");
include_once("classes/Materials.php");
include("conn.php");

$crud = new Crud();
$mats = new Materials();
$bor = new Borrow();

$date = time();


if (empty($_SESSION["borrowList"])) {
	
	//failed to get material ID code

    echo "Phac YU";
    ?>


<script>
    </script>
    <?php
exit();
    
}   if(isset($_GET["date"])) { //set date if search date is available    
   $date = $_GET["date"];
    
   $date = strtotime($date);

}

$sqlStart = "SELECT tl.materialName, (SELECT COUNT(materialID)-SUM(qty) FROM materials WHERE materialName = tl.materialName) units_available, bname
FROM transactionlist tl
JOIN transactions tr ON tl.transID = tr.transID
WHERE tr.time_start < '".date("Y-m-d h:i",$date)."' AND tr.status = 'pending' AND (tl.materialName = ? ";   


    
            

            foreach ($_SESSION["borrowList"] as $m=>$q) {
                $sqlStart = $crud->addReserveSql($sqlStart,$m); //add more items from list

            }



//             set @time_start = '2025-05-08';

            

           // print_r($_SESSION["borrowList"]); debugging tools
            //print_r($sqlStart);

            
            
            $sqlEnd = ") ;"; 

            $sql = $sqlStart.$sqlEnd;
    $result = $crud->search($sql, array_key_first($_SESSION["borrowList"])); 
    // print_r($sql); //debugging, print SQL code

    

 

// echo date("Y-m-d g:i",$date); //debugging show time

?>


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

        
        <!-- Load Scripts Bootstrap, Jquery, Parsley, Select2-->
        <script language="javascript" src="bootstrap/js/bootstrap.js"></script>
        <script language="javascript" src="js/jquery.js"></script>
        <script src="js/parsley.min.js"></script>        
        <script src="js/select2.min.js"></script>
    </head>

    <body>
        <div class="container-fluid p-3">
            <div class="card card-login col-lg-6 col-md-8">
                <div class="card-body">
                <h2>Reserve Material</h2>

                    <p class="lead"> 
                        <!-- Materials page dialogue here --> 
                    </p>
                    <!-- Register backend code start -->

                    <?php $TI = 1; ?> <!-- tab index tracker cuz im lezy -->                    
                    <form data-parsley-validate autocomplete="on" action="borrow.process.php?action=checkout" method="POST" id="register_form" > <!-- auto complete, process is in: [register.process.php] -->
                    
                    <div class="form-group">
                            
                            <label for="First Name">First Name</label>
                            <!-- form validation alphanumeric + symbols -->
                            <input type="fname" id="Fname" name="fname" value="test" class="form-control rounded" placeholder="First Name" data-parsley-pattern="/[a-zA-Z\s]+/gm" required tabindex= "<?php echo $TI, $TI++;?>" >
                        </div>     

                    <div class="form-group">
                            
                            <label for="Last Name">Last Name</label>
                            <!-- form validation alphanumeric + symbols -->
                            <input type="lname" id="Lname" name="lname" value="test" class="form-control rounded" placeholder="Last Name" data-parsley-pattern="/[a-zA-Z\s]+/gm" required tabindex= "<?php echo $TI, $TI++;?>" >
                        </div>          

                    <div class="form-group">                            
                        <label for="timeStart">Time Start</label>
                        <input type="datetime-local" id="timeStart" class="w-25 form-control rounded" name="datetimeStart" value="<?php echo date("Y-m-d h:i",$date); ?>" placeholder="Borrow Time Start" required tabindex= "<?php echo $TI, $TI++;?>" >
                        
                    </div>      

                        <div class="form-group">
                            <label for="timeEnd">Time End</label>
                            <input type="datetime-local" id="timeEnd" class="w-25 form-control rounded" name="datetimeEnd" value="<?php echo date("Y-m-d h:i",$date+86400); ?>" placeholder="Borrow Time End" required tabindex= "<?php echo $TI, $TI++;?>" >
                            
                        </div> 

                        <button class="btn btn-warning my-2"type="button" onclick="dateSearch()" tabindex="<?php echo $TI, $TI++;?>">
                                Check Available
                            </button>


                        
    <div class="container col-lg-12">
                                
        <table class="table position-relative" >
    
                <tr>
            <th scope="col">materialName</th>
            <th scope="col">units available</th>
            <th scope="col">units to borrow</th>
            </tr>
        </thead>
            <?php

                        
        if (!empty($result)){
            foreach ($result as $key => $res) {
                
                echo "<tr>";
                    echo "<td>".$res['materialName']."</td>";
                    echo "<td>".$res['units_available']."</td>";
                    echo "<td><input type = \"number\" min=\"0\" max=\"".$res['units_available']."\" value=\"".$res['units_available']."\" name=\"".$res['materialName']."Qty\" )></td>";
            
                    echo "</tr>";	
                    echo "</div>";


                   
            } 
            
            echo "<a href=\"materialsList.php\">Add Item</a></br>"; //add item page link 
            echo "<a href=\"borrow.process.php?action=clearList\">Clear List</a>"; //Clear the list link
           


            
        } else {
            echo "No results :("; 
        }
?>

                        <div class="form-group text-right">
                            
                            <!-- register button -->
                            <button class="btn btn-warning my-2" tabindex="<?php echo $TI, $TI++;?>">
                                Check Out 
                            </button>
                        </div>
                    </form>
                    <!-- Register backend code -->
                </div>
            </div>
        </div>
       
    </body>

    <script>    
    function dateSearch(){
        let date = document.getElementById("timeStart").value;
       
        window.location.replace("reserve.php?date=".concat(date));

        }    
        
        $(document).ready(function() {
            $(window).keydown(function(event){
                if(event.keyCode == 13) {
                event.preventDefault();
                return false;
                }
            });
        });
    


    </script>						
</html>