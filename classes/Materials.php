<?php
session_start();
class Materials {
  // Properties
  public $materialID;
  public $materialName;
  public $typeID;
  public $typeName;
  public $modelName;
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
  function set_typeName($typeName) {
    $this->typeName = $typeName;
  }
  function get_typeName() {
    return $this->typeName;
  }  
  function set_modelID($modelID) {
    $this->modelID = $modelID;
  }
  function get_modelID() {
    return $this->modelID;
  }
  function set_modelName($modelName) {
    $this->modelName = $modelName;
  }
  function get_modelName() {
    return $this->modelName;
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

  class Borrow{
    public $borrowlist = [];
    public $materialValues = array("materialID"=>"null", "materialName"=>"null", "materialType"=>"null", "materialModel"=>"null", "availability"=>"null" );

    function set_materialValues($key, $value) {
      $this->materialValues[$key] = $value;
  }

  function get_materialValues() {
    return $this->materialValues;
  }

  function add_borrowlist($materialName, $qty) {
   
    $this->borrowlist[$materialName] = $qty;
  }

  function set_borrowlist(array $list) {
     $this->borrowlist = $list;
  }
  function get_borrowlist($index) {
    return $this->borrowlist[$index];
  }

  function dumpList() {
    return $this->borrowlist;
  }

}
?>