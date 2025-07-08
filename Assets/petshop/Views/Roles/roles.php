<?=
    headerAdmin();
navAdmin();
getModal("ModalsRoles", $data);
?>
<main id="main" class="main">
    <div class="card">
        <div class="card-body">

            <div class="app-title card-title">
                <div class=" d-flex justify-content-between">
                    <h1>
                        <i class="bi bi-speedometer"></i> <?= $data["page_title"]; ?>
                    </h1>
                    <button class="btn btn-primary" type="button" onclick="openModal();"><i class="bi bi-plus-lg"></i>
                        Nuevo
                    </button>
                </div>
                <!-- <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
                <li class="breadcrumb-item"><a href="<?= base_url(); ?>roles"><?= $data["page_title"]; ?></a></li>
            </ul> -->
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <div class="table-responsive">
                                <!-- El archivo Function hacer referencia a este seccion en el primer fragmento -->
                                <table class="table table-hover table-bordered" id="tableRoles">
                                    <thead>
                                        <tr>
                                            <th>IdRol</th>
                                            <th>Nombre Rol</th>
                                            <th>Descripción</th>
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
</main>

<!-- Page specific javascripts-->

<?= footerAdmin(); ?>