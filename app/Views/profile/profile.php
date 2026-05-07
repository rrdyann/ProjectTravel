<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <link rel="stylesheet" href="<?= base_url('style/profil.css') ?>">

</head>
<body>

<a href="<?= base_url('/') ?>"
   class="btn btn-primary"
   style="
        position: fixed; 
        top: 20px; 
        left: 20px; 
        z-index: 999;
        color: #ffffff !important;
   ">
   ←
</a>
<div class="container">

    <div class="profile-img">👤</div>

    <h2><?= $users->username ?></h2>

    <br>

    <label>No Telepon</label>
    <input type="text" value="<?= $users->no_hp ?>" disabled><br>
    
    <label>E-Mail</label>
    <input type="text" value="<?= $users->email ?>" disabled><br>

    <label>Alamat</label>
    <input type="text" value="<?= $users->alamat ?>" disabled><br>

    <br>
    <a href="<?= base_url('profile/delete') ?>" 
   onclick="return confirm('Yakin ingin menghapus akun? Ini permanen.')" 
   class="btn btn-red">
   Hapus Akun
    </a>


</div>

</body>
</html>