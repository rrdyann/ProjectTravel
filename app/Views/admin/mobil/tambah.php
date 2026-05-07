<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <a href="javascript:history.back()" class="btn-back">←</a>
    <title>Form tambah mobil</title>

<style>
    body {
        font-family: Poppins, sans-serif;
        background: #F5F8FF;
    }

    .container-form {
        width: 450px;
        background: white;
        padding: 25px 30px;
        margin: 40px auto;
        border-radius: 14px;
        box-shadow: 0 4px 22px rgba(0,0,0,0.1);
    }

    .container-form h1 {
        text-align: center;
        color: #1E4DB7;
        margin-bottom: 25px;
        font-size: 26px;
    }

    label {
        font-weight: 600;
        color: #333;
        margin-bottom: 6px;
        display: block;
    }

    input[type="text"], 
    input[type="file"] {
        width: 100%;
        padding: 10px 12px;
        border-radius: 8px;
        border: 1px solid #D1D9E6;
        outline: none;
        margin-bottom: 15px;
        font-size: 14px;
        transition: 0.2s;
    }

    input:focus {
        border-color: #1E4DB7;
        box-shadow: 0 0 4px rgba(30,77,183,0.3);
    }

    small {
        color: #888;
        display: block;
        margin-top: -10px;
        margin-bottom: 15px;
        font-size: 12px;
    }

    button {
        width: 100%;
        padding: 12px;
        border: none;
        background: #1E4DB7;
        color: white;
        font-size: 16px;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
        box-shadow: 0 3px 10px rgba(30,77,183,0.3);
        transition: 0.25s;
    }

    button:hover {
        background: #19429B;
        box-shadow: 0 4px 14px rgba(30,77,183,0.4);
    }
</style>
</head>
<body>

<div class="container-form">
    <h1>Tambah Mobil</h1>

    <form action="/admin/mobil/simpan" method="post" enctype="multipart/form-data">
        <label>Nama Mobil</label>
        <input type="text" name="nama_mobil" required>

        <label>Nama File Gambar</label>
        <input type="file" name="gambar" required>
        <small>Contoh: avanza.png</small>

        <label>Kapasitas</label>
        <input type="text" name="kapasitas" required>

        <button type="submit">Simpan</button>
    </form>
</div>
</body>
</html>
