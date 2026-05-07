<?php

namespace App\Models;

use CodeIgniter\Model;

class BantuanModel extends Model
{
    protected $table = 'bantuann';
    protected $allowedFields = ['pembuka', 'isi', 'pusat', 'claim'];
    public $primaryKey = 'id';
    protected $useAutoIncrement = false;
}