<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pilih Tujuan</title>

    <style>
        body {
            font-family: "Poppins", sans-serif;
            margin: 0;
            background: linear-gradient(135deg, #4A00E0, #8E2DE2);
            color: white;
            min-height: 100vh;
        }

        .header {
            display: flex;
            align-items: center;
            padding: 20px;
            font-size: 20px;
            font-weight: 600;
        }

        .header button {
            background: none;
            border: none;
            color: white;
            font-size: 26px;
            cursor: pointer;
            margin-right: 15px;
        }

        .search-box {
            width: 70%;
            margin: auto;
            background: white;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            border-radius: 30px;
            box-shadow: 0px 4px 15px rgba(0,0,0,0.2);
        }

        .search-box input {
            width: 100%;
            border: none;
            outline: none;
            font-size: 14px;
        }

        .wrapper {
            margin-top: 30px;
        }

        .card {
            width: 85%;
            background: white;
            color: #444;
            margin: 18px auto;
            padding: 20px;
            border-radius: 18px;
            box-shadow: 0px 4px 18px rgba(0,0,0,0.25);
            cursor: pointer;
            transition: 0.25s;
        }

        .card:hover {
            transform: scale(1.02);
        }

        .top {
            font-size: 16px;
            font-weight: 600;
        }

        .info {
            font-size: 13px;
            margin-top: 5px;
            color: gray;
        }

        .harga {
            float: right;
            color: #7B55FF;
            font-weight: bold;
        }

        .btn-submit {
            display: block;
            width: 15%;
            margin: 25px auto;
            background-color: white;
            color: #8E2DE2;
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-submit:hover {
            opacity: 0.9;
        }

        input[type="radio"] {
            margin-right: 10px;
        }
    </style>
</head>
<body>

    <div class="header">
        <button onclick="history.back()">←</button> Pilih Tujuan
    </div>

    <div class="search-box">
        <input type="text" placeholder="Search">
    </div>
   <script>
        const searchInput = document.querySelector(".search-box input");

        searchInput.addEventListener("keyup", function () {
            let keyword = this.value.toLowerCase();
            let cards = document.querySelectorAll(".card");

            cards.forEach(card => {
                let text = card.innerText.toLowerCase();

                if (text.includes(keyword)) {
                    card.style.display = "block";
                } else {
                    card.style.display = "none";
                }
            });
        });
    </script>

    <div class="wrapper">
    <?php if (!empty($rute)): ?>
        <form action="<?= base_url('pesanan/simpan_rute') ?>" method="post">
            <?php foreach ($rute as $r): ?>
                <label>
                    <div class="card">
                        <input type="radio" name="rute" value="<?= esc($r['id_rute']) ?>" required>
                        <span class="top"><?= esc($r['asal']) ?> → <?= esc($r['tujuan']) ?></span>
                        <span class="harga">Rp <?= number_format($r['harga'],0,',','.') ?></span>
                        <div class="info"><?= esc($r['jam_berangkat']) ?> - <?= esc($r['jam_tiba']) ?></div>
                        <div class="info">Status: <b>Ready</b></div>
                    </div>
                </label>
            <?php endforeach; ?>
            <button type="submit" class="btn-submit">Pilih</button>
        </form>
    <?php else: ?>
        <p style="text-align:center;color:white;margin-top:10px;">Belum ada rute tersedia.</p>
    <?php endif; ?>
    </div>

</body>
</html>