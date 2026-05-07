<!DOCTYPE html>
<html>
<head>
    <title>Edit Profil</title>
    <style>
        body {
            margin: 0;
            font-family: "Poppins", sans-serif;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        }
        .container {
            width: 80%;
            max-width: 900px;
            margin: 50px auto;
            background: white;
            padding: 40px;
            border-radius: 25px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-bottom: 2px solid #999;
        }
        .btn {
            padding: 10px 25px;
            border-radius: 20px;
            border: none;
            cursor: pointer;
            font-weight: bold;
            margin-top: 15px;
            background: #3b82f6;
            color : white;
        }
       
    </style>
</head>
<body>

<div class="container">

<h2>Edit Profil</h2>

<form action="<?= base_url('profile/update') ?>" method="post">

    <label>Nama Pengguna</label><br>
    <input type="text" name="username" value="<?= $users->username ?>">

    <label>No Telepon</label><br>
    <input type="text" name="no_hp" value="<?= $users->no_hp ?>">

    <label>E-Mail</label><br>
    <input type="email" name="email" value="<?= $users->email ?>">

    <label>Alamat</label><br>
    <input type="text" name="alamat" value="<?= $users->alamat ?>">

    <br>
    <button class="btn" type="submit">Simpan Perubahan</button>

</form>

</div>

</body>
</html>
