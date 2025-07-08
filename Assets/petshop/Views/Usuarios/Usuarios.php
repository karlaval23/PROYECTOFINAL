<?= 
    headerAdmin();
    navAdmin();
    getModal("ModalsUsuarios", $data);
?>
<main id="main" class="main">
    <div class="card">
        <div class="card-body">

            <div class="app-title card-title">
                <div class="d-flex justify-content-between">
                    <h1>
                        <i class="bi bi-person-circle"></i> <?= $data["page_title"]; ?>
                    </h1>
                    <button class="btn btn-primary" type="button" onclick="openModalUsuario();"><i class="bi bi-plus-lg"></i>
                        Nuevo Usuario
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="tableUsuarios">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <th>Telefono</th>
                                            <th>Rol</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="contentAjax">

            </div>
        </div>
    </div>
</main>

<!-- Page specific javascripts-->

<?= footerAdmin(); ?>
