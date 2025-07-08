
<div class="modal fade" id="modalFormUsuario" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titleModal">Nuevo Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formUsuario" name="formUsuario">
                    <input type="hidden" id="idUsuario" name="idUsuario" value="">
                    
                    <div class="mb-3">
                        <label class="form-label" for="txtNombre">Nombre</label>
                        <input id="txtNombre" name="txtNombre" class="form-control" type="text" placeholder="Ingrese nombre completo" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="txtEmail">Email</label>
                        <input id="txtEmail" name="txtEmail" class="form-control" type="email" placeholder="Ingrese email" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="txtTelefono">Teléfono</label>
                        <input id="txtTelefono" name="txtTelefono" class="form-control" type="text" placeholder="Ingrese teléfono" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="txtPassword">Contraseña</label>
                        <input id="txtPassword" name="txtPassword" class="form-control" type="password" placeholder="Ingrese contraseña" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="listRol">Rol</label>
                        <select id="listRol" name="listRol" class="form-control">
                            <!-- Opciones de rol se deben cargar desde la base de datos -->
                        </select>
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
