<!-- Modal -->
<div class="modal fade" id="mod_mantenimiento" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" style="width: 1000px;">
    <div class="modal-content">
      <form method="post" id="md_form_product">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="mod_title">Titulo</h1>
        </div>
        <div class="modal-body">
          <input type="hidden" id="product_id" name="product_id">

          <div class="form-group">
            <label class="form-label" for="category_id">Categoría</label>
            <select class="form-control select2" id="category_id" name="category_id" data-placeholder="Seleccione" style="width: 100%;"></select>
          </div>

          <div class="form-group">
            <label for="product_name" class="form-label">Nombre: </label>
            <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Nombre del producto" required>
          </div>
          <div class="form-group">
            <label for="product_description" class="form-label">Descripción: </label>
            <textarea rows="4" class="form-control" name="product_description" id="product_description" placeholder="Descripción del producto" required></textarea>
          </div>
          <div class="form-group">
            <label for="product_stock" class="form-label">Stock: </label>
            <input type="text" class="form-control" name="product_stock" id="product_stock" placeholder="Ingresa el stock disponible" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" name="action" id="#" value="add" class="btn btn-primary btn-rounded">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>