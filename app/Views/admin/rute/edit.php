<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <a href="javascript:history.back()" class="btn-back">←</a>
    <title>Halaman edit rute admin</title>

<style>
    body {
        font-family: Arial, sans-serif;
        background: #f4f6f9;
        margin: 0;
        padding: 0;
    }

    h1 {
        text-align: center;
        margin-top: 30px;
        font-size: 28px;
        color: #333;
    }

    .form-container {
        width: 45%;
        margin: 40px auto;
        background: #fff;
        padding: 25px 30px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    label {
        font-weight: bold;
        display: block;
        margin-bottom: 6px;
        margin-top: 15px;
        color: #555;
    }

    input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 15px;
    }

    input:focus {
        border-color: #4A90E2;
        outline: none;
        box-shadow: 0 0 4px rgba(74,144,226,0.5);
    }

    button {
        width: 100%;
        padding: 12px;
        background: #4A90E2;
        color: white;
        font-size: 17px;
        border: none;
        border-radius: 6px;
        margin-top: 25px;
        cursor: pointer;
        transition: 0.3s;
    }

    button:hover {
        background: #3b7ac2;
    }
</style>
</head>
<body>

<h1>Edit Rute</h1>

<div class="form-container">
    <form action="/admin/rute/update/<?= $rute['id_rute']; ?>" method="post">

        <label>Asal</label>
        <input type="text" name="asal" value="<?= $rute['asal']; ?>" required>

        <label>Tujuan</label>
        <input type="text" name="tujuan" value="<?= $rute['tujuan']; ?>" required>

        <label>Jam Berangkat</label>
        <input type="time" name="jam_berangkat" value="<?= $rute['jam_berangkat']; ?>" required>

        <label>Jam Tiba</label>
        <input type="time" name="jam_tiba" value="<?= $rute['jam_tiba']; ?>" required>

        <label>Harga</label>
        <input type="number" name="harga" value="<?= $rute['harga']; ?>" required>

        <button type="submit">Update</button>
    </form>
</div>
</body>
</html>