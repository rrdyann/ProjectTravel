<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket Anda</title>

<style>
body {
    margin: 0;
    font-family: Poppins, sans-serif;
    background: linear-gradient(180deg, #4F8EF7, #8557F0);
    min-height: 100vh;
    display: flex;
    justify-content: center;
    padding-top: 40px;
}

.container {
    max-width: 750px;
    width: 100%;
    text-align: center;
}

h1 {
    color: #fff;
    font-size: 30px;
    margin-bottom: 20px;
}

.card {
    width: 100%;
    background: #fff;
    border-radius: 20px;
    padding: 30px 40px;
    text-align: left;
    box-shadow: 0 10px 25px rgba(0,0,0,0.25);
    position: relative;
}

.header, .logo {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.brand-title { font-size: 14px; }
.brand-small { font-size: 11px; color: #666; }

.logo-area { text-align: center; }
.logo-area img { width: 48px; margin-bottom: 5px; }
.logo-area .label { font-size: 12px; }

.date-top {
    text-align: right;
    font-size: 12px;
    margin-top: 15px;
    font-weight: bold;
    color: #333;
}

hr {
    border: 0;
    border-top: 1px solid #ccc;
    margin: 15px 0;
}

.row { margin-bottom: 18px; }
.label { font-size: 13px; color: #555; }

.value {
    margin-top: 4px;
    font-size: 15px;
    font-weight: 600;
    color: #222;
    border-bottom: 1px solid #b9b9b9;
    padding-bottom: 5px;
    width: 60%;
}

.footer-img { width: 250px; margin-top: 20px; }

.total {
    text-align: right;
    font-weight: bold;
    margin: 25px 10px 0 0;
}

.back-btn {
    position: absolute;
    left: 20px;
    top: 20px;
    font-size: 25px;
    color: #fff;
    text-decoration: none;
}

.logo {
    flex-direction: column;
    gap: 10px;
}

.logo img {
    width: 40px;
    border-radius: 50%;
}

.button {
    background : #ffffff;
    padding:10px 20px;
    border-radius:10px;
    font-weight:bold;
    text-decoration:none;
    color:#4F8EF7;
}

.alert-sukses {
    background:#d1fae5;
    color:#065f46;
    padding:12px 18px;
    border-radius:10px;
    margin-bottom:18px;
    font-weight:bold;
    text-align:center;
}
</style>
</head>
<body>

<a href="javascript:history.back()" class="back-btn">←</a>

<div class="container">
    <h1>Tiket Anda</h1>

    <?php if (session()->getFlashdata('sukses')) : ?>
        <div class="alert-sukses">
            <?= session()->getFlashdata('sukses') ?>
        </div>
    <?php endif; ?>

    <div class="card">

        <?php $d = $data ?? []; ?>

        <div class="header">
            <div>
                <div class="brand-title">Perjalanan Lebih Mudah</div>
                <div class="brand-small">PT. Astra Travel Mobil</div>
            </div>

            <div class="logo">
                <img src="<?= base_url('img/logotravel.png') ?>" alt="Logo">
                <div class="label">Travel Mobil</div>
            </div>
        </div>

        <div class="date-top">
            <?= date('l, d F Y', strtotime($d['tanggal'] ?? date("Y-m-d"))) ?>
        </div>

        <hr>

        <div class="row">
            <div class="label">Nama Penumpang</div>
            <div class="value"><?= esc($d['nama'] ?? '') ?></div>
        </div>

        <div class="row">
            <div class="label">Tujuan</div>
            <div class="value"><?= esc($d['tujuan'] ?? '') ?></div>
        </div>

        <div class="row">
            <div class="label">Nomor Kursi</div>
            <div class="value"><?= esc($d['kursi'] ?? '') ?></div>
        </div>

        <div class="row">
            <div class="label">Jenis Kendaraan</div>
            <div class="value"><?= esc($d['nama_mobil'] ?? '') ?></div>
        </div>

        <div class="row">
            <div class="label">Titik Jemput</div>
            <div class="value"><?= esc($d['titik_jemput'] ?? '') ?></div>
        </div>

        <img src="<?= base_url('img/mobil_rame.png') ?>" class="footer-img">

        <div class="total">
            Total : Rp <?= number_format($d['total'] ?? 0, 0, ',', '.') ?>
        </div>

    </div>

    <div style="text-align:center; margin-top:18px;">
        <a href="<?= base_url('/') ?>" class="button">
            Kembali ke Halaman Utama
        </a>
    </div>

</div>
</body>
</html>