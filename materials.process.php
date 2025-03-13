<?php



if(!file_exists("conn.php")){
    echo "unable to locate <strong>conn.php</strong>";
    exit();
}
include("conn.php");
if (@$_GET["action"] == "addtype"){
    $sql_insert = "INSERT INTO materialtype
                (typeName,
                description
                )
                VALUES (?, ?)";
    
                if ($statement = mysqli_prepare($conn, $sql_insert)) {
                    mysqli_stmt_bind_param($statement, "ss",
                    $typeName,
                    $description );
    
                    $typeName = $_POST['typeName'];
                    $description = $_POST['description'];
                    
                    mysqli_stmt_execute($statement);
                    echo "Registered Successfully";
                                             
    
                   ?>
                        <script>      
                    window.location = "materials.php?status=registered_type";
                    
                    
                </script>
            <?php    
            }

        }   elseif (@$_GET["action"] == "addmodel"){
            $sql_insert = "INSERT INTO materialmodel
                        (modelName,
                        description
                        )
                        VALUES (?, ?)";
            
                        if ($statement = mysqli_prepare($conn, $sql_insert)) {
                            mysqli_stmt_bind_param($statement, "ss",
                            $modelName,
                            $description );
            
                            $modelName = $_POST['modName'];
                            $description = $_POST['description'];
                            
                            mysqli_stmt_execute($statement);
                            echo "Registered Successfully";
                                                     
            
                           ?>
                                <script>      
                            window.location = "materials.php?status=registered_model";
                            
                            
                        </script>
                    <?php    
                    }
        
                } else{
            
$sql_insert = "INSERT INTO materials
(materialName,
typeID,
modelID
)
VALUES (?, ?, ?)";

if ($statement = mysqli_prepare($conn, $sql_insert)) {
    mysqli_stmt_bind_param($statement, "sii",
    $materialName,
    $typeID,
    $modelID );

    $materialName = $_POST['materialName'];
    $typeID = $_POST['typeID'];
    $modelID = $_POST['modelID'];
    
    mysqli_stmt_execute($statement);
    echo "Registered Successfully";
                             

   ?>
        <script>      
    window.location = "materials.php?status=registered";
    
    
</script>
        <?php
        
    } 


else {
    echo "Unable to prepare query:". $sql_insert . " " .mysqli_error($conn). "<br />";
    exit();
}




        }

        
?>
