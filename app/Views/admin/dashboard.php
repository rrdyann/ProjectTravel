<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Travel Mobil</title>
    <link rel="stylesheet" href="<?= base_url('style/dashboard.css')?>">

</head>
<body>

<div class="sidebar">
    <h2><a href="/">TRAVEL MOBIL</a></h2>
    <a href="/admin/mobil">Data Mobil</a>
    <a href="/admin/mobil/tambah">Tambah Mobil</a>
    <a href="/admin/rute">Data Rute</a>
    <a href="/admin/rute/tambah">Tambah Rute</a>
    <a href="/admin/pesan">Data Pemesanan</a>
    <a href="/admin/data_user">Data Users</a>
    <a href="/admin/edit_tentang">Edit tentang</a>
    <a href="/admin/edit_bantuan">Edit bantuan</a>
    <a href="/admin/slider/index">Kelola Slider Mobil</a>
    <a href="/logout">Logout</a>
</div>

<div class="content">
    <h1>Dashboard Admin</h1>

    <div class="card-box">
        <div class="card">
            <h3>Total Mobil</h3>
            <p><?= $total_mobil ?></p>
        </div>
        <div class="card">
            <h3>Total Rute</h3>
            <p><?= $total_rute ?></p>
        </div>
        <div class="card">
            <h3>Total Pesanan</h3>
            <p><?= $total_pesanan ?></p>
        </div>
    </div>
    <br>

        <div class="card wide">
            <h3>Pesanan Berangkat Hari Ini</h3>

            <?php if (empty($pesanan_hari_ini)): ?>
                <p><i>Tidak ada pesanan berangkat hari ini.</i></p>
            <?php else: ?>

            <table border="1" width="100%" cellpadding="5">
                <tr>
                    <th>Nama</th>
                    <th>Penumpang</th>
                    <th>Rute</th>
                    <th>Kursi</th>
                    <th>Mobil</th>
                </tr>

                <?php foreach ($pesanan_hari_ini as $p): ?>
                <tr>
                    <td><?= $p['nama'] ?></td>
                    <td><?= $p['penumpang'] ?></td>
                    <td><?= $p['tujuan'] ?></td>
                    <td><?= $p['kursi'] ?></td>
                    <td><?= $p['mobil'] ?></td>
                </tr>
                <?php endforeach; ?>

            </table>

            <?php endif; ?>
        </div>
</body>
</html>
