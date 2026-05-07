<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #1a73e8, #8a2be2);
        min-height: 100vh;
    }

    .center-wrapper {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .forgot-box {
        width: 700px;
        background: #fff;
        padding: 40px 60px;
        border-radius: 40px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .forgot-title {
        font-weight: 600;
        font-size: 22px;
        margin-bottom: 15px;
    }

    .form-group label {
        font-size: 14px;
        font-weight: 500;
        margin-bottom: 8px;
        display: block;
    }

    .form-control {
        width: 100%;
        height: 40px;
        border-radius: 20px;
        border: 1px solid #ccc;
        padding: 0 15px;
        outline: none;
        transition: .2s;
    }

    .form-control:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 1px #3b82f6;
    }

    .btn-forgot {
        width: 200px;
        height: 45px;
        background: #1a73e8;
        border: none;
        border-radius: 20px;
        color: #fff;
        font-size: 16px;
        font-weight: 600;
        display: block;
        margin: 20px auto 0;
        cursor: pointer;
        transition: .2s;
    }

    .btn-forgot:hover {
        background: #1667cf;
    }
</style>

<div class="center-wrapper">

    <div class="forgot-box">

        <div class="forgot-title">Lupa Password</div>

        <?= view('Myth\Auth\Views\_message_block') ?>

        <p>Masukkan alamat email Anda dan kami akan mengirimkan petunjuk untuk mengatur ulang password.</p>

        <form action="<?= url_to('forgot') ?>" method="post">
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="email">Alamat Email</label>
                <input type="email"
                       class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>"
                       name="email"
                       placeholder="Masukkan email Anda">

                <div class="invalid-feedback">
                    <?= session('errors.email') ?>
                </div>
            </div>

            <button type="submit" class="btn-forgot">
                Kirim Instruksi
            </button>

        </form>

    </div>

</div>

<?= $this->endSection() ?>