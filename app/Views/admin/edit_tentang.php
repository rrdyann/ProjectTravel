<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman edit tentang admin</title>

<style>
    .container-tentang {
        max-width: 1100px;
        margin: 40px auto;
        background: #ffffff;
        padding: 30px 40px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        font-family: "Segoe UI", sans-serif;
    }

    .container-tentang h2 {
        font-weight: 600;
        margin-bottom: 25px;
        border-bottom: 3px solid #007bff;
        padding-bottom: 10px;
        color: #333;
    }

    label {
        font-weight: 600;
        margin-top: 18px;
        display: block;
        color: #444;
    }

    textarea {
        width: 100%;
        height: 180px;
        border-radius: 8px;
        padding: 12px;
        border: 1px solid #ccc;
        font-size: 15px;
        resize: vertical;
        transition: 0.2s;
    }

    textarea:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0,123,255,0.4);
        outline: none;
    }

    input[type="text"] {
        width: 100%;
        border-radius: 8px;
        padding: 12px;
        border: 1px solid #ccc;
        font-size: 15px;
        margin-bottom: 10px;
        transition: 0.2s;
    }

    input[type="text"]:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0,123,255,0.4);
        outline: none;
    }

    .btn-submit {
        display: inline-block;
        background: #007bff;
        padding: 12px 25px;
        border-radius: 8px;
        color: white;
        text-decoration: none;
        border: none;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        margin-top: 25px;
        transition: 0.2s;
    }

    .btn-submit:hover {
        background: #0056b3;
        transform: scale(1.03);
    }
</style>
</head>
<body>

<div style="margin-bottom:20px;">
    <a href="javascript:history.back()" class="btn-back">←</a>
</div>
<div class="container-tentang">
    <h2>Edit Halaman Tentang</h2>

    <form action="/admin/edit_tentang/simpan" method="post">
        <label>Pembuka</label>
        <textarea name="pembuka"><?= esc($tentang['pembuka']) ?></textarea>

        <label>Isi</label>
        <textarea name="isi"><?= esc($tentang['isi']) ?></textarea>

        <label>Penutup</label>
        <textarea name="penutup"><?= esc($tentang['penutup']) ?></textarea>

        <label>Claim</label>
        <input type="text" name="claim" value="<?= esc($tentang['claim']) ?>">

        <button type="submit" class="btn-submit">Simpan Perubahan</button>
    </form>
</div>
</body>
</html>