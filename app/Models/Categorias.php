<?php

namespace App\Models;

use CodeIgniter\Model;

class Categorias extends Model
{
    protected $table = 'categorias';
    protected $allowedFields = ['nombre'];
}
