<div class="modal fade" id="modalFormProducto" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titleModal">Nuevo Producto</h5>
                <button type="button" class="btn-close" name="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formProducto" name="formProducto">
                    <input type="hidden" id="idProducto" name="idProducto" value="">

                    <div class="mb-3">
                        <label class="form-label" for="idProveedor">Proveedor</label>
                        <select id="listProveedor" name="listProveedor" class="form-control">
                            <!-- Aquí puedes agregar opciones de proveedores dinámicamente si lo deseas -->
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="idCategoria">Categoría</label>
                        <select id="listCategoria" name="listCategoria" class="form-control">
                            <!-- Aquí puedes agregar opciones de categorías dinámicamente si lo deseas -->
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="txtNombre">Nombre</label>
                        <input id="txtNombre" name="txtNombre" class="form-control" type="text" placeholder="Ingrese nombre">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="txtDescripcion">Descripción</label>
                        <textarea id="txtDescripcion" name="txtDescripcion" class="form-control" rows="4" placeholder="Ingrese descripción"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="txtPrecio">Precio</label>
                        <input id="txtPrecio" name="txtPrecio" class="form-control" type="text" placeholder="Ingrese precio">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="txtStock">Stock</label>
                        <input id="txtStock" name="txtStock" class="form-control" type="text" placeholder="Ingrese stock">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="txtImagen">Imagen</label>
                        <input id="txtImagen" name="txtImagen" class="form-control" type="text" placeholder="Ingrese URL de la imagen">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="listStatus">Estado</label>
                        <select id="listStatus" name="listStatus" class="form-control">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>

                    <div class="tile-footer">
                        <button id="btnActionForm" name="btnActionForm" class="btn btn-primary" type="submit">
                            <i class="bi bi-check-circle-fill me-2"></i>
                            <span id="btnText">Guardar</span>
                        </button>&nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="#" data-bs-dismiss="modal">
                            <i class="bi bi-x-circle-fill me-2"></i>Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
