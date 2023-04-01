<div class="card card-outline card-primary rounded-0">
    <div class="card-header">
        <h4 class="mb-0">Listado de productos</h4>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <table id="lista-productos" class="table table-bordered">
                <colgroup>
                    <col width="10%">
                    <col width="40%">
                    <col width="40%">
                    <col width="10%">
                </colgroup>
                <thead>
                <tr class="bg-gradient bg-primary text-light">
                    <th class="py-1 text-center">#</th>
                    <th class="py-1 text-center">Nombre</th>
                    <th class="py-1 text-center">Referencia</th>
                    <th class="py-1 text-center">Precio</th>
                    <th class="py-1 text-center">Peso</th>
                    <th class="py-1 text-center">Categoría</th>
                    <th class="py-1 text-center">Stock</th>
                    <th class="py-1 text-center">Vendidos</th>
                    <th class="py-1 text-center"></th>
                </tr>
                </thead>
                <tbody>
                <?php if (count($productos) > 0): ?>
                    <?php foreach ($productos as $producto): ?>
                        <tr>
                            <th class="p-1 align-middle text-center"><?= $producto->id ?></th>
                            <td class="p-1 align-middle"><?= $producto->nombre ?></td>
                            <td class="p-1 align-middle"><?= $producto->referencia ?></td>
                            <td class="p-1 align-middle text-center"><?= $producto->precio ?></td>
                            <td class="p-1 align-middle text-center"><?= $producto->peso ?></td>
                            <td class="p-1 align-middle"><?= $producto->nombre_categoria ?></td>
                            <td class="p-1 align-middle text-center"><?= $producto->stock ?></td>
                            <td class="p-1 align-middle text-center"><?= $producto->vendidos ? $producto->vendidos : '0' ?></td>
                            <td class="p-1 align-middle text-center">
                                <div class="btn-group btn-group-sm">
                                    <a href="<?= base_url('home/venta/' . $producto->id) ?>"
                                       class="btn btn-default bg-gradient-light border text-dark rounded-0" title="Vender Producto">
                                        <i class="fa fa-shopping-bag"></i>
                                    </a>
                                    <a href="<?= base_url('home/editar/' . $producto->id) ?>"
                                       class="btn btn-primary rounded-0" title="Editar Producto">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url('home/borrar/' . $producto->id) ?>"
                                       onclick="if(confirm('¿Esta seguro que desea eliminar este producto?') === false) event.preventDefault()"
                                       class="btn btn-danger rounded-0" title="Borrar Producto">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>