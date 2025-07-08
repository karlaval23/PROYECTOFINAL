<!-- <div class="modal fade" id="modalFormPermisos" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">Permisos Roles: <?= $data['rol']; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="title">
            <form action="" id="formPermisos" name="formPermisos">
              <input type="hidden" id="idrol" name="idrol" value="<?= $data['idrol']; ?>" required="">
              <table class="table caption-top">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Módulo</th>
                    <th>Ver</th>
                    <th>Crear</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $modulos = $data['modulos'];
                  for ($i = 0; $i < count($modulos); $i++) {

                    $permisos = $modulos[$i]['permisos'];
                    $rCheck = $permisos['r'] == 1 ? " checked " : "";
                    $wCheck = $permisos['w'] == 1 ? " checked " : "";
                    $uCheck = $permisos['u'] == 1 ? " checked " : "";
                    $dCheck = $permisos['d'] == 1 ? " checked " : "";
                    $idmod = $modulos[$i]['idmodulo'];
                    ?>
                    <tr>
                      <td>
                        <?= $no; ?>
                        <input type="hidden" id="modulos[<?= $i; ?>][idmodulo]" value="<?= $idmod ?>" required>
                      </td>

                      <td>
                        <?= $modulos[$i]['titulo']; ?>
                      </td>

                      <td>
                        <input type="checkbox" class="btn-check" id="modulos[<?= $i; ?>][r]" name="modulos[<?= $i; ?>][r]"
                          <?= $rCheck ?>>
                        <label class="btn btn-outline-success btn-lg" for="modulos[<?= $i; ?>][r]"> </label><br>
                      </td>

                      <td>
                        <input type="checkbox" class="btn-check" id="modulos[<?= $i; ?>][w]" name="modulos[<?= $i; ?>][w]"
                          <?= $wCheck ?>>
                        <label class="btn btn-outline-success btn-lg" for="modulos[<?= $i; ?>][w]"> </label><br>
                      </td>

                      <td>
                        <input type="checkbox" class="btn-check" id="modulos[<?= $i; ?>][u]" name="modulos[<?= $i; ?>][u]"
                          <?= $uCheck ?>>
                        <label class="btn btn-outline-success btn-lg" for="modulos[<?= $i; ?>][u]"> </label><br>
                      </td>

                      <td>
                        <input type="checkbox" class="btn-check" id="modulos[<?= $i; ?>][d]" name="modulos[<?= $i; ?>][d]"
                          <?= $dCheck ?>>
                        <label class="btn btn-outline-success btn-lg" for="modulos[<?= $i; ?>][d]"> </label><br>
                      </td>

                    </tr>
                    <?php $no++;
                  }
                  ?>
                </tbody>
              </table>



            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" onclick="fntSavePermisos($idmod)">Guardar</button>
          </div>


        </div>
      </div>
    </div>
  </div>
</div> -->


<div class="modal fade" id="modalFormPermisos" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Permisos Roles: <?= $data['rol']; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <form action="" id="formPermisos" name="formPermisos">
            <input type="hidden" id="idrol" name="idrol" value="<?= $data['idrol']; ?>" required="">
            <table class="table caption-top">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Módulo</th>
                  <th>Ver</th>
                  <th>Crear</th>
                  <th>Actualizar</th>
                  <th>Eliminar</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $numberOrder = 1;
                $modulos = $data['modulos'];
                for ($i = 0; $i < count($modulos); $i++) {

                  $permisos = $modulos[$i]['permisos'];
                  $rCheck = $permisos['r'] == 1 ? " checked " : "";
                  $wCheck = $permisos['w'] == 1 ? " checked " : "";
                  $uCheck = $permisos['u'] == 1 ? " checked " : "";
                  $dCheck = $permisos['d'] == 1 ? " checked " : "";
                  $idmod = $modulos[$i]['idmodulo'];
                  ?>
                  <tr>
                    <td>
                      <?= $numberOrder; ?>
                      <input type="hidden" id="modulos[<?= $i; ?>][idmodulo]" name="modulos[<?= $i; ?>][idmodulo]" value="<?= $idmod ?>" required>
                    </td>

                    <td>
                      <?= $modulos[$i]['titulo']; ?>
                    </td>

                    <td>
                      <input type="checkbox" class="btn-check" id="modulos[<?= $i; ?>][r]" name="modulos[<?= $i; ?>][r]"
                        <?= $rCheck ?>>
                      <label class="btn btn-outline-success btn-lg" for="modulos[<?= $i; ?>][r]"> </label><br>
                    </td>

                    <td>
                      <input type="checkbox" class="btn-check" id="modulos[<?= $i; ?>][w]" name="modulos[<?= $i; ?>][w]"
                        <?= $wCheck ?>>
                      <label class="btn btn-outline-success btn-lg" for="modulos[<?= $i; ?>][w]"> </label><br>
                    </td>

                    <td>
                      <input type="checkbox" class="btn-check" id="modulos[<?= $i; ?>][u]" name="modulos[<?= $i; ?>][u]"
                        <?= $uCheck ?>>
                      <label class="btn btn-outline-success btn-lg" for="modulos[<?= $i; ?>][u]"> </label><br>
                    </td>

                    <td>
                      <input type="checkbox" class="btn-check" id="modulos[<?= $i; ?>][d]" name="modulos[<?= $i; ?>][d]"
                        <?= $dCheck ?>>
                      <label class="btn btn-outline-success btn-lg" for="modulos[<?= $i; ?>][d]"> </label><br>
                    </td>
                    <td>
                      <input type="checkbox" id="control-<?= $i; ?>" class="control-checkbox">
                    </td>

                  </tr>
                  <?php $numberOrder++;
                }
                ?>
              </tbody>
            </table>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnGuardar" onclick="fntSavePermisos()">Guardar</button>
        <!-- <button type="button" class="btn btn-primary" id="btnGuardar" >Guardar</button> -->
      </div>
    </div>
  </div>
</div>