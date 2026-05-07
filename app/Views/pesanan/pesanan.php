<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pemesanan Mobil</title>

<style>
    body {
        margin: 0;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        font-family: 'Poppins', sans-serif;
    }

    .container {
        background: #fff;
        width: 420px;
        padding: 30px 35px;
        border-radius: 18px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        animation: fadeIn .8s ease;
    }

    h2 {
        text-align: center;
        margin-bottom: 25px;
        font-weight: 600;
        color: #333;
        font-size: 22px;
    }

    .field {
        margin-bottom: 18px;
    }

    label {
        font-size: 14px;
        color: #444;
        font-weight: 500;
    }

    .input-box {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 6px;
        background: #f4f4f4;
        padding: 12px;
        border-radius: 12px;
        border: 1px solid transparent;
        transition: .2s;
    }

    .input-box:hover {
        border-color: #8b5cf6;
    }

    .input-box input,
    .input-box select {
        width: 100%;
        border: none;
        outline: none;
        background: none;
        font-size: 14px;
    }

    button {
        width: 100%;
        padding: 13px;
        margin-top: 10px;
        border: none;
        border-radius: 25px;
        background: linear-gradient(135deg,#3b82f6,#8b5cf6);
        color: white;
        font-weight: 600;
        cursor: pointer;
        transition: .3s;
    }

    button:hover {
        opacity: .85;
        transform: scale(1.02);
    }

    .back-btn {
        position: absolute;
        top: 20px;
        left: 20px;
        text-decoration: none;
        color: white;
        font-size: 22px;
        background: rgba(255,255,255,0.2);
        padding: 10px 14px;
        border-radius: 50%;
        transition: .3s;
    }

    .back-btn:hover {
        background: rgba(255,255,255,0.35);
    }

    .icon {
        font-size: 18px;
        opacity: 0.6;
    }
</style>
</head>
<body>

<a href="javascript:history.back()" class="back-btn">←</a>

<div class="container">
    <h2>Pemesanan Mobil</h2>

    <form action="<?= base_url('pesanan/simpan') ?>" method="post">

        <div class="field">
            <label>Nama Penumpang</label>
            <div class="input-box">
                <input type="text" name="nama" placeholder="Masukkan Nama" required>
            </div>
        </div>

        <div class="field">
            <label>Tanggal Berangkat</label>
            <div class="input-box">
                <input type="date" name="tanggal" required>
            </div>
        </div>

        <div class="field">
            <label>Jumlah Penumpang</label>
            <div class="input-box">
                <select name="penumpang" required>
                    <option value="1">1 Orang</option>
                    <option value="2">2 Orang</option>
                    <option value="3">3 Orang</option>
                    <option value="4">4 Orang</option>
                </select>
            </div>
        </div>

        <button type="submit">Selanjutnya</button>
    </form>
</div>

</body>
</html>