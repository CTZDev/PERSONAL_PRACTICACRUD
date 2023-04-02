<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once("../../header.php") ?>
  <title>Categoria de Productos</title>
</head>

<body>
  <?php require_once("../../mainLeftPanel.php") ?>
  <?php require_once("../../mainHeadPanel.php") ?>
  <?php require_once("../../mainRightPanel.php") ?>

  <!-- ########## START: MAIN PANEL ########## -->
  <div class="br-mainpanel">
    <div class="br-pageheader pd-y-15 pd-l-20">
      <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="">Mantenimiento</a>
        <span class="breadcrumb-item active">Categoría de Productos</span>
      </nav>
    </div>
    <!-- br-pageheader -->
    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
      <h4 class="tx-gray-800 mg-b-5">Categoría de Productos</h4>
      <p class="mg-b-0">Desde esta ventana podra dar mantenimiento a la categoría de productos</p>
    </div>

    <div class="br-pagebody">
      <div class="br-section-wrapper">
        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Categoría de Productos</h6>
        <button id="btn_addEditProduct" class="btn btn-outline-primary btn-block mg-b-10">Nuevo Registro</button>

        <div class="table-wrapper">
          <table id="tbl_categoryProduct" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-15p">Nombre</th>
                <th class="wd-15p"></th>
                <th class="wd-20p"></th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- br-mainpanel -->
  <!-- ########## END: MAIN PANEL ########## -->

</body>

</html>