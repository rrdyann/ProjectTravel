<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #1a73e8, #8a2be2);
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .center-wrapper {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .register-box {
        width: 700px;
        background: #fff;
        padding: 40px 60px;
        border-radius: 40px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
       
    
    }

    .register-title {
        font-weight: 600;
        font-size: 22px;
        margin-bottom: 20px;
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

    .btn-register {
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

    .btn-register:hover {
        background: #1667cf;
    }

    .already {
        text-align: center;
        margin-top: 20px;
        font-size: 14px;
    }

    .already a {
        color: #1a73e8;
        font-weight: 600;
        text-decoration: none;
    }
</style>
<div class="center-wrapper">
<div class="register-box">

    <div class="register-title">DAFTAR</div>

    <?= view('Myth\Auth\Views\_message_block') ?>

    <form action="<?= url_to('register') ?>" method="post">
        <?= csrf_field() ?>

        <div class="form-group">
            <label for="username">Nama Lengkap</label>
            <input type="text" name="username" class="form-control" value="<?= old('username') ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="<?= old('email') ?>" required>
        </div>

        <div class="form-group">
            <label>No Handphone</label>
            <input type="text" name="no_hp" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Konfirmasi Password</label>
            <input type="password" name="pass_confirm" class="form-control" required>
        </div>

        <button type="submit" class="btn-register">Daftar</button>

        <div class="already">
            Sudah punya akun? <a href="<?= url_to('login') ?>">Login</a>
        </div>
    </form>
</div>
</div>

<?= $this->endSection() ?>