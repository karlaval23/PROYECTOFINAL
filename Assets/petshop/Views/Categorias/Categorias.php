<?= headerAdmin();
navAdmin();
getModal("ModalsCategorias", $data);
?>
<main id="main" class="main">
    <div class="card">
        <div class="card-body">

            <div class="app-title card-title">
                <div class=" d-flex justify-content-between">
                    <h1>
                        <i class="bi bi-box-seam"></i> <?= $data["page_title"]; ?>
                    </h1>
                    <button class="btn btn-primary" type="button" onclick="openModalCategoria();"><i
                            class="bi bi-plus-lg"></i>
                        Nueva Categoría
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="tableCategorias">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Categoria</th>
                                            <th>Descripción</th>
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
