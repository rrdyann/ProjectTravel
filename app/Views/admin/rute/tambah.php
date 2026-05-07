<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <a href="javascript:history.back()" class="btn-back">←</a>
    <title>Tambah Rute</title>

    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #eef2f7;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 450px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
            
        }

        h1 {
            text-align: center;
            color: #1e3a8a;
            margin-bottom: 25px;
            font-size: 26px;
            letter-spacing: 1px;
        }

        label {
            font-weight: bold;
            color: #1f2937;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-top: 6px;
            margin-bottom: 18px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 15px;
            transition: 0.2s;
        }

        input:focus {
            border-color: #2563eb;
            outline: none;
            box-shadow: 0 0 6px rgba(37,99,235,0.4);
        }

        button {
            width: 100%;
            padding: 12px;
            background: #2563eb;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: 0.2s;
        }

        button:hover {
            background: #1e40af;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Tambah Rute</h1>

    <form action="/admin/rute/simpan" method="post">

        <label>Asal</label>
        <input type="text" name="asal" required>

        <label>Tujuan</label>
        <input type="text" name="tujuan" required>

        <label>Jam Berangkat</label>
        <input type="time" name="jam_berangkat" required>

        <label>Jam Tiba</label>
        <input type="time" name="jam_tiba" required>

        <label>Harga</label>
        <input type="number" name="harga" required>

        <button type="submit">Simpan</button>
    </form>
</div>

</body>
</html>
