
                        
<label for="Username">Material Model New</label><br>
    <input hidden value="1" id="modelID" name="modelID">

    <select onchange="modChange()" class="js-example-basic-single col-3 " name="model[]" id="model">
            

    <!--  -->
    
    <?php $sql_model = "
                    SELECT modelID, modelName
                    FROM materialmodel
                    ORDER BY modelID ASC";
                    ?>   
                    <!-- SQL for type names from material type database -->
                    
    <?php $qry_model = mysqli_query($conn, $sql_model); ?>
    <?php while($get_model = mysqli_fetch_array($qry_model)){ ?> <!-- option loop for dropdown using Select2 -->

    <option value =<?php echo $get_model["modelID"]; ?>><?php echo $get_model["modelName"]; ?></option>
    <?php } ?>

    </select>  
    <!-- end of select -->

        <button class="btn btn-warning my-2" onclick="newModel()" tabindex="<?php echo $TI, $TI++;?> ">
            Register New Model
        </button>
                                
       
