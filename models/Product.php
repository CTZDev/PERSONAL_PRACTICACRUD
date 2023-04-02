<?php
class Product extends Connection
{
  //ALL PRODUCTS
  public function getProduct()
  {
    $connect = parent::connect();
    parent::set_names();

    $sql = "SELECT
      tprod.product_id,
      tprod.category_id,
      tprod.product_name,
      tprod.product_description,
      tprod.product_stock,
      tcat.category_name
      FROM tm_product AS tprod
      INNER JOIN tm_category AS tcat
      ON tprod.category_id = tcat.category_id
      WHERE tprod.state = 1";
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
  public function insertProduct($category_id, $product_name, $product_desc, $product_stock)
  {
    $connect = parent::connect();
    parent::set_names();

    $sql = "INSERT INTO tm_product (category_id, product_name, product_description, product_stock, date_create) VALUES (?, ?, ?, ?, now());";
    $sql = $connect->prepare($sql);
    $sql->bindValue(1, $category_id);
    $sql->bindValue(2, $product_name);
    $sql->bindValue(3, $product_desc);
    $sql->bindValue(4, $product_stock);
    $sql->execute();
    return $result = $sql->fetchAll();
  }

  //UPDATE PRODUCT
  public function updateProduct($product_id, $category_id, $product_name, $product_desc, $product_stock)
  {
    $connect = parent::connect();
    parent::set_names();

    $sql = "UPDATE tm_product
              SET
              date_update = now(),
              category_id = ?,
              product_name = ?,
              product_description = ?,
              product_stock = ?
              WHERE product_id = ?";
    $sql = $connect->prepare($sql);
    $sql->bindValue(1, $category_id);
    $sql->bindValue(2, $product_name);
    $sql->bindValue(3, $product_desc);
    $sql->bindValue(4, $product_stock);
    $sql->bindValue(5, $product_id);
    $sql->execute();
    return $result = $sql->fetchAll();
  }
}
