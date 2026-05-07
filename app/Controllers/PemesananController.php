<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MobilModel;
use App\Models\RuteModel;
use App\Models\KursiModel;
use App\Models\PesananModel;

class PemesananController extends BaseController
{
    public function index()
    {
        return view('pesanan/pesanan');
    }

    public function simpan()
    {
        $session = session();
        $session->set([
            'nama'      => $this->request->getPost('nama'),
            'tanggal'   => $this->request->getPost('tanggal'),
            'penumpang' => $this->request->getPost('penumpang'),
        ]);

        return redirect()->to('/pesanan/pilih_rute');
    }

    public function pilihRute()
    {
        $ruteModel = new RuteModel();
        $data['rute'] = $ruteModel->findAll();

        return view('pesanan/pilih_rute', $data);
    }

    public function simpanRute()
    {
        $id_rute = $this->request->getPost('rute');

        session()->set('id_rute', $id_rute);

        return redirect()->to('/pesanan/pilih_mobil');
    }

    public function pilihMobil()
    {
        $model = new MobilModel();
        $data['mobil'] = $model->findAll();

        return view('pesanan/pilih_mobil', $data);
    }

    public function simpanMobil($mobil_id)
    {
        session()->set('mobil_id', $mobil_id);

        return redirect()->to('/pesanan/pilih_kursi');
    }

    public function pilihKursi()
    {
        $mobil_id = session()->get('mobil_id');
        $tanggal  = session()->get('tanggal');

        $kursiModel = new KursiModel();
        $booked = [];
        if ($mobil_id && $tanggal) {
            $rows = $kursiModel->where('mobil_id', $mobil_id)
                ->where('tanggal', $tanggal)
                ->findAll();
            $booked = array_column($rows, 'kursi');
        }

        return view('pesanan/pilih_kursi', ['booked' => $booked]);
    }

    public function simpanKursi()
    {
        $kursiRaw = $this->request->getPost('kursi');
        if (!$kursiRaw) {
            return redirect()->back()->with('error', 'Pilih minimal satu kursi.');
        }

        $session = session();
        $mobil_id = $session->get('mobil_id');
        $tanggal  = $session->get('tanggal');

        $kursiModel = new KursiModel();

        $kursiList = array_map('trim', explode(',', $kursiRaw));

        foreach ($kursiList as $k) {
            $exist = $kursiModel
                ->where('mobil_id', $mobil_id)
                ->where('tanggal', $tanggal)
                ->where('kursi', $k)
                ->first();

            if (!$exist) {
                $kursiModel->insert([
                    'mobil_id' => $mobil_id,
                    'tanggal'  => $tanggal,
                    'kursi'    => $k,
                    'nama_pemesan' => $session->get('nama')
                ]);
            }
        }

        $session->set('kursi', $kursiRaw);

        return redirect()->to('/pesanan/konfirmasi');
    }

    public function konfirmasi()
    {
        $session = session();

        $mobilModel = new MobilModel();
        $mobil = $mobilModel->find($session->get('mobil_id'));

        $ruteModel = new RuteModel();
        $rute = $ruteModel->find($session->get('id_rute'));

        if(!$rute){
            dd("ERROR: rute tidak ditemukan. id_rute = ", $session->get('id_rute'));
        }

        $total = $rute['harga'] * $session->get('penumpang');
        $session->set('total', $total);

        $session->set('titik_jemput', $this->request->getPost('titik_jemput'));



        return view('pesanan/konfirmasi', [
            'data'  => $session->get(),
            'mobil' => $mobil,
            'rute'  => $rute,
            'total' => $total
        ]);
    }

    public function simpanDatabase()
    {
        $session = session();
        $pesananModel = new PesananModel();

        $file = $this->request->getFile('gambar');

        if ($file && $file->isValid()) {
            $namaFile = $file->getRandomName();
            $file->move('img', $namaFile);
        } else {
            $namaFile = null;
        }

        $titik = $this->request->getPost('titik_jemput');
        $session->set('titik_jemput', $titik);

        $insert = [
            'nama'         => $session->get('nama'),
            'tanggal'      => $session->get('tanggal'),
            'penumpang'    => $session->get('penumpang'),
            'id_rute'      => $session->get('id_rute'),
            'mobil_id'     => $session->get('mobil_id'),
            'kursi'        => $session->get('kursi'),
            'titik_jemput' => $titik,
            'harga'        => $session->get('total'),
            'gambar'       => $namaFile
        ];

        $pesananModel->insert($insert);
        session()->setFlashdata('sukses', 'Pembayaran berhasil!');
        return redirect()->to('/pesanan/tiket');
    }


    public function tiket()
{
    $session = session();

    $pesananModel = new PesananModel();
    $ruteModel = new RuteModel();
    $mobilModel = new MobilModel();

    $rute = $ruteModel->find($session->get('id_rute'));

    $data = $session->get();
    $data['tujuan'] = $rute['tujuan'] ?? 'Tidak ditemukan';

    $mobil = $mobilModel->find($data['mobil_id'] ?? null);
    $data['nama_mobil'] = $mobil['nama_mobil'] ?? 'Tidak ditemukan';

    $data['titik_jemput'] = $session->get('titik_jemput') ?? 'Tidak ada';

    return view('pesanan/tiket', ['data' => $data]);
}

}

