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
  public function getProductByID($product_id)
  {
    $connect = parent::connect();
    parent::set_names();

    $sql = "SELECT * FROM tm_product WHERE product_id = ?";
    $sql = $connect->prepare($sql);
    $sql->bindValue(1, $product_id);
    $sql->execute();
    return $result = $sql->fetchAll();
  }

  //DELETE PRODUCTS BY ID
  public function deleteProductByID($product_id)
  {
    $connect = parent::connect();
    parent::set_names();

    $sql = "UPDATE tm_product
              SET
              state = 0,
              date_delete = now()
              WHERE product_id = ?";
    $sql = $connect->prepare($sql);
    $sql->bindValue(1, $product_id);
    $sql->execute();
    return $result = $sql->fetchAll();
  }

  //INSERT PRODUCT
  public function insertProduct($product_name, $product_desc)
  {
    $connect = parent::connect();
    parent::set_names();

    $sql = "INSERT INTO tm_product (product_name, product_description, date_create) VALUES (?, ?, now());";
    $sql = $connect->prepare($sql);
    $sql->bindValue(1, $product_name);
    $sql->bindValue(2, $product_desc);
    $sql->execute();
    return $result = $sql->fetchAll();
  }

  //UPDATE PRODUCT
  public function updateProduct($product_id, $product_name, $product_desc)
  {
    $connect = parent::connect();
    parent::set_names();

    $sql = "UPDATE tm_product
              SET
              date_update = now(),
              product_name = ?,
              product_description = ?
              WHERE product_id = ?";
    $sql = $connect->prepare($sql);
    $sql->bindValue(1, $product_name);
    $sql->bindValue(2, $product_desc);
    $sql->bindValue(3, $product_id);
    $sql->execute();
    return $result = $sql->fetchAll();
  }
}
