<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman edit bantuan admin</title>

<style>
    .alert-success {
        padding: 10px;
        background: #d1fae5;
        color: #065f46;
        border-left: 5px solid #10b981;
        margin-bottom: 15px;
    }

    .btn-back {
        display: inline-block;
        padding: 8px 15px;
        background: #ccc;
        color: #000;
        border-radius: 6px;
        text-decoration: none;
        margin-bottom: 20px;
    }

    .form-container {
        max-width: 900px;
        margin: auto;
        background: #fff;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 0 12px rgba(0,0,0,0.08);
    }

    .form-title {
        text-align: center;
        margin-bottom: 20px;
    }

    .form-control {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        border-radius: 6px;
        border: 1px solid #ccc;
    }

    .btn-submit {
        background: #4F8EF7;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 8px;
        font-weight: bold;
        cursor: pointer;
    }
</style>
</head>
<body>

<?= session()->getFlashdata('success')
    ? '<div class="alert-success">'.session()->getFlashdata('success').'</div>'
    : '' ?>

<a href="javascript:history.back()" class="btn-back">←</a>

<form action="/admin/edit_bantuan/simpan" method="post" class="form-container">
    <h2 class="form-title">Edit Halaman Bantuan</h2>

    <label>Judul</label>
    <input type="text" name="judul" value="<?= esc($bantuan['judul'] ?? '') ?>" class="form-control">

    <label>Isi</label>
    <textarea name="isi" class="form-control" style="height:200px;"><?= esc($bantuan['isi'] ?? '') ?></textarea>

    <label>Claim</label>
    <input type="text" name="claim" value="<?= esc($bantuan['claim'] ?? '') ?>" class="form-control">

    <button type="submit" class="btn-submit">Simpan</button>
</form>
</body>
</html>