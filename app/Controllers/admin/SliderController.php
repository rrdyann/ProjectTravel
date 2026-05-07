<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SliderModel;

class SliderController extends BaseController
{
    public function index()
    {
        $slider = new SliderModel();
        $data['slider'] = $slider->findAll();
        return view('admin/slider/index', $data);
    }

    public function upload()
    {
        return view('admin/slider/upload');
    }

    public function save()
    {
        $file = $this->request->getFile('gambar');

        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('img/slider', $newName);

            $slider = new SliderModel();
            $slider->save([
                'gambar' => $newName,
                'status' => 'aktif'
            ]);
        }

        return redirect()->to('/admin/slider');
    }

    public function delete($id)
    {
        $slider = new SliderModel();
        $data = $slider->find($id);

        if ($data && file_exists('img/slider/' . $data['gambar'])) {
            unlink('img/slider/' . $data['gambar']);
        }

        $slider->delete($id);

        return redirect()->to('/admin/slider');
    }
}
