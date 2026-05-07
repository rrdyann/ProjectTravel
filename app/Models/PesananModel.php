<?php
namespace App\Models;

use CodeIgniter\Model;

class PesananModel extends Model
{
    protected $table = 'pesanan';
    protected $primaryKey = 'id_pesanan';
    protected $allowedFields = [
        'nama','tanggal','penumpang','id_rute',
        'mobil_id','kursi','titik_jemput','gambar','harga'
    ];

    public function PesananBulan()
    {
    $bulan = date('m');
    $tahun = date('Y');

    return $this->where('MONTH(tanggal)', $bulan)
                ->where('YEAR(tanggal)', $tahun)
                ->countAllResults();
    }

}

