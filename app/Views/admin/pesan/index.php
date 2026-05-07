<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman data pemesanan</title>

<style>
    .table-container {
        margin-top: 20px;
        background: #fff;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 0 12px rgba(0,0,0,0.08);
        border: 1px solid #e5e7eb;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
    }

    table th {
        background: #1e40af;
        color: #fff;
        padding: 12px;
        text-align: left;
        font-size: 14px;
    }

    table td {
        padding: 10px;
        border-bottom: 1px solid #e5e7eb;
        font-size: 14px;
    }

    table tr:hover {
        background: #f1f5f9;
    }

    .aksi-link a {
        padding: 6px 10px;
        margin-right: 5px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 13px;
    }

    .edit-btn {
        background: #2563eb;
        color: white;
    }

    .hapus-btn {
        background: #dc2626;
        color: white;
    }

    .edit-btn:hover { background: #1d4ed8; }
    .hapus-btn:hover { background: #b91c1c; }

    .success-message {
        padding: 10px 15px;
        background: #d1fae5;
        color: #065f46;
        border-left: 5px solid #10b981;
        border-radius: 6px;
        margin-bottom: 15px;
        width: fit-content;
    }
    .btn-back {
        text-decoration: none;
    }
</style>
</head>
<body>
<a href="javascript:history.back()" class="btn-back">←</a>
<h1 style="text-align: center ">Data Pemesanan</h1>

<?php if(session()->getFlashdata('message')): ?>
    <div class="success-message">
        <?= session()->getFlashdata('message'); ?>
    </div>
<?php endif; ?>

<div class="table-container">
<table>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Tanggal</th>
        <th>Rute</th>
        <th>Mobil</th>
        <th>No Kursi</th>
        <th>Titik Jemput</th>
        <th>Bukti Pembayaran</th>
        <th>Total Harga</th>
        <th>Kelola data</th>
    </tr>

    <?php $no=1; foreach ($pesan as $p): ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $p['nama']; ?></td>
        <td><?= $p['tanggal']; ?></td>
        <td><?= $p['tujuan']; ?></td>
        <td><?= $p['nama_mobil']; ?></td>
        <td><?= $p['kursi']; ?></td>
        <td><?= $p['titik_jemput']; ?></td>
        <td><img src="/img/<?= $p['gambar']; ?>" width="100"></td>
        <td>Rp <?= number_format($p['harga']); ?></td>
        <td class="aksi-link">
            <a href="/admin/pesan/hapus/<?= $p['id_pesanan']; ?>" class="hapus-btn"
            onclick="return confirm('Yakin hapus?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
</div>
</body>
</html>