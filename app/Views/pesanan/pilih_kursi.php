<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Kursi</title>

    <style>
        body {
            margin: 0;
            font-family: "Poppins", sans-serif;
            background: linear-gradient(135deg, #4A90E2, #8E2DE2);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .wrapper {
            background: white;
            width: 80%;
            max-width: 900px;
            padding: 35px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0px 10px 25px rgba(0,0,0,0.15);
        }

        h2 {
            font-size: 22px;
            margin-bottom: 25px;
            font-weight: 600;
        }

        /* Layout Kursi */
        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
            justify-items: center;
            margin-top: 20px;
        }

        .seat {
            background: #e6e6e6;
            width: 110px;
            padding: 18px 0;
            border-radius: 12px;
            text-align: center;
            cursor: pointer;
            font-weight: 500;
            transition: 0.25s;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
        }

        .seat:hover {
            transform: scale(1.05);
        }

        .seat.selected {
            background: #8E2DE2;
            color: white;
            transform: scale(1.05);
        }

        .driver {
            background: #444;
            color: white;
            cursor: not-allowed;
        }

        .terisi {
            background: #ff3b3b;
            color: white;
            cursor: not-allowed;
            opacity: 0.7;
        }

        button {
            margin-top: 35px;
            padding: 12px 35px;
            background: linear-gradient(135deg,#4A90E2,#8E2DE2);
            border: none;
            border-radius: 12px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            font-weight: 600;
            transition: 0.25s;
        }

        button:hover {
            transform: scale(1.05);
            opacity: .9;
        }

        .back-btn{
            position: absolute;
            top: 20px; left: 20px;
            font-size: 28px;
            color: white;
            cursor: pointer;
        }
    </style>
</head>

<body>

<a class="back-btn" onclick="history.back()">⬅</a>

<div class="wrapper">

    <h2>Pilih Nomor Kursi</h2>

<form id="formKursi" action="<?= base_url('pesanan/simpan_kursi') ?>" method="post">
    <input type="hidden" name="kursi" id="inputKursi">

    <div class="grid">
        <div class="seat driver" style="grid-column: span 1;">Supir</div>

        <?php 
        $total = 7; 
        $booked = $booked ?? []; 

        for ($i=1; $i <= $total; $i++): 
            $isBooked = in_array((string)$i, $booked);
        ?>
        
        <div 
            class="seat <?= $isBooked ? 'terisi' : '' ?>" 
            data-nomor="<?= $i ?>">
            Kursi <?= $i ?>
        </div>

        <?php endfor; ?>
    </div>

    <button type="button" id="btnPesan">Pesan Kursi</button>
</form>
</div>

<script>
const kursi = document.querySelectorAll('.seat:not(.driver):not(.terisi)');

kursi.forEach(el => {
    el.addEventListener('click', function() {
        this.classList.toggle('selected');
    });
});

document.getElementById('btnPesan').addEventListener('click', function() {
    const selected = [...document.querySelectorAll('.seat.selected')].map(item => item.dataset.nomor);

    if (selected.length === 0) {
        alert('Silakan pilih kursi dahulu.');
        return;
    }

    document.getElementById('inputKursi').value = selected.join(',');
    document.getElementById('formKursi').submit();
});
</script>

</body>
</html>