<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pilih Mobil</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      background: linear-gradient(180deg, #4A90E2, #8E2DE2);
      min-height: 100vh;
      padding-bottom: 40px;
    }

    .topbar {
      display: flex;
      align-items: center;
      padding: 20px;
      color: white;
      font-size: 18px;
      font-weight: 600;
    }

    .back-btn {
      cursor: pointer;
      font-size: 26px;
      margin-right: 15px;
    }

    .search-box {
      width: 60%;
      margin: 20px auto;
      display: flex;
      background: white;
      padding: 10px 15px;
      border-radius: 25px;
      align-items: center;
      gap: 10px;
      box-shadow: 0 5px 12px rgba(0,0,0,0.2);
    }

    .search-box input {
      width: 100%;
      border: none;
      outline: none;
      font-size: 15px;
    }

    .card {
      width: 80%;
      background: white;
      margin: 25px auto;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 6px 20px rgba(0,0,0,0.15);
      cursor: pointer;
      transition: 0.3s;
      text-align: center;
    }

    .card:hover {
      transform: scale(1.03);
    }

    .card img {
      width: 70%;
      margin: auto;
      display: block;
      padding-top: 20px;
    }

    .info {
      background: #e9e9e9;
      padding: 15px;
    }

    .info h3 {
      margin-bottom: 5px;
      font-size: 16px;
      font-weight: 600;
    }

    .info p {
      font-size: 13px;
      opacity: 0.8;
    }
  </style>
</head>
<body>

<div class="topbar">
  <span class="back-btn" onclick="history.back()">←</span>
  Pilih Mobil
</div>

<div class="search-box">
<input type="text" id="search" placeholder="Search..." onkeyup="filterCards()">
</div>
<script>
function filterCards() {
    let search = document.getElementById("search").value.toLowerCase();
    let cards = document.querySelectorAll(".mobil-card");
    let container = document.body; 

    let matched = [];
    let unmatched = [];

    cards.forEach(card => {
        let name = card.querySelector("h3").innerText.toLowerCase();

        if (name.includes(search)) {
            matched.push(card);
            card.style.display = "block";
        } else {
            unmatched.push(card);
            card.style.display = "block"; 
        }
    });

    matched.forEach(card => container.appendChild(card));
    unmatched.forEach(card => container.appendChild(card));
}
</script>

<?php foreach ($mobil as $m): ?>
<div class="card mobil-card">
  <img src="<?= base_url('img/' . ($m['gambar'] ?? 'default.png')) ?>" alt="Mobil">

  <div class="info"
       onclick="window.location='<?= base_url('pesanan/pilih_mobil/' . ($m['mobil_id'] ?? $m['id'])) ?>'">
    <h3><?= esc($m['nama_mobil'] ?? $m['nama']) ?></h3>
    <p>1 sampai <?= esc($m['kapasitas'] ?? 'Tidak diketahui') ?> Penumpang</p>
  </div>
</div>
<?php endforeach; ?>

<script>
function filterCards() {
  let search = document.getElementById("search").value.toLowerCase();
  let cards = document.querySelectorAll(".mobil-card");

  cards.forEach(card => {
    if (card.innerText.toLowerCase().includes(search)) {
      card.style.display = "block";
    } else {
      card.style.display = "none";
    }
  });
}
</script>

</body>
</html>
