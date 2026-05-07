<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Bantuan — <?= esc($bantuan['pembuka']) ?></title>
  <link rel="stylesheet" href="<?= base_url('style/tambahan.css') ?>">
</head>
<body>

  <div class="topbar">
    <a href="<?= base_url() ?>" class="back-btn" aria-label="Kembali">←</a>
    <div class="top-title"></div>
  </div>

  <div class="card-wrap">
    <div class="card">

      <!-- judul (pembuka) -->
      <h1><?= esc($bantuan['pembuka']) ?></h1>

      <!-- isi -->
      <p><?= esc($bantuan['isi']) ?></p>

      <!-- pusat bantuan -->
      <p><?= esc($bantuan['pusat']) ?></p>

      <!-- footer (claim) -->
      <div class="copyright">
        <?= esc($bantuan['claim']) ?>
      </div>

    </div>
  </div>

</body>
</html>