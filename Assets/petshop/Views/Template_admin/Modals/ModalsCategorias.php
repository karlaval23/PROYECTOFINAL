<div class="modal fade" id="modalFormCategoria" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titleModal">Nueva categoría</h5>
                <button type="button" class="btn-close" name="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formCategoria" name="formCategoria">
                    <input type="hidden" id="idCategoria" name="idCategoria" value="">

                    <div class="mb-3">
                        <label class="form-label" for="txtNombre">Nombre</label>
                        <input id="txtNombre" name="txtNombre" class="form-control" type="text" placeholder="Ingrese nombre">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="txtDescripcion">Descripción</label>
                        <textarea id="txtDescripcion" name="txtDescripcion" class="form-control" rows="4" placeholder="Ingrese descripción"></textarea>
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
