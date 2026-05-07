<?php

namespace App\Models;

use CodeIgniter\Model;

class TentangModel extends Model
{
    protected $table = 'tentangg';
    protected $allowedFields = ['pembuka', 'isi', 'penutup', 'claim'];
    public $primaryKey = 'id';
    protected $useAutoIncrement = false;
}