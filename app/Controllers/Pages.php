<?php

namespace App\Controllers;

use App\Models\SliderModel;

class Pages extends BaseController
{
    public function index()
    {
        $sliderModel = new SliderModel();
        $data['slider'] = $sliderModel->findAll();

        echo view('layout/header');
        echo view('layout/home', $data);
        echo view('layout/footer');
    }
}
