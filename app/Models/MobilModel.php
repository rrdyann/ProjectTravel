<?php
namespace App\Models;

use CodeIgniter\Model;

class MobilModel extends Model
{
    protected $table = 'mobil';
    protected $primaryKey = 'mobil_id';
    protected $allowedFields = ['nama_mobil', 'gambar', 'kapasitas', 'harga'];
}
