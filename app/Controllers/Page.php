<?php
namespace App\Controllers;

use App\Models\BantuanModel;
use App\Models\TentangModel;

class Page extends BaseController
{   
    public function bantuan()
{
    $model = new BantuanModel();
    $bantuan = $model->orderBy('id', 'DESC')->first();

    return view('tambahan/bantuan', [
        'bantuan' => $bantuan
    ]);
}


    public function tentang()
    {
        $model = new TentangModel();
        $about = $model->orderBy('id', 'DESC')->first();

        return view('tambahan/tentang', [
            'about' => $about
        ]);
    }

 
}