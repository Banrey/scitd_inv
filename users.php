<?php
class users {
  // Properties
  private $username;
  private $password;

  // Methods
  function set_username($username) {
    $this->username = $username;
  }
  function get_username() {
    return $this->username;
  }
  function set_password($password) {
    $this->password = $password;
  }
  function get_password() {
    return $this->password;
  }
}
?>