<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Konfirmasi</title>
<style>
body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(180deg, #4E8CF5, #8A4FF5);
    height: 100vh;
    display: flex;
    justify-content: center;
}

.back-btn {
    position: absolute;
    top: 18px;
    left: 20px;
    font-size: 28px;
    cursor: pointer;
    color: #fff;
}

.wrapper {
    width: 100%;
    max-width: 550px;
    margin-top: 40px;
    text-align: center;
}

h1 {
    color: white;
    font-size: 26px;
    margin-bottom: 20px;
}

/* CARD */
.card {
    background: #fff;
    padding: 25px 30px;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.15);
    text-align: left;
}

.top-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 13px;
}

/* Logo */
.logo {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 5px;
}
.logo img {
    width: 40px;
    border-radius: 50%;
}
.logo small {
    font-size: 12px;
}

.tanggal {
    text-align: right;
    font-size: 12px;
    margin: 8px 0 12px;
    font-weight: bold;
}

.divider {
    height: 1px;
    background: #d8d8d8;
    margin: 12px 0 20px;
}

/* Form Elements */
label {
    display: block;
    margin-top: 18px;
    font-size: 14px;
}

input, select {
    width: 100%;
    font-size: 14px;
}

input {
    border: none;
    border-bottom: 1.5px solid #bdbdbd;
    padding: 6px 0;
    outline: none;
}

select {
    padding: 10px;
    border-radius: 8px;
    border: 1.5px solid #bdbdbd;
    margin-top: 12px;
}

.total {
    text-align: right;
    font-weight: bold;
    margin-top: 25px;
    font-size: 16px;
}

.btn {
    width: 180px;
    margin: 30px auto 0;
    padding: 12px 0;
    background: #fff;
    border: none;
    color: #4E8CF5;
    font-size: 16px;
    font-weight: bold;
    border-radius: 25px;
    transition: .3s ease;
    display: block;
}

.btn:hover {
    background: #eee;
}
</style>
</head>
<body>

<a onclick="history.back()" class="back-btn">←</a>

<div class="wrapper">
    <h1>Konfirmasi</h1>

    <div class="card">

        <div class="top-section">
            <div>
                <strong>Perjalanan lebih mudah</strong><br>
                PT. Astra Travel Mobil
            </div>
            <div class="logo">
                <img src="<?= base_url('img/logotravel.png') ?>" alt="Logo">
                <small>Travel Mobil</small>
            </div>
        </div>

        <p class="tanggal">
            <?= date('l, d F Y', strtotime($data['tanggal'] ?? date("Y-m-d"))) ?>
        </p>

        <div class="divider"></div>

        <label>Nama Penumpang</label>
        <input type="text" value="<?= esc($data['nama'] ?? '') ?>" readonly>

        <label>Tujuan</label>
        <input type="text" value="<?= esc($rute['tujuan'] ?? '') ?>" readonly>

        <label>Nomor Kursi</label>
        <input type="text" value="<?= esc($data['kursi'] ?? '') ?>" readonly>

        <label>Jenis Kendaraan</label>
        <input type="text" value="<?= esc($mobil['nama_mobil'] ?? '') ?>" readonly>

        <form action="<?= base_url('pesanan/pesan') ?>" method="post" enctype="multipart/form-data">

            <label>Titik Jemput</label>
            <input type="text" name="titik_jemput" placeholder="Masukkan titik jemput..." required>

            <label>Perkiraan Datang</label>
            <input type="text" readonly value="<?= esc($data['tanggal'] ?? '') ?>">

            <label>Metode Pembayaran</label>
                <select name="metode" id="metode">
                    <option value="">Pilih Transaksi</option>
                    <option value="BCA">BCA</option>
                    <option value="BNI">BNI</option>
                    <option value="BRI">BRI</option>
                    <option value="Mandiri">Mandiri</option>
                </select>

            <label>No Rekening</label>
            <input type="text" id="norek" readonly>


            <label>Upload Bukti Pembayaran</label>
            <input type="file" name="gambar" required>

            <div class="total">Total: Rp <?= number_format($total,0,',','.') ?></div>


            <button type="submit" class="btn" >Bayar</button>
        </form>
    </div>
</div>

<script>
    const rekening = {
        "BCA": "123 456 7890",
        "BNI": "987 654 3210",
        "BRI": "112 233 4455",
        "Mandiri": "556 677 8899"
    };

    document.getElementById('metode').addEventListener('change', function () {
        document.getElementById('norek').value = rekening[this.value] ?? "";
    });
</script>

</body>
</html>