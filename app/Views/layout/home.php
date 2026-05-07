<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Travel Mobil</title>

  <link rel="stylesheet" href="<?= base_url('style/home.css') ?>">

</head>

<body>

  <section class="hero">
    <div class="hero-text">
      <h1>Manjakan perjalanan anda dengan <br> Travel kami</h1>
      <p>Liburan lebih mudah</p>
    </div>

   <div class="slider-container" 
     style="width: 400px; overflow: hidden; border-radius: 20px;">

    <div class="slide-wrapper" id="slideWrapper" 
         style="display: flex; transition: transform 1s ease;">

        <?php foreach ($slider as $s): ?>
            <img src="<?= base_url('img/slider/'.$s['gambar']) ?>" 
                 style="width: 400px; height: 250px; object-fit: cover; flex-shrink: 0;">
        <?php endforeach; ?>

    </div>
</div>


    </div>
</div>



  </section>

  <script>
    const slideWrapper = document.getElementById('slideWrapper');
    const totalSlides = slideWrapper.children.length;
    let index = 0;

    setInterval(() => {
      index = (index + 1) % totalSlides;
      slideWrapper.style.transform = `translateX(-${index * 400}px)`;
    }, 3000);
  </script>

  <div class="buttons">
    <a href="<?= base_url('pesanan/pesanan') ?>">Pesan Mobil</a>
    <a href="#rute">Rute yang tersedia</a>
    <a href="<?= base_url('pesanan/tiket')?>">Tiket Anda</a>
  </div>

  <div class="rute-container" id="rute">
    <h2>Rute yang tersedia</h2>
    <div class="rute-list">
      <p>Purwokerto - Cilacap</p>
      <p>Cilacap - Tasikmalaya</p>
      <p>Purwokerto - Tasikmalaya</p>
      <p>Cilacap - Jakarta</p>
      <p>Cilacap - Purwokerto</p>
      <p>Yogyakarta - Cilacap</p>
    </div>
  </div>

  <div class="partners">
    <h2>Partner Resmi Kami</h2>
    <div class="partner-logos">
      <img src="<?= base_url('img/logokai.png') ?>" alt="KAI">
      <img src="<?= base_url('img/logogojek.png') ?>" alt="Gojek">
      <img src="<?= base_url('img/logograb.png') ?>" alt="Grab">
    </div>
  </div>

</body>
</html>
