<?php
namespace App\Models;

use CodeIgniter\Model;

class RuteModel extends Model
{
    protected $table = 'rute';
    protected $primaryKey = 'id_rute';
    protected $allowedFields = ['asal','tujuan','jam_berangkat','jam_tiba','harga', 'nama_rute'];
}
