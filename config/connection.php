<?php
class Connection
{
  protected $dbh;
  private $host = "localhost";
  private $dbname = "test_bd_crudone";
  private $user = "root";
  private $pass = "1234";

  public function Connect()
  {

    try {
      $connect = $this->dbh = new PDO("mysql:host={$this->host}; dbname=$this->dbname", $this->user, $this->pass);
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $connect;
    } catch (Exception $e) {
      print "Error BD!!" . $e->getMessage() . "<br/>";
      die();
    }
  }

  public function set_names()
  {
    return $this->dbh->query("SET NAMES 'utf8'");
  }
}
