<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductoStock extends Model
{
    protected $table = 'producto_stock';
    protected $allowedFields = ['cantidad'];
}
