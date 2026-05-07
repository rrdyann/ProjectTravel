<?php
namespace App\Models;

use CodeIgniter\Model;

class KursiModel extends Model
{
    protected $table = 'kursi_pesanan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['mobil_id','tanggal','kursi','nama_pemesan'];
}
