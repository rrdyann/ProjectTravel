<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <a href="javascript:history.back()" class="btn-back">←</a>
    <title>Halaman data rute admin</title>

<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background: #f4f7fc;
        margin: 0;
        padding: 20px;
    }

    h1 {
        color: #0d47a1;
        text-align: center;
        margin-bottom: 25px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    }

    th {
        background: #0d47a1;
        color: white;
        padding: 12px;
        text-align: left;
        font-size: 15px;
    }

    td {
        padding: 12px;
        border-bottom: 1px solid #e5e5e5;
    }

    tr:hover {
        background: #e3f2fd;
    }

    .aksi a {
        padding: 6px 10px;
        border-radius: 5px;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        margin-right: 4px;
        transition: 0.2s;
    }

    .btn-edit {
        background: #1565c0;
        color: white;
    }

    .btn-edit:hover {
        background: #0d47a1;
    }

    .btn-delete {
        background: #d32f2f;
        color: white;
    }

    .btn-delete:hover {
        background: #b71c1c;
    }

    .alert {
        background: #c8e6c9;
        padding: 10px;
        border-left: 5px solid #2e7d32;
        margin-bottom: 15px;
        color: #2e7d32;
        border-radius: 5px;
        font-weight: 500;
    }
    .btn-back {
        text-decoration: none;
    }
</style>
</head>
<body>

<h1>Data Rute</h1>

<?php if(session()->getFlashdata('pesan')): ?>
    <div class="alert"><?= session()->getFlashdata('pesan'); ?></div>
<?php endif; ?>


<table>
    <tr>
        <th>No</th>
        <th>Asal</th>
        <th>Tujuan</th>
        <th>Jam Berangkat</th>
        <th>Jam Tiba</th>
        <th>Harga</th>
        <th>Kelola data</th>
    </tr>

    <?php $no = 1; foreach($rute as $r): ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $r['asal']; ?></td>
        <td><?= $r['tujuan']; ?></td>
        <td><?= $r['jam_berangkat']; ?></td>
        <td><?= $r['jam_tiba']; ?></td>
        <td>Rp <?= number_format($r['harga']); ?></td>
        <td class="aksi">
            <a href="/admin/rute/edit/<?= $r['id_rute']; ?>" class="btn-edit">Edit</a>
            <a href="/admin/rute/hapus/<?= $r['id_rute']; ?>" class="btn-delete" onclick="return confirm('Hapus rute ini?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>