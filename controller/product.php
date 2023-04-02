<?php

require_once("../config/connection.php");
require_once("../models/Product.php");

$product = new Product();

switch ($_GET["op"]) {
  case "listAll":
    $dataList = $product->getProduct();
    $data = array();

    foreach ($dataList as $row) {
      $sub_arr = array();
      $sub_arr[] = $row["category_name"];
      $sub_arr[] = $row["product_name"];
      $sub_arr[] = $row["product_description"];
      $sub_arr[] = $row["product_stock"];
      $sub_arr[] = '<button type="button" onClick="updateProduct(' . $row["product_id"] . ');" id="' . $row["product_id"] . '" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-edit"></i></div></button>';
      $sub_arr[] = '<button type="button" onClick="deleteProduct(' . $row["product_id"] . ');" id="' . $row["product_id"] . '" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-trash"></i></div></button>';
      $data[] = $sub_arr;
    }


    $result = array(
      "sEcho" => 1,
      "iTotalRecords" => count($data),
      "iTotalDisplayRecords" => count($data),
      "aaData" => $data
    );

    echo json_encode($result);
    break;

  case "addProduct":
    $dataList = $product->getProductByID($_POST["product_id"]);

    //SAVE NEW PRODUCT
    if (empty($_POST["product_id"])) {
      if (is_array($dataList) and count($dataList) == 0) {
        $product->insertProduct($_POST["category_id"], $_POST["product_name"], $_POST["product_description"], $_POST["product_stock"]);
      }
    }
    // UPDATE PRODUCT
    else {
      $product->updateProduct($_POST["product_id"], $_POST["category_id"], $_POST["product_name"], $_POST["product_description"], $_POST["product_stock"]);
    }
    break;

  case "showProductToEdit":
    $dataList = $product->getProductByID($_POST["product_id"]);

    //SHOW ALL PRODUCTS
    if (is_array($dataList) and count($dataList) > 0) {
      foreach ($dataList as $row) {
        $output["product_id"] = $row["product_id"];
        $output["category_id"] = $row["category_id"];
        $output["product_name"] = $row["product_name"];
        $output["product_description"] = $row["product_description"];
        $output["product_stock"] = $row["product_stock"];
      }

      echo json_encode($output);
    }

    break;

  case "delete":
    $product->deleteProductByID($_POST["product_id"]);
    break;
}
