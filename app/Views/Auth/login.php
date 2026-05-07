<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<style>
    .container {
        display: flex;
        justify-content: center;   
        align-items: center;        
        min-height: 100vh;  

    }
    /* Styling kustom untuk menyesuaikan dengan gambar */
    body {
        /* Latar belakang ungu/biru gradasi */
        background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px 0;
    }
    .card {
        /* Background putih dengan sudut membulat besar */
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border: none;
        padding: 30px; 
        width: 100%;
        max-width: 600px; /* Lebar card */
    }
    .card-header {
        display: none;
    }
    .login-title {
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 2rem;
        padding: 0;
        border-bottom: none;
        text-align: left; /* 'Login' tetap di kiri atas */
    }
    
    /* --- Penyesuaian Utama: Membuat Form Rata Tengah --- */
    .form-content {
        /* Flexbox untuk menengahkan baris form */
        display: flex;
        flex-direction: column;
        align-items: center; /* Menengahkan semua konten di dalamnya */
        padding: 0 50px; /* Memberi ruang di samping agar input tidak terlalu lebar */
        /* Mengatur lebar form-content agar lebih terkontrol */
        width: 100%; 
        max-width: 500px; /* Batasi lebar form content */
        margin: 0 auto; /* Pastikan form-content itu sendiri di tengah card */
    }
    .form-group.row {
        width: 100%; /* Setiap baris form mengambil 100% dari lebar form-content */
        max-width: 400px; /* Batas lebar visual form agar berada di tengah */
        margin-left: 0;
        margin-right: 0;
        margin-bottom: 20px; /* Spasi antar input */
    }
    .form-group label {
        text-align: right;
        padding-top: 5px;
        font-size: 0.9rem;
    }
    /* --- Akhir Penyesuaian Utama --- */
    
    .form-control {
        border-radius: 50px; /* Membuat input bulat */
        height: 45px;
        padding-left: 15px; /* Sedikit padding agar teks tidak terlalu mepet */
    }
    .btn-login {
        /* Styling tombol Login gradasi */
        background: linear-gradient(to right, #738be7, #4b66f2); 
        border: none;
        border-radius: 50px;
        padding: 10px 40px;
        font-size: 1.1rem;
        font-weight: 500;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        display: block;
        margin: 20px auto 10px auto;
        width: 60%; 
    }
    .forgot-links-group {
        text-align: center;
        margin-top: -10px; /* Lebih dekat ke password field */
        margin-bottom: 20px; /* Lebih dekat ke tombol login */
        line-height: 1.2;
    }
    .forgot-links-group a {
        font-size: 0.8rem;
        display: block;
        color: #6a82fb; /* Warna link */
    }
    .social-login {
        text-align: center;
        margin-top: 25px;
        /* Menambahkan display: flex dan justify-content: center */
        display: flex;
        flex-direction: column; /* agar teks dan gambar tetap bertumpuk */
        align-items: center; /* Menengahkan secara horizontal */
        width: 100%; /* Penting agar flexbox bekerja dengan benar */
    }
    .social-login p {
        font-size: 0.9rem;
        margin-bottom: 10px;
        color: #666;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">

            <div class="card">
                <div class="card-body">
                    <div class="login-title">Login</div>

                    <?= view('Myth\Auth\Views\_message_block') ?>

                    <div class="form-content"> <form action="<?= url_to('login') ?>" method="post" style="width: 100%;">
                            <?= csrf_field() ?>

                            <div class="form-group row"> <label for="login" class="col-sm-5 col-form-label">Username/Email :</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
                                           name="login" placeholder="" value="<?= old('login') ?>">
                                    <div class="invalid-feedback">
                                        <?= session('errors.login') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row"> <label for="password" class="col-sm-5 col-form-label">Password :</label>
                                <div class="col-sm-7">
                                    <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="">
                                    <div class="invalid-feedback">
                                        <?= session('errors.password') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="forgot-links-group">
                                <?php if ($config->activeResetter): ?>
                                    <a href="<?= url_to('forgot') ?>">Lupa password?</a>
                                <?php endif; ?>
                                <?php if ($config->allowRegistration) : ?>
                                    <a href="<?= url_to('register') ?>">Buat Akun?</a>
                                <?php endif; ?>
                            </div>
                            
                            <button type="submit" class="btn btn-primary btn-login"><?= lang('Auth.loginAction') ?></button>
                        </form>
                    </div> 
                    
                    <div class="social-login">
                        <p>Login with Google</p>
                        <img src="<?= base_url('img/logogoogle.png') ?>" alt="Google" style="width: 25px; height: 25px;">
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>