<?php
include_once("classes/Crud.php");
include_once("classes/Materials.php");
include("conn.php");

$crud = new Crud();
$mats = new Materials();

//echo '<pre>'; print_r($result); exit;
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
            <div class="card card-login col-md-8">
                <div class="card-body">
                <h2>List Of Materials</h2>

                    <p class="lead"> 
                        <!-- Materials page dialogue here --> 
                    </p>
                    <!-- Register backend code start -->

                    <?php $TI = 1; ?> <!-- tab index tracker cuz im lezy -->                    
                    
                    <?php
                            if(!file_exists("conn.php")){
                                echo "unable to locate <strong>conn.php</strong>";
                                exit();
                            }
                            //database connection check
                            ?>

                        <div class="form-group col-6">
                            
                            <label for="Search">Search</label>
                            <!-- form validation alphanumeric + symbols -->
                            <input type="matname" id="Matname" name="matname " class="form-control rounded" placeholder="Search by Material Name" data-parsley-pattern="/[a-zA-Z\s]+/gm" required tabindex= "<?php echo $TI, $TI++;?>" >
                        
                            <button class="btn btn-warning my-2" onclick="Search()" tabindex="<?php echo $TI, $TI++;?> ">
                            Search
                            </button>
                        </div>   
       

                            <div class="container col-lg-12">
                                
                            <table width='80%' border=0>

                            <tr bgcolor='#CCCCCC'>
                                <td>materialID</td>
                                <td>materialName</td>
                                <td>modelName</td>
                                <td>availability</td>
                                <td>process</td>
                            </tr>

                            
                            

                            </div>   
                            <?php
                            
                            if (empty($_GET["search"])){
                                // default code here
                                $sql = "SELECT m.materialID, m.materialName, m.availability, md.modelName FROM materials m JOIN materialmodel md ON m.modelID = md.modelID ORDER BY materialID ASC"; 
                                $result = $crud->getData($sql);
                            } else{
                                $sql = "SELECT m.materialID, m.materialName, m.availability, md.modelName FROM materials m JOIN materialmodel md ON m.modelID = md.modelID WHERE m.materialName LIKE ? ORDER BY materialID ASC"; 
                                $result = $crud->search($sql, '%'.$_GET["search"].'%');
                            }
                            
                            
                                            
                            if (!empty($result)){
                                foreach ($result as $key => $res) {
                                    echo "<tr>";
                                    echo "<td>".$res['materialID']."</td>";
                                    echo "<td>".$res['materialName']."</td>";
                                    echo "<td>".$res['modelName']."</td>";
                                    echo "<td>".$res['availability']."</td>";	
                                    if ($res["availability"] == "available") {
                                       echo "<td><a href=\"borrow.process.php?materialName=$res[materialName]\">Borrow</a></td>";
                                    }   else if ($res["availability"] == "pending") {                                        
                                       echo "<td><a href=\"borrow.process.php?action=pickup&materialID=$res[materialID]\">Pick Up</a></td>";
                                
                                    }   else if ($res["availability"] == "borrowed") {                                        
                                        echo "<td><a href=\"return.php?materialID=$res[materialID]\" onClick=\"return confirm('Are you sure you want to return?')\">Return</a><td>";
                                
                                    } else {
                                echo "No results :(";
                                    }
                                }
                            }
                            
                            ?>                         
                </div>

                
            </div>
        </div>
       

             
    </body>


    <script>    
        $(document).ready(function() {
        $('.js-example-basic-single').select2();
        });      
    

        function Search() {
        window.location = "?search=" + $("#Matname").val();
        };             
    </script>


 
   

						
							
						
</html>
