<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<style>
    body {
        font-family: 'Poppins', sans-serif !important;
        background: linear-gradient(135deg, #4A00E0, #8E2DE2) !important;
        margin: 0;
        padding: 0;
    }

    /* FIX: Center konten di dalam layout MythAuth */
    .center-wrapper {
        width: 100%;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .reset-card {
        width: 100%;
        max-width: 430px;
        background: #ffffff;
        border-radius: 18px;
        padding: 30px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        animation: fadeIn .5s ease;
    }

    .reset-card h2 {
        text-align: center;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .form-group label {
        font-weight: 500;
    }

    .btn-primary {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        font-weight: 600;
        border-radius: 10px;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="center-wrapper">

    <div class="reset-card">

        <h2>Atur Ulang Kata Sandi Anda</h2>

        <?= view('Myth\Auth\Views\_message_block') ?>

        <p class="text-center">Masukkan token, email, dan kata sandi baru Anda.</p>

        <form action="<?= url_to('reset-password') ?>" method="post">
            <?= csrf_field() ?>

            <div class="form-group mb-3">
                <label>Kode Token</label>
                <input type="text"
                    class="form-control <?php if (session('errors.token')) : ?>is-invalid<?php endif ?>"
                    name="token"
                    placeholder="Masukkan kode token"
                    value="<?= old('token', $token ?? '') ?>">
                <div class="invalid-feedback"><?= session('errors.token') ?></div>
            </div>

            <div class="form-group mb-3">
                <label>Email</label>
                <input type="email"
                    class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>"
                    name="email"
                    placeholder="Masukkan email Anda"
                    value="<?= old('email') ?>">
                <div class="invalid-feedback"><?= session('errors.email') ?></div>
            </div>

            <div class="form-group mb-3">
                <label>Kata Sandi Baru</label>
                <input type="password"
                    class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
                    name="password"
                    placeholder="Masukkan kata sandi baru">
                <div class="invalid-feedback"><?= session('errors.password') ?></div>
            </div>

            <div class="form-group mb-4">
                <label>Ulangi Kata Sandi Baru</label>
                <input type="password"
                    class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>"
                    name="pass_confirm"
                    placeholder="Ulangi kata sandi baru">
                <div class="invalid-feedback"><?= session('errors.pass_confirm') ?></div>
            </div>

            <button type="submit" class="btn btn-primary">
                Atur Ulang Kata Sandi
            </button>
        </form>

    </div>

</div>

<?= $this->endSection() ?>