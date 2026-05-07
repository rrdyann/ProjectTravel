<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <a href="javascript:history.back()" class="btn-back">←</a>
    <title>Halaman data mobil admin</title>
<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background: #f4f8ff;
        margin: 0;
        padding: 20px;
    }

    h1 {
        text-align: center;
        color: #0d47a1;
        margin-bottom: 25px;
    }

    .alert {
        background: #d4edda;
        padding: 10px 12px;
        border-left: 5px solid #28a745;
        color: #155724;
        margin-bottom: 15px;
        border-radius: 4px;
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
        background: #f0f5ff;
    }

    .aksi a {
        padding: 6px 10px;
        border-radius: 5px;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        margin-right: 4px;
    }

    .edit-btn {
        background: #0d47a1;
        color: white;
    }
    .hapus-btn {
        background: #dc2626;
        color: white;
    }
    .edit-btn:hover { background: #0d47a1; }
    .hapus-btn:hover { background: #b91c1c; }
    
    .btn-back {
        text-decoration: none;
    }

</style>
</head>
<body>

<h1>Data Mobil</h1>

<?php if(session()->getFlashdata('pesan')): ?>
    <div style="color:green;"><?= session()->getFlashdata('pesan'); ?></div>
<?php endif; ?>


<br><br>

<table  width="100%" cellpadding="8" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Nama Mobil</th>
        <th>Gambar</th>
        <th>Kapasitas</th>
        <th>Kelola data</th>
    </tr>

    <?php $no = 1; foreach($mobil as $m): ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $m['nama_mobil']; ?></td>
        <td><img src="/img/<?= $m['gambar']; ?>" width="100"></td>
        <td><?= $m['kapasitas']; ?></td>
        <td class="aksi a">
            <a href="/admin/mobil/edit/<?= $m['mobil_id']; ?> " class="edit-btn">Edit</a> 
            <a href="/admin/mobil/hapus/<?= $m['mobil_id']; ?>" onclick="return confirm('Hapus mobil ini?')" class="hapus-btn">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>