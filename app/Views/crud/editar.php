<div class="card card-primary rounded-0">
    <div class="card-header">
        <h4 class="text-muted">Agregar nuevo Producto</h4>
    </div>
    <div class="card-body">
        <div class="contianer-fluid">
            <form action="<?= base_url('home/guardar') ?>" method="POST" id="create-form">
                <input type="hidden" name="id_producto" value="<?= $producto['id'] ?>">
                <div class="mb-3">
                    <label for="" class="control-label">Nombre del producto</label>
                    <div class="input-group">
                        <input type="text"
                               autofocus class="form-control form-control-border" id="nombre"
                               name="nombre"
                               value="<?= isset($producto['nombre']) ? $producto['nombre'] : '' ?>"
                               required="required">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="" class="control-label">Referencia</label>
                    <div class="input-group">
                        <input type="text"
                               autofocus class="form-control form-control-border" id="referencia"
                               value="<?= isset($producto['referencia']) ? $producto['referencia'] : '' ?>"
                               name="referencia">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="" class="control-label">Precio</label>
                    <div class="input-group">
                        <input type="text"
                               autofocus class="form-control form-control-border" id="precio"
                               value="<?= isset($producto['precio']) ? $producto['precio'] : '' ?>"
                               name="precio">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="" class="control-label">Peso</label>
                    <div class="input-group">
                        <input type="text"
                               autofocus class="form-control form-control-border" id="peso"
                               value="<?= isset($producto['peso']) ? $producto['peso'] : '' ?>"
                               name="peso">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="gender" class="control-label">Categoría</label>
                    <div class="input-group">
                        <select name="categoria" id="gender" class="form-select form-select-border" required>
                            <option>Seleccione una categoría</option>
                            <?php if (count($categorias) > 0): ?>
                                <?php foreach ($categorias as $categoria): ?>
                                    <option <?= isset($producto['id_categoria']) && $producto['id_categoria'] == $categoria->id ? 'selected' : '' ?>
                                        value="<?= $categoria->id ?>"><?= $categoria->nombre ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="" class="control-label">Stock</label>
                    <div class="input-group">
                        <input type="number"
                               autofocus class="form-control form-control-border" id="stock"
                               value="<?= isset($producto['stock']) ? $producto['stock'] : '' ?>"
                               name="stock">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card-footer text-center">
        <button class="btn btn-primary" form="create-form" type="submit"><i class="fa fa-save"></i> Guardar
        </button>
        <button class="btn btn-secondary" form="create-form" type="reset"><i class="fa fa-times"></i> Cancelar</button>
    </div>
</div>