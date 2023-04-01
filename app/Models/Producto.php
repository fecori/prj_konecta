<?php

namespace App\Models;

use CodeIgniter\Model;

class Producto extends Model
{
    protected $table = 'producto';
    protected $allowedFields = ['nombre', 'referencia', 'precio', 'peso', 'id_categoria', 'stock'];
}
