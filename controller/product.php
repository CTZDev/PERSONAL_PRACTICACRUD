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
      $sub_arr[] = $row["product_name"];
      $sub_arr[] = '<button type="button" onClick="update(' . $row["product_id"] . ');" id="' . $row["product_id"] . '" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-edit"></i></div></button>';
      $sub_arr[] = '<button type="button" onClick="delete(' . $row["product_id"] . ');" id="' . $row["product_id"] . '" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-trash"></i></div></button>';
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
}
