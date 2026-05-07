<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <a href="javascript:history.back()" class="btn-back">←</a>
    <title>Edit Mobil Admin</title>

<style>
    body {
        font-family: Arial, sans-serif;
        background: #f0f4ff;
        margin: 0;
        padding: 40px;
    }

    .container {
        max-width: 500px;
        margin: auto;
        background: white;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    h1 {
        text-align: center;
        color: #1e3a8a;
        margin-bottom: 25px;
    }

    label {
        font-weight: bold;
        color: #1f2937;
        display: block;
        margin-bottom: 6px;
        margin-top: 15px;
    }

    input[type="text"],
    input[type="file"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #cbd5e1;
        border-radius: 8px;
        outline: none;
        transition: 0.2s;
    }

    input[type="text"]:focus,
    input[type="file"]:focus {
        border-color: #2563eb;
        box-shadow: 0 0 5px rgba(37,99,235,0.3);
        width: 100%;
        padding: 10px;
        border: 1px solid #cbd5e1;
        border-radius: 8px;
        outline: none;
        transition: 0.2s;
    }

    button {
        margin-top: 20px;
        width: 100%;
        padding: 12px;
        background: #2563eb;
        color: white;
        border: none;
        font-size: 16px;
        border-radius: 8px;
        cursor: pointer;
        transition: 0.2s;
    }


</style>
</head>
<body>

<div class="container">
    <h1>Edit Mobil</h1>

    <form action="/admin/mobil/update/<?= $mobil['mobil_id']; ?>" method="post">
        
        <label>Nama Mobil</label>
        <input type="text" name="nama_mobil" value="<?= $mobil['nama_mobil']; ?>" required>

        <label>Nama File Gambar</label>
        <input type="file" name="gambar">

        <label>Kapasitas</label>
        <input type="text" name="kapasitas" value="<?= $mobil['kapasitas']; ?>" required>

        <button type="submit">Update</button>
    </form>
</div>
</body>
</html>