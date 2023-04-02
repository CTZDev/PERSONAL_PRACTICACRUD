<?php
class Category extends Connection
{
  //ALL PRODUCTS
  public function getCategory()
  {
    $connect = parent::connect();
    parent::set_names();

    $sql = "SELECT * FROM tm_category WHERE state = 1";
    $sql = $connect->prepare($sql);
    $sql->execute();
    return $result = $sql->fetchAll();
  }
}
