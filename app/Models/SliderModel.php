<?php
namespace App\Models;

use CodeIgniter\Model;

class SliderModel extends Model
{
    protected $table = 'slider_mobil';
    protected $primaryKey = 'id_slider';
    protected $allowedFields = ['gambar', 'status'];

    public function getActiveSlider()
    {
        return $this->where('status', 'aktif')->findAll();
    }
}
