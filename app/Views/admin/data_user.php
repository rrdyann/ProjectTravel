<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Data User Admin</title>

<style>
    body {
        font-family: Arial, sans-serif;
        background: #f4f8ff;
        margin: 0;
        padding: 20px;
    }

    h1 {
        text-align: center;
        color: #1e3a8a;
        margin-bottom: 25px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    th {
        background: #1e3a8a;
        color: white;
        padding: 12px;
    }

    td {
        padding: 12px;
        border-bottom: 1px solid #e5e7eb;
    }

    .btn-admin {
        padding: 6px 12px;
        border-radius: 6px;
        text-decoration: none;
        color: white;
        font-size: 14px;
        display: inline-block;
        margin-top: 5px;
    }

    .btn-make { background:#16a34a; }
    .btn-remove { background:#dc2626; }

    .badge-admin {
        padding: 5px 10px;
        background: #1e3a8a;
        color: white;
        border-radius: 6px;
        font-size: 13px;
        display: inline-block;
        margin-bottom: 6px;
    }
</style>
</head>
<a href="javascript:history.back()" class="btn-back">←</a>
<body>

<h1>Data Semua User</h1>

<?php $auth = service('authorization'); ?>

<table>
    <tr>
        <th>No</th>
        <th>Username</th>
        <th>Email</th>
        <th>Alamat</th>
        <th>No HP</th>
        <th>Tanggal Daftar</th>
        <th style="text-align:center;">Aksi Admin</th>
    </tr>

    <?php 
    $no = 1;
    foreach ($users as $u): 
    ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $u['username']; ?></td>
        <td><?= $u['email']; ?></td>
        <td><?= $u['alamat']; ?></td>
        <td><?= $u['no_hp']; ?></td>
        <td><?= $u['created_at']; ?></td>

        <td style="text-align:center;">

    <?php 
        $isAdmin = $auth->inGroup('admin', $u['id']);
    ?>

    <?php if ($isAdmin): ?>
        <span style="
            padding:6px 12px;
            background:#1e3a8a;
            color:white;
            border-radius:6px;
            font-weight:bold;
            display:inline-block;
            margin-bottom:5px;">
            ADMIN
        </span>
    <?php else: ?>
        <span style="
            padding:6px 12px;
            background:#6b7280;
            color:white;
            border-radius:6px;
            font-weight:bold;
            display:inline-block;
            margin-bottom:5px;">
            USER
        </span>
    <?php endif; ?>

    <br>

    <?php if ($isAdmin): ?>
        
        <a href="<?= base_url('admin/removeAdmin/' . $u['id']) ?>"
           class="btn-admin btn-remove"
           style="
                background:#dc2626;
                padding:6px 12px;
                color:white;
                border-radius:6px;
                text-decoration:none;">
            Cabut Admin
        </a>

    <?php else: ?>

        <a href="<?= base_url('admin/makeAdmin/' . $u['id']) ?>"
           class="btn-admin btn-make"
           style="
                background:#16a34a;
                padding:6px 12px;
                color:white;
                border-radius:6px;
                text-decoration:none;">
            Jadikan Admin
        </a>

    <?php endif; ?>

</td>

    </tr>
    <?php endforeach; ?>

</table>

</body>
</html>
