<?php
class Materials {
  // Properties
  public $materialID;
  public $materialName;
  public $typeID;
  public $modelID;
  public $availability;


  // Methods
  function set_materialID($materialID) {
    $this->materialID = $materialID;
  }
  function get_materialID() {
    return $this->materialID;
  }
  
  function set_materialName($materialName) {
    $this->materialName = $materialName;
  }
  function get_materialName() {
    return $this->materialName;
  }
  
  function set_typeID($typeID) {
    $this->typeID = $typeID;
  }
  function get_typeID() {
    return $this->typeID;
  }
  
  function set_modelID($modelID) {
    $this->modelID = $modelID;
  }
  function get_modelID() {
    return $this->modelID;
  }
  
  function set_availability($availability) {
    $this->availability = $availability;
  }
  function get_availability() {
    return $this->availability;
  }
}


class Types {
    // Properties
    public $name;
    public $color;
  
    // Methods
    function set_name($name) {
      $this->name = $name;
    }
    function get_name() {
      return $this->name;
    }
  }

  
class Models {
    // Properties
    public $name;
    public $color;
  
    // Methods
    function set_name($name) {
      $this->name = $name;
    }
    function get_name() {
      return $this->name;
    }
  }
?>