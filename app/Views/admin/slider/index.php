<style>
    /* CARD UTAMA */
.card.wide {
    background: #ffffff;
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.08);
    margin-top: 20px;
    border: 1px solid #e5e7eb;
}

/* JUDUL */
.card.wide h3 {
    margin-bottom: 20px;
    font-size: 20px;
    font-weight: 600;
    color: #374151;
}

/* FORM UPLOAD */
.card.wide form {
    display: flex;
    gap: 10px;
    align-items: center;
}

.card.wide input[type="file"] {
    padding: 10px;
    background: #f9fafb;
    border: 1px solid #d1d5db;
    border-radius: 8px;
}

.card.wide button {
    background: #3b82f6;
    border: none;
    padding: 10px 20px;
    color: white;
    border-radius: 8px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.2s;
}

.card.wide button:hover {
    background: #2563eb;
    transform: translateY(-2px);
}

/* TABEL */
.card.wide table {
    width: 100%;
    margin-top: 15px;
    border-collapse: collapse;
    border-radius: 10px;
    overflow: hidden;
    font-size: 14px;
}

.card.wide table th {
    background: #0d47a1;
    padding: 10px;
    font-weight: bold;
    text-align: left;
}

.card.wide table td {
    padding: 10px;
    border-bottom: 1px solid #e5e7eb;
    background: #ffffff;
}

/* TOMBOL DELETE */
.card.wide a {
    background: #ef4444;
    padding: 6px 12px;
    color: white;
    text-decoration: none;
    border-radius: 6px;
    font-size: 13px;
}

.card.wide a:hover {
    background: #dc2626;
    transform: scale(1.05);
}
th {
    color: #ffffff;
}

</style>

 <div class="flex-row">
        <a href="javascript:history.back()" class="btn-back">←</a>
        <div class="card wide">
            <h3>Kelola Slider Mobil</h3>

            <form action="<?= base_url('admin/slider/save') ?>" method="post" enctype="multipart/form-data">
                <input type="file" name="gambar" required>
                <button type="submit">Upload Slider Baru</button>
            </form>

            <br>

            <table border="1" width="100%" cellpadding="6">
                <tr>
                    <th>Mobil</th>
                    <th>Aksi</th>
                </tr>

                <?php foreach ($slider as $s): ?>
                <tr>
                    <td><img src="<?= base_url('img/slider/' . $s['gambar']) ?>" width="150"></td>
                    <td>
                        <a href="<?= base_url('admin/slider/delete/' . $s['id_slider']) ?>" 
                           onclick="return confirm('Hapus gambar slider ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>


