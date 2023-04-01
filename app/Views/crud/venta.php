<?php if (!$stock): ?>
    <div class="alert alert-danger rouded-0">
        <div class="d-flex">
            <div class="col-11">Producto no cuenta con stock.</div>
            <div class="col-1 text-end">
                <a href="javascript:void(0)" onclick="$(this).closest('.alert').remove()"
                   class="text-muted text-decoration-none">
                    <svg class="svg-inline--fa fa-xmark" aria-hidden="true" focusable="false" data-prefix="fas"
                         data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                         data-fa-i2svg="">
                        <path fill="currentColor"
                              d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
<?php endif; ?>
<div class="card card-primary rounded-0">
    <div class="card-header">
        <h4 class="text-muted">Vender Producto</h4>
    </div>
    <div class="card-body">
        <div class="contianer-fluid">
            <form action="<?= base_url('home/guardar_venta') ?>" method="POST" id="create-form">
                <input type="hidden" name="id_producto" value="<?= $producto['id'] ?>">
                <div class="mb-3">
                    <label for="" class="control-label">Nombre del producto</label>
                    <div class="input-group">
                        <input type="text"
                               readonly
                               class="form-control form-control-border" id="nombre"
                               name="nombre"
                               value="<?= $producto['nombre'] ?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="" class="control-label">Cantidad</label>
                    <div class="input-group">
                        <input type="number"
                               autofocus class="form-control form-control-border"
                               id="cantidad" <?= !$stock ? 'readonly' : '' ?>
                               name="cantidad">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card-footer text-center">
        <button class="btn btn-primary" <?= !$stock ? 'disabled' : '' ?> form="create-form" type="submit"><i
                class="fa fa-save"></i> Registrar
        </button>
        <button class="btn btn-secondary" form="create-form" type="reset"><i class="fa fa-times"></i> Cancelar</button>
    </div>
</div>