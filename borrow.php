<?php

include_once("classes/Crud.php");
include_once("classes/Materials.php");
include("conn.php");

$crud = new Crud();
$mats = new Materials();
$bor = new Borrow();


if (empty($_SESSION["borrowList"])) {
	
	//failed to get material ID code

    echo "Phac YU";
    ?>
<script>
    </script>
    <?php
exit();
    
} else {

    $sqlStart = "SELECT COUNT(m.materialID) as ctr, m.materialID, m.materialName, m.availability, md.modelName, t.typeName
            FROM materials m 
            JOIN materialmodel md ON m.modelID = md.modelID 
            JOIN materialtype t ON m.typeID = t.typeID 
            WHERE (m.materialName = ? ";

            

            foreach ($_SESSION["borrowList"] as $m=>$q) {
                $sqlStart = $crud->addSql($sqlStart,$m);

            }

            

           // print_r($_SESSION["borrowList"]); debugging tools
           // print_r($sqlStart);

            
            
            $sqlEnd = " ) AND m.availability = 'available' GROUP BY m.materialName ORDER BY materialID ASC"; 

            $sql = $sqlStart.$sqlEnd;
    $result = $crud->search($sql, array_key_first($_SESSION["borrowList"])); 
    // print_r($sql); //debugging, print SQL code

    foreach($result as $key => $res){
        $mats->set_materialID($res["materialID"]);
        $mats->set_materialName($res["materialName"]);
        $mats->set_typeName(typeName: $res["typeName"]);
    }

    
}

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
                <h2>Borrow Material</h2>

                    <p class="lead"> 
                        <!-- Materials page dialogue here --> 
                    </p>
                    <!-- Register backend code start -->

                    <?php $TI = 1; ?> <!-- tab index tracker cuz im lezy -->                    
                    <form data-parsley-validate autocomplete="on" action="borrow.process.php?action=checkout" method="POST" id="register_form" > <!-- auto complete, process is in: [register.process.php] -->
                    
                    <div class="form-group">
                            
                            <label for="Matname">First Name</label>
                            <!-- form validation alphanumeric + symbols -->
                            <input type="fname" id="Fname" name="fname" class="form-control rounded" placeholder="First Name" data-parsley-pattern="/[a-zA-Z\s]+/gm" required tabindex= "<?php echo $TI, $TI++;?>" >
                        </div>     

                    <div class="form-group">
                            
                            <label for="Matname">Last Name</label>
                            <!-- form validation alphanumeric + symbols -->
                            <input type="lname" id="Lname" name="lname" class="form-control rounded" placeholder="Last Name" data-parsley-pattern="/[a-zA-Z\s]+/gm" required tabindex= "<?php echo $TI, $TI++;?>" >
                        </div>      

                    <div class="form-group">
                            
                            <label for="Matname">Date & Time</label>
                            <!-- form validation alphanumeric + symbols -->
                            <input type="datetime-local" id="Date" name="date" class="form-control rounded" placeholder="Borrow Date" required tabindex= "<?php echo $TI, $TI++;?>" >
                        </div>    
                        
    <div class="container col-lg-12">
                                
        <table class="table position-relative" >
    
        <tr>
      <th scope="col">materialID</th>
      <th scope="col">materialName</th>
      <th scope="col">modelName</th>
      <th scope="col">typeName</th>
      <th scope="col">units available</th>
      <th scope="col">units to borrow</th>
    </tr>
  </thead>
            <?php

                        
        if (!empty($result)){
            foreach ($result as $key => $res) {
                
                echo "<tr>";
                    echo "<td>".$res['materialID']."</td>";
                    echo "<td>".$res['materialName']."</td>";
                    echo "<td>".$res['modelName']."</td>";
                    echo "<td>".$res['typeName']."</td>";
                    echo "<td>".$res['ctr']."</td>";
                    echo "<td><input type = \"number\" min=\"1\" max=\"".$res['ctr']."\" value=\"1\" name=\"".$res['materialName']."Qty\" )></td>";
            
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
           
        
       

        function newModel() {
        window.location.assign("searchAvailable.php"); 
        };  


    </script>



 
   

						
							
						
</html>
