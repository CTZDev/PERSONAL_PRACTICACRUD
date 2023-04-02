<?php

require_once("../config/connection.php");
require_once("../models/Category.php");

$category = new Category();

switch ($_GET["op"]) {
  case "cmbCategory":
    $dataList = $category->getCategory();

    if (is_array($dataList) and count($dataList) > 0) {
      $html = "<option label='Seleccione'></option>";
      foreach ($dataList as $row) {
        $html .= "<option value='" . $row["category_id"] . "'>" . $row["category_name"] . "</option>";
      }

      echo $html;
    }
}
