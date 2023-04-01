<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductoVentas extends Model
{
    protected $table = 'producto_ventas';
    protected $allowedFields = ['id_producto', 'vendidos'];
}
