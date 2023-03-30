<?php
class Product extends Connection
{
  //ALL PRODUCTS
  public function getProduct()
  {
    $connect = parent::connect();
    parent::set_names();

    $sql = "SELECT * FROM tm_product WHERE state = 1";
    $sql = $connect->prepare($sql);
    $sql->execute();
    return $result = $sql->fetchAll();
  }

  //PRODUCTS BY ID
  public function getProductByID($prod_id)
  {
    $connect = parent::connect();
    parent::set_names();

    $sql = "SELECT * FROM tm_product WHERE product_id = ?";
    $sql = $connect->prepare($sql);
    $sql->bindValue(1, $prod_id);
    $sql->execute();
    return $result = $sql->fetchAll();
  }

  //DELETE PRODUCTS BY ID
  public function deleteProductByID($prod_id)
  {
    $connect = parent::connect();
    parent::set_names();

    $sql = "UPDATE tm_product
              SET
              state = 0,
              date_delete = now()
              WHERE product_id = ?";
    $sql = $connect->prepare($sql);
    $sql->bindValue(1, $prod_id);
    $sql->execute();
    return $result = $sql->fetchAll();
  }

  //INSERT PRODUCT
  public function insertProduct($product_name)
  {
    $connect = parent::connect();
    parent::set_names();

    $sql = "INSERT INTO tm_product (product_name, date_create) VALUES (?, now());";
    $sql = $connect->prepare($sql);
    $sql->bindValue(1, $product_name);
    $sql->execute();
    return $result = $sql->fetchAll();
  }

  //UPDATE PRODUCT
  public function updateProduct($prod_id, $product_name)
  {
    $connect = parent::connect();
    parent::set_names();

    $sql = "UPDATE tm_product
              SET
              date_update = now(),
              product_name = ?
              WHERE product_id = ?";
    $sql = $connect->prepare($sql);
    $sql->bindValue(1, $product_name);
    $sql->bindValue(2, $prod_id);
    $sql->execute();
    return $result = $sql->fetchAll();
  }
}
